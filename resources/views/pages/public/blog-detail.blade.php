<x-layouts.public :title="$post->title.' - '.config('app.name')">
    <section class="bg-[#f9f9ff] py-12 sm:py-16">
        <div class="jb-container">
            <a href="{{ route('blog.index') }}" class="inline-flex items-center gap-2 text-sm font-bold text-[#0043c6] transition hover:text-[#003ab1]">&larr; Kembali ke blog</a>
            <article class="mt-6 overflow-hidden rounded-[2rem] bg-white shadow-[0_18px_50px_rgba(20,27,44,0.12)] ring-1 ring-[#e9edff]">
                <div class="aspect-[16/6] overflow-hidden bg-[radial-gradient(circle_at_75%_25%,rgba(255,255,255,0.2),transparent_28%),linear-gradient(135deg,#0043c6,#1e5af0)]">
                    @if ($post->featured_image_path)
                        <img src="{{ asset('storage/'.$post->featured_image_path) }}" alt="{{ $post->title }}" class="h-full w-full object-cover">
                    @endif
                </div>
                <div class="mx-auto max-w-4xl p-6 sm:p-8 lg:p-10">
                    <div class="flex flex-wrap items-center gap-3 text-xs font-bold uppercase tracking-[0.14em] text-[#737687]">
                        <span>Blog Jago Belajar</span><span>&bull;</span><span>{{ $post->published_at?->translatedFormat('d F Y') ?? '-' }}</span><span>&bull;</span><span>{{ $post->reading_minutes }} menit baca</span>
                    </div>
                    <h1 class="mt-4 text-3xl font-extrabold tracking-tight text-[#141b2c] sm:text-5xl">{{ $post->title }}</h1>
                    <div class="mt-8 grid gap-4 rounded-3xl bg-[#f1f3ff] p-6 md:grid-cols-3">
                        @foreach ([['Fokus', 'Artikel belajar'], ['Durasi', $post->reading_minutes.' menit'], ['Topik', 'Jago Belajar']] as [$label, $value])
                            <div><p class="text-xs font-bold uppercase tracking-[0.14em] text-[#0043c6]">{{ $label }}</p><p class="mt-2 text-lg font-extrabold text-[#141b2c]">{{ $value }}</p></div>
                        @endforeach
                    </div>
                    <div class="prose prose-slate mt-8 max-w-none prose-headings:font-extrabold prose-headings:text-[#141b2c] prose-p:text-[#5f667d] prose-p:leading-7">
                        {!! $post->content !!}
                    </div>
                </div>
            </article>
        </div>
    </section>
</x-layouts.public>
