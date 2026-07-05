<x-layouts.public :title="'Blog - '.config('app.name')">
    <section class="bg-[#f9f9ff] py-12 sm:py-16">
        <div class="jb-container">
            <div class="max-w-2xl">
                <h1 class="text-3xl font-extrabold tracking-tight text-[#141b2c] sm:text-4xl">Blog</h1>
                <p class="mt-3 text-sm leading-7 text-[#5f667d] sm:text-base">Kumpulan artikel, tips belajar, dan panduan ringan untuk membantu siswa belajar lebih efektif.</p>
            </div>
            <div class="mt-8 grid gap-6 sm:grid-cols-2 xl:grid-cols-3">
                @forelse ($posts as $post)
                    <article class="overflow-hidden rounded-3xl bg-white shadow-[0_14px_34px_rgba(20,27,44,0.10)] ring-1 ring-[#e9edff]">
                        <a href="{{ route('blog.detail', $post->slug) }}" class="block">
                            <div class="relative aspect-[16/9] overflow-hidden bg-[radial-gradient(circle_at_75%_25%,rgba(255,255,255,0.2),transparent_28%),linear-gradient(135deg,#0043c6,#1e5af0)]">
                                @if ($post->featured_image_path)
                                    <img src="{{ asset('storage/'.$post->featured_image_path) }}" alt="{{ $post->title }}" class="h-full w-full object-cover">
                                @endif
                                <div class="absolute inset-0 flex items-end p-5">
                                    <span class="rounded-full bg-white/15 px-3 py-1 text-xs font-bold text-white ring-1 ring-white/25">Blog Jago Belajar</span>
                                </div>
                            </div>
                        </a>
                        <div class="p-6">
                            <div class="flex items-center gap-3 text-xs font-bold uppercase tracking-[0.14em] text-[#737687]">
                                <span>{{ $post->published_at?->translatedFormat('d F Y') ?? '-' }}</span>
                                <span>&bull;</span>
                                <span>{{ $post->reading_minutes }} menit baca</span>
                            </div>
                            <h2 class="mt-4 text-xl font-extrabold leading-snug text-[#141b2c]"><a href="{{ route('blog.detail', $post->slug) }}" class="transition hover:text-[#0043c6]">{{ $post->title }}</a></h2>
                            <a href="{{ route('blog.detail', $post->slug) }}" class="mt-5 inline-flex items-center gap-2 text-sm font-extrabold text-[#0043c6]">Baca selengkapnya <span aria-hidden="true">&rarr;</span></a>
                        </div>
                    </article>
                @empty
                    <div class="rounded-3xl bg-white p-6 text-sm text-[#5f667d] ring-1 ring-[#e9edff]">Belum ada blog.</div>
                @endforelse
            </div>
        </div>
    </section>
</x-layouts.public>
