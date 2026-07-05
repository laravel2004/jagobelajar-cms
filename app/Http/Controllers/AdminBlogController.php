<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AdminBlogController extends Controller
{
    public function index(): View
    {
        return view('pages.admin.blogs.index', [
            'posts' => BlogPost::query()->latest('published_at')->latest()->paginate(10),
        ]);
    }

    public function create(): View
    {
        return view('pages.admin.blogs.form', ['post' => new BlogPost()]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validatePost($request);
        $data['slug'] = $data['slug'] ?: Str::slug($data['title']);
        $data['is_published'] = $request->boolean('is_published');
        if ($request->hasFile('featured_image')) {
            $data['featured_image_path'] = $request->file('featured_image')->store('blog', 'public');
        }
        unset($data['featured_image']);
        BlogPost::create($data);

        return redirect()->route('admin.blogs.index')->with('status', 'Blog berhasil ditambahkan.');
    }

    public function edit(BlogPost $blog): View
    {
        return view('pages.admin.blogs.form', ['post' => $blog]);
    }

    public function update(Request $request, BlogPost $blog): RedirectResponse
    {
        $data = $this->validatePost($request, $blog->id);
        $data['slug'] = $data['slug'] ?: Str::slug($data['title']);
        $data['is_published'] = $request->boolean('is_published');
        if ($request->hasFile('featured_image')) {
            if ($blog->featured_image_path) {
                Storage::disk('public')->delete($blog->featured_image_path);
            }
            $data['featured_image_path'] = $request->file('featured_image')->store('blog', 'public');
        }
        unset($data['featured_image']);
        $blog->update($data);

        return redirect()->route('admin.blogs.index')->with('status', 'Blog berhasil diperbarui.');
    }

    public function destroy(BlogPost $blog): RedirectResponse
    {
        $blog->delete();

        return back()->with('status', 'Blog berhasil dihapus.');
    }

    private function validatePost(Request $request, ?int $ignoreId = null): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('blog_posts', 'slug')->ignore($ignoreId)],
            'excerpt' => ['required', 'string', 'max:1000'],
            'content' => ['required', 'string'],
            'featured_image' => ['nullable', 'image', 'max:2048'],
            'published_at' => ['nullable', 'date'],
            'reading_minutes' => ['required', 'integer', 'min:1', 'max:999'],
        ]);
    }
}
