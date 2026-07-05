<div id="admin-sidebar-overlay" onclick="document.getElementById('admin-sidebar').classList.add('-translate-x-full'); document.getElementById('admin-sidebar-overlay').classList.add('hidden'); document.body.classList.remove('overflow-hidden');" class="fixed inset-0 z-40 hidden bg-[#141b2c]/40 backdrop-blur-[1px] lg:hidden"></div>

<aside id="admin-sidebar" class="fixed left-0 top-0 z-50 h-screen w-[86vw] max-w-72 -translate-x-full border-r border-[#e6eaf5] bg-white shadow-[24px_0_60px_rgba(20,27,44,0.16)] transition-transform duration-200 lg:translate-x-0 lg:shadow-none">
    <div class="flex h-full flex-col">
        <div class="border-b border-[#e6eaf5] px-5 py-5">
            <div class="relative flex items-center justify-center">
                <a href="<?php echo e(route('admin.dashboard')); ?>" class="flex justify-center">
                    <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Jago Belajar" class="h-20 w-auto lg:h-24">
                </a>
                <button type="button" onclick="document.getElementById('admin-sidebar').classList.add('-translate-x-full'); document.getElementById('admin-sidebar-overlay').classList.add('hidden'); document.body.classList.remove('overflow-hidden');" class="absolute right-0 top-1/2 grid h-10 w-10 -translate-y-1/2 place-items-center rounded-xl border border-[#d9def1] bg-white text-[#0043c6] transition hover:bg-[#f6f8ff] lg:hidden" aria-label="Tutup sidebar">
                    <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" aria-hidden="true"><path d="M6 6l12 12" /><path d="M18 6L6 18" /></svg>
                </button>
            </div>
            <p class="mt-4 text-center text-[11px] font-bold uppercase tracking-[0.2em] text-[#8a93a8]">Content Management</p>
        </div>

        <nav class="flex flex-col gap-2 overflow-y-auto px-4 py-4 text-sm font-semibold">
            <?php ($inactiveLink = 'block rounded-xl px-4 py-3 text-[#64708b] transition hover:bg-[#f6f8ff] hover:text-[#0043c6]'); ?>
            <?php ($activeLink = 'block rounded-xl bg-[#f1f3ff] px-4 py-3 text-[#0043c6]'); ?>
            <a class="<?php echo e(request()->routeIs('admin.dashboard') ? $activeLink : $inactiveLink); ?>" href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a>
            <a class="<?php echo e(request()->routeIs('admin.cms-beranda.*') ? $activeLink : $inactiveLink); ?>" href="<?php echo e(route('admin.cms-beranda.edit')); ?>">CMS Beranda</a>
            <a class="<?php echo e(request()->routeIs('admin.features.*') ? $activeLink : $inactiveLink); ?>" href="<?php echo e(route('admin.features.index')); ?>">CMS Keunggulan</a>
            <a class="<?php echo e(request()->routeIs('admin.blogs.*') ? $activeLink : $inactiveLink); ?>" href="<?php echo e(route('admin.blogs.index')); ?>">CMS Blog</a>
            <a class="<?php echo e(request()->routeIs('admin.users.*') ? $activeLink : $inactiveLink); ?>" href="<?php echo e(route('admin.users.index')); ?>">User</a>
            <a class="<?php echo e(request()->routeIs('admin.bimbel.*') ? $activeLink : $inactiveLink); ?>" href="<?php echo e(route('admin.bimbel.index')); ?>">Bimbel</a>
            <a class="<?php echo e(request()->routeIs('admin.exam-sessions.*') ? $activeLink : $inactiveLink); ?>" href="<?php echo e(route('admin.exam-sessions.index')); ?>">Sesi Ujian</a>
        </nav>

        <div class="mt-auto border-t border-[#e6eaf5] p-4">
            <div class="rounded-2xl bg-[#f9f9ff] p-4 ring-1 ring-[#e6eaf5]">
                <div class="flex items-center gap-3">
                    <span class="grid h-10 w-10 place-items-center rounded-xl bg-white text-sm font-bold text-[#0043c6] ring-1 ring-[#d9def1]">A</span>
                    <div class="min-w-0">
                        <p class="truncate text-sm font-semibold text-[#141b2c]">Admin</p>
                        <p class="truncate text-xs text-[#8a93a8]">admin@jagobelajar.test</p>
                    </div>
                </div>
                <form method="POST" action="<?php echo e(route('logout')); ?>" class="mt-4">
                    <?php echo csrf_field(); ?>
                    <button class="flex w-full items-center justify-center rounded-xl bg-white px-4 py-2.5 text-sm font-semibold text-[#0043c6] ring-1 ring-[#d9def1] transition hover:bg-[#f1f3ff]">Logout</button>
                </form>
            </div>
        </div>
    </div>
</aside>
<?php /**PATH C:\dev\jagobelajar-cms\resources\views/components/admin-sidebar.blade.php ENDPATH**/ ?>