<x-layouts.admin :title="($post->exists ? 'Edit Blog' : 'Tambah Blog').' - '.config('app.name')">
    <form method="POST" enctype="multipart/form-data" action="{{ $post->exists ? route('admin.blogs.update', $post) : route('admin.blogs.store') }}" class="space-y-6">
        @csrf
        @if ($post->exists)
            @method('PUT')
        @endif

        <section class="rounded-[2rem] bg-white p-4 shadow-[0_18px_55px_rgba(20,27,44,0.08)] ring-1 ring-[#e6eaf5] sm:p-6 lg:p-8 space-y-5">
            <div class="grid gap-5 lg:grid-cols-[1fr_320px]">
                <div class="space-y-5">
                    <div>
                        <label class="text-sm font-bold text-[#141b2c]">Judul</label>
                        <input name="title" value="{{ old('title', $post->title) }}" class="mt-2 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm">
                        @error('title') <p class="mt-2 text-sm text-rose-500">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="text-sm font-bold text-[#141b2c]">Slug</label>
                        <input name="slug" value="{{ old('slug', $post->slug) }}" class="mt-2 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="kosongkan jika mau auto generate">
                        @error('slug') <p class="mt-2 text-sm text-rose-500">{{ $message }}</p> @enderror
                    </div>
                    <div x-data="{ count: {{ strlen(old('excerpt', $post->excerpt ?? '')) }} }">
                        <label class="text-sm font-bold text-[#141b2c]">Ringkasan</label>
                        <textarea name="excerpt" rows="5" maxlength="1000" x-on:input="count = $event.target.value.length" class="mt-2 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm">{{ old('excerpt', $post->excerpt) }}</textarea>
                        <p class="mt-2 text-xs font-semibold" :class="count > 1000 ? 'text-rose-500' : 'text-[#8a93a8]'" x-text="`${count}/1000 karakter`"></p>
                        @error('excerpt') <p class="mt-2 text-sm text-rose-500">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="text-sm font-bold text-[#141b2c]">Konten Artikel</label>
                        <textarea id="blog-content" name="content" class="hidden">{{ old('content', $post->content) }}</textarea>
                        <div class="mt-2 overflow-hidden rounded-2xl border border-[#d9def1] bg-white">
                            <div class="flex flex-wrap gap-2 border-b border-[#e9edff] bg-[#f9f9ff] px-3 py-2 text-sm">
                                <button type="button" data-command="formatBlock" data-value="h2" class="rounded-lg px-3 py-1.5 font-bold hover:bg-white">H2</button>
                                <button type="button" data-command="formatBlock" data-value="p" class="rounded-lg px-3 py-1.5 hover:bg-white">Paragraf</button>
                                <button type="button" data-command="bold" class="rounded-lg px-3 py-1.5 font-bold hover:bg-white">B</button>
                                <button type="button" data-command="italic" class="rounded-lg px-3 py-1.5 italic hover:bg-white">I</button>
                                <button type="button" data-command="insertUnorderedList" class="rounded-lg px-3 py-1.5 hover:bg-white">List</button>
                                <button type="button" data-command="createLink" class="rounded-lg px-3 py-1.5 hover:bg-white">Link</button>
                            </div>
                            <div id="blog-editor" contenteditable="true" class="prose prose-slate min-h-80 max-w-none p-5 text-sm leading-7 outline-none">{!! old('content', $post->content) !!}</div>
                        </div>
                        @error('content') <p class="mt-2 text-sm text-rose-500">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="space-y-5 rounded-3xl bg-[#f9f9ff] p-5 ring-1 ring-[#e6eaf5]">
                    <div>
                        <label class="text-sm font-bold text-[#141b2c]">Upload Gambar</label>
                        @if ($post->featured_image_path)
                            <img src="{{ asset('storage/'.$post->featured_image_path) }}" alt="{{ $post->title }}" class="mt-3 aspect-video w-full rounded-2xl object-cover">
                        @endif
                        <input type="file" name="featured_image" accept="image/*" class="mt-3 w-full rounded-xl border border-[#d9def1] bg-white px-4 py-3 text-sm">
                        @error('featured_image') <p class="mt-2 text-sm text-rose-500">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="text-sm font-bold text-[#141b2c]">Tanggal Terbit</label>
                        <input type="datetime-local" name="published_at" value="{{ old('published_at', optional($post->published_at)->format('Y-m-d\\TH:i')) }}" class="mt-2 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm">
                    </div>
                    <div>
                        <label class="text-sm font-bold text-[#141b2c]">Durasi Baca</label>
                        <input type="number" name="reading_minutes" value="{{ old('reading_minutes', $post->reading_minutes ?: 5) }}" class="mt-2 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm" min="1">
                    </div>
                    <label class="flex items-center gap-3 text-sm font-bold text-[#141b2c]"><input type="checkbox" name="is_published" value="1" @checked(old('is_published', $post->is_published ?? true))> Published</label>
                </div>
            </div>

            <div class="flex justify-end gap-3">
                <a href="{{ route('admin.blogs.index') }}" class="rounded-2xl bg-[#f1f3ff] px-6 py-3 text-sm font-extrabold text-[#0043c6]">Batal</a>
                <button class="rounded-2xl bg-[#0043c6] px-6 py-3 text-sm font-extrabold text-white">Simpan</button>
            </div>
        </section>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const editor = document.getElementById('blog-editor');
            const input = document.getElementById('blog-content');
            const form = editor?.closest('form');
            if (!editor || !input || !form) return;

            const sync = () => input.value = editor.innerHTML.trim();
            editor.addEventListener('input', sync);
            form.addEventListener('submit', sync);

            form.querySelectorAll('[data-command]').forEach((button) => {
                button.addEventListener('click', () => {
                    editor.focus();
                    const command = button.dataset.command;
                    const value = command === 'createLink' ? prompt('Masukkan URL') : button.dataset.value || null;
                    if (command !== 'createLink' || value) document.execCommand(command, false, value);
                    sync();
                });
            });
        });
    </script>
</x-layouts.admin>
