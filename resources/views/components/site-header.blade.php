<header x-data="{ open: false }" class="fixed inset-x-0 top-0 z-40 border-b border-[#e9edff] bg-white/90 backdrop-blur lg:sticky">
    <div class="jb-container flex items-center justify-between gap-4 py-4">
        <a href="{{ route('home') }}" class="flex items-center gap-2 text-lg font-extrabold text-[#0043c6]">
            <img src="{{ asset('images/logo.png') }}" alt="Jago Belajar" class="h-16 w-auto md:h-24" />
        </a>

        <nav class="hidden items-center gap-8 text-sm font-medium text-[#434655] lg:flex">
            <a href="{{ route('home') }}#keunggulan" class="transition hover:text-[#0043c6]">Beranda</a>
            <a href="{{ route('tryout.index') }}" class="transition hover:text-[#0043c6]">Try Out</a>
            <a href="{{ route('bimbel.index') }}" class="transition hover:text-[#0043c6]">Bimbel</a>
            <a href="{{ route('keunggulan.index') }}" class="transition hover:text-[#0043c6]">Keunggulan</a>
            <a href="{{ route('home') }}#testimoni" class="transition hover:text-[#0043c6]">Testimoni</a>
            <a href="{{ route('blog.index') }}" class="transition hover:text-[#0043c6]">Blog</a>
            @auth
                <a href="{{ route(auth()->user()->isAdmin() ? 'admin.dashboard' : 'user.dashboard') }}" class="font-semibold text-[#0043c6] transition hover:text-[#003ab1]">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="rounded-full bg-[#feb700] px-4 py-2 font-bold text-[#271900] transition hover:bg-[#ffca35]">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="font-semibold text-[#0043c6] transition hover:text-[#003ab1]">Masuk</a>
                <a href="{{ route('register') }}" class="rounded-full bg-[#feb700] px-4 py-2 font-bold text-[#271900] transition hover:bg-[#ffca35]">Daftar Sekarang</a>
            @endauth
        </nav>

        <button
            type="button"
            class="inline-flex h-11 w-11 items-center justify-center rounded-2xl border border-[#d9def1] bg-white text-[#0043c6] shadow-sm transition hover:-translate-y-0.5 hover:bg-[#f1f3ff] lg:hidden"
            aria-label="Buka menu navigasi"
            :aria-expanded="open.toString()"
            @click="open = true"
        >
            <svg viewBox="0 0 24 24" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                <path d="M4 7h16" />
                <path d="M4 12h16" />
                <path d="M4 17h16" />
            </svg>
        </button>
    </div>

    <template x-teleport="body">
        <div
            x-cloak
            x-show="open"
            class="fixed inset-0 z-[9999] lg:hidden"
        role="dialog"
        aria-modal="true"
        @keydown.escape.window="open = false"
    >
        <div
            x-show="open"
            x-transition.opacity
            class="absolute inset-0 bg-[#141b2c]/60 backdrop-blur-md"
            @click="open = false"
        ></div>

        <aside
            x-show="open"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="translate-x-full opacity-80"
            x-transition:enter-end="translate-x-0 opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="translate-x-0 opacity-100"
            x-transition:leave-end="translate-x-full opacity-80"
            class="absolute right-0 top-0 z-[10000] flex h-full w-[min(90vw,390px)] flex-col overflow-hidden rounded-l-[2rem] bg-[#f9f9ff] shadow-[-24px_0_60px_rgba(20,27,44,0.28)]"
            x-trap.noscroll="open"
        >
            <div class="relative overflow-hidden bg-[radial-gradient(circle_at_82%_18%,rgba(254,183,0,0.35),transparent_28%),linear-gradient(135deg,#0043c6,#1b63e8)] px-6 pb-7 pt-5 text-white">
                <div class="absolute -right-10 -top-10 h-32 w-32 rounded-full bg-white/10 blur-2xl"></div>
                <div class="absolute -bottom-12 left-8 h-28 w-28 rounded-full bg-[#feb700]/25 blur-2xl"></div>

                <div class="relative flex items-center justify-between">
                    <a href="{{ route('home') }}" class="flex items-center gap-3" @click="open = false">
                        <img src="{{ asset('images/logo.png') }}" alt="Jago Belajar" class="h-14 w-auto rounded-2xl bg-white/90 p-1 shadow-lg" />
                    </a>
                    <button
                        type="button"
                        class="grid h-10 w-10 place-items-center rounded-2xl bg-white/15 text-white ring-1 ring-white/20 transition hover:bg-white/25"
                        aria-label="Tutup menu navigasi"
                        @click="open = false"
                    >
                        <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" aria-hidden="true">
                            <path d="M6 6l12 12" />
                            <path d="M18 6L6 18" />
                        </svg>
                    </button>
                </div>

                <div class="relative mt-7 rounded-3xl bg-white/14 p-4 ring-1 ring-white/18 backdrop-blur">
                    <p class="text-sm font-bold">Siap mulai belajar?</p>
                    <p class="mt-1 text-xs leading-5 text-white/78">Akses bimbel, try out, dan forum diskusi dalam satu tempat.</p>
                </div>
            </div>

            <nav class="flex flex-1 flex-col gap-2 overflow-y-auto px-5 py-5 text-sm font-bold text-[#33394d]">
                <a href="{{ route('home') }}#keunggulan" class="group flex items-center justify-between rounded-2xl bg-white px-4 py-3.5 shadow-sm ring-1 ring-[#e9edff] transition hover:-translate-y-0.5 hover:text-[#0043c6] hover:shadow-md" @click="open = false">
                    <span class="flex items-center gap-3"><span class="grid h-9 w-9 place-items-center rounded-xl bg-[#dce1ff] text-[#0043c6]">&larr;</span>Beranda</span>
                    <span class="text-[#b5bad0] transition group-hover:translate-x-1 group-hover:text-[#0043c6]">&larr;</span>
                </a>
                <a href="{{ route('tryout.index') }}" class="group flex items-center justify-between rounded-2xl bg-white px-4 py-3.5 shadow-sm ring-1 ring-[#e9edff] transition hover:-translate-y-0.5 hover:text-[#0043c6] hover:shadow-md" @click="open = false">
                    <span class="flex items-center gap-3"><span class="grid h-9 w-9 place-items-center rounded-xl bg-[#fff2c7] text-[#b47a00]">&larr;</span>Try Out</span>
                    <span class="text-[#b5bad0] transition group-hover:translate-x-1 group-hover:text-[#0043c6]">&larr;</span>
                </a>
                <a href="{{ route('bimbel.index') }}" class="group flex items-center justify-between rounded-2xl bg-white px-4 py-3.5 shadow-sm ring-1 ring-[#e9edff] transition hover:-translate-y-0.5 hover:text-[#0043c6] hover:shadow-md" @click="open = false">
                    <span class="flex items-center gap-3"><span class="grid h-9 w-9 place-items-center rounded-xl bg-[#e8f7ef] text-[#1c9b5e]">&larr;</span>Bimbel</span>
                    <span class="text-[#b5bad0] transition group-hover:translate-x-1 group-hover:text-[#0043c6]">&larr;</span>
                </a>
                <a href="{{ route('keunggulan.index') }}" class="group flex items-center justify-between rounded-2xl bg-white px-4 py-3.5 shadow-sm ring-1 ring-[#e9edff] transition hover:-translate-y-0.5 hover:text-[#0043c6] hover:shadow-md" @click="open = false">
                    <span class="flex items-center gap-3"><span class="grid h-9 w-9 place-items-center rounded-xl bg-[#eef0ff] text-[#5b54d8]">&larr;</span>Keunggulan</span>
                    <span class="text-[#b5bad0] transition group-hover:translate-x-1 group-hover:text-[#0043c6]">&larr;</span>
                </a>
                <a href="{{ route('home') }}#testimoni" class="group flex items-center justify-between rounded-2xl bg-white px-4 py-3.5 shadow-sm ring-1 ring-[#e9edff] transition hover:-translate-y-0.5 hover:text-[#0043c6] hover:shadow-md" @click="open = false">
                    <span class="flex items-center gap-3"><span class="grid h-9 w-9 place-items-center rounded-xl bg-[#ffe8ef] text-[#d84a7c]">&larr;</span>Testimoni</span>
                    <span class="text-[#b5bad0] transition group-hover:translate-x-1 group-hover:text-[#0043c6]">&larr;</span>
                </a>
                <a href="{{ route('blog.index') }}" class="group flex items-center justify-between rounded-2xl bg-white px-4 py-3.5 shadow-sm ring-1 ring-[#e9edff] transition hover:-translate-y-0.5 hover:text-[#0043c6] hover:shadow-md" @click="open = false">
                    <span class="flex items-center gap-3"><span class="grid h-9 w-9 place-items-center rounded-xl bg-[#ecfbff] text-[#1f90a6]">&larr;</span>Blog</span>
                    <span class="text-[#b5bad0] transition group-hover:translate-x-1 group-hover:text-[#0043c6]">&larr;</span>
                </a>
            </nav>

            <div class="space-y-3 border-t border-[#e9edff] bg-white px-5 py-5">
                @auth
                    <a href="{{ route(auth()->user()->isAdmin() ? 'admin.dashboard' : 'user.dashboard') }}" class="flex w-full items-center justify-center rounded-2xl border border-[#d9def1] bg-white px-5 py-3.5 text-sm font-bold text-[#0043c6] transition hover:bg-[#f1f3ff]" @click="open = false">
                        Dashboard
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="flex w-full items-center justify-center rounded-2xl bg-[#feb700] px-5 py-4 text-sm font-extrabold text-[#271900] shadow-[0_14px_24px_rgba(254,183,0,0.22)] transition hover:-translate-y-0.5 hover:bg-[#ffca35]">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('register') }}" class="flex w-full items-center justify-center rounded-2xl bg-[#feb700] px-5 py-4 text-sm font-extrabold text-[#271900] shadow-[0_14px_24px_rgba(254,183,0,0.22)] transition hover:-translate-y-0.5 hover:bg-[#ffca35]" @click="open = false">
                        Daftar Sekarang
                    </a>
                    <a href="{{ route('login') }}" class="flex w-full items-center justify-center rounded-2xl border border-[#d9def1] bg-white px-5 py-3.5 text-sm font-bold text-[#0043c6] transition hover:bg-[#f1f3ff]" @click="open = false">
                        Masuk
                    </a>
                @endauth
            </div>
        </aside>
        </div>
    </template>
</header>

