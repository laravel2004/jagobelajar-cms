<nav class="sticky top-0 z-30 border-b border-[#e6eaf5] bg-white/85 px-3 py-3 backdrop-blur sm:px-4 sm:py-3 lg:px-8">
    <div class="flex items-center justify-between gap-4">
        <div class="flex items-center gap-3">
            <button type="button" onclick="document.getElementById('admin-sidebar').classList.toggle('-translate-x-full'); document.getElementById('admin-sidebar-overlay').classList.toggle('hidden'); document.body.classList.toggle('overflow-hidden');" class="inline-flex h-10 w-10 items-center justify-center rounded-xl border border-[#d9def1] bg-white text-[#0043c6] transition hover:bg-[#f6f8ff]" aria-label="Buka sidebar">
                <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><path d="M4 6h16" /><path d="M4 12h16" /><path d="M4 18h16" /></svg>
            </button>
            <div>
                <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#64708b]">Admin Panel</p>
                <h1 class="mt-0.5 text-lg font-semibold text-[#141b2c]">Dashboard</h1>
            </div>
        </div>
        <div class="hidden items-center gap-3 rounded-2xl border border-[#e6eaf5] bg-white px-3 py-2 text-sm font-semibold text-[#334155] sm:flex">
            <span class="grid h-8 w-8 place-items-center rounded-xl bg-[#f1f3ff] text-xs font-bold text-[#0043c6]">A</span>
            Admin
        </div>
    </div>
</nav>
