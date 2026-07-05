<?php if (isset($component)) { $__componentOriginal8c0e86a062c1c5bb6d0e151b7076f3fd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c0e86a062c1c5bb6d0e151b7076f3fd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.public','data' => ['title' => 'Bimbel - '.config('app.name')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.public'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('Bimbel - '.config('app.name'))]); ?>
    <section class="bg-[#f9f9ff] py-12 sm:py-16">
        <div class="jb-container">
            <div class="max-w-2xl">
                <h1 class="text-3xl font-extrabold tracking-tight text-[#141b2c] sm:text-4xl">Bimbel</h1>
                <p class="mt-3 text-sm leading-7 text-[#5f667d] sm:text-base">Pilih paket bimbel yang sesuai dengan kebutuhan belajar, target nilai, dan ritme belajar siswa.</p>
            </div>
            <div class="mt-8 grid gap-6 lg:grid-cols-3">
                <article class="overflow-hidden rounded-3xl bg-white shadow-[0_14px_34px_rgba(20,27,44,0.10)] ring-1 ring-[#e9edff]">
                    <div class="relative grid aspect-[16/9] place-items-center text-white" style="background: radial-gradient(circle at 75% 25%, rgba(255,255,255,0.18), transparent 28%), linear-gradient(135deg, #0043c6, #1e5af0);">
                        <span class="rounded-2xl bg-white/15 px-5 py-3 text-xl font-extrabold ring-1 ring-white/25">Reguler</span>
                        <span class="absolute left-4 top-4 rounded-full bg-white/15 px-3 py-1 text-xs font-bold ring-1 ring-white/20">Live Zoom</span>
                    </div>
                    <div class="p-6">
                        <h2 class="text-xl font-extrabold text-[#141b2c]">Kelas Reguler SD - SMP</h2>
                        <p class="mt-3 text-sm leading-6 text-[#5f667d]">Belajar mingguan terstruktur untuk memperkuat konsep dasar dan latihan soal rutin.</p>
                        <div class="mt-5 grid gap-3 text-sm text-[#434655]">
                            <div class="flex items-center justify-between rounded-2xl bg-[#f1f3ff] px-4 py-3"><span>Jadwal</span><strong>2x per minggu</strong></div>
                            <div class="flex items-center justify-between rounded-2xl bg-[#f9f9ff] px-4 py-3"><span>Metode</span><strong>Live Zoom</strong></div>
                            <div class="flex items-center justify-between rounded-2xl bg-[#f9f9ff] px-4 py-3"><span>Harga</span><strong>Mulai Rp149.000/bulan</strong></div>
                        </div>
                        <a href="<?php echo e(route('bimbel.detail', 'kelas-reguler')); ?>" class="mt-6 inline-flex w-full justify-center rounded-2xl bg-[#feb700] px-5 py-3 text-sm font-extrabold text-[#271900] transition hover:bg-[#ffca35]">Lihat Detail Bimbel</a>
                    </div>
                </article>
                <article class="overflow-hidden rounded-3xl bg-white shadow-[0_14px_34px_rgba(20,27,44,0.10)] ring-1 ring-[#e9edff]">
                    <div class="relative grid aspect-[16/9] place-items-center text-white" style="background: radial-gradient(circle at 75% 25%, rgba(255,255,255,0.18), transparent 28%), linear-gradient(135deg, #7c5800, #feb700);">
                        <span class="rounded-2xl bg-white/15 px-5 py-3 text-xl font-extrabold ring-1 ring-white/25">Intensif</span>
                        <span class="absolute left-4 top-4 rounded-full bg-white/15 px-3 py-1 text-xs font-bold ring-1 ring-white/20">Live + Rekaman</span>
                    </div>
                    <div class="p-6">
                        <h2 class="text-xl font-extrabold text-[#141b2c]">Kelas Intensif Persiapan Ujian</h2>
                        <p class="mt-3 text-sm leading-6 text-[#5f667d]">Program belajar lebih padat untuk siswa yang ingin fokus mengejar target nilai dalam waktu singkat.</p>
                        <div class="mt-5 grid gap-3 text-sm text-[#434655]">
                            <div class="flex items-center justify-between rounded-2xl bg-[#f1f3ff] px-4 py-3"><span>Jadwal</span><strong>3x per minggu</strong></div>
                            <div class="flex items-center justify-between rounded-2xl bg-[#f9f9ff] px-4 py-3"><span>Metode</span><strong>Live + Rekaman</strong></div>
                            <div class="flex items-center justify-between rounded-2xl bg-[#f9f9ff] px-4 py-3"><span>Harga</span><strong>Mulai Rp249.000/bulan</strong></div>
                        </div>
                        <a href="<?php echo e(route('bimbel.detail', 'kelas-intensif')); ?>" class="mt-6 inline-flex w-full justify-center rounded-2xl bg-[#feb700] px-5 py-3 text-sm font-extrabold text-[#271900] transition hover:bg-[#ffca35]">Lihat Detail Bimbel</a>
                    </div>
                </article>
                <article class="overflow-hidden rounded-3xl bg-white shadow-[0_14px_34px_rgba(20,27,44,0.10)] ring-1 ring-[#e9edff]">
                    <div class="relative grid aspect-[16/9] place-items-center text-white" style="background: radial-gradient(circle at 75% 25%, rgba(255,255,255,0.18), transparent 28%), linear-gradient(135deg, #4a36c4, #6352dd);">
                        <span class="rounded-2xl bg-white/15 px-5 py-3 text-xl font-extrabold ring-1 ring-white/25">Private</span>
                        <span class="absolute left-4 top-4 rounded-full bg-white/15 px-3 py-1 text-xs font-bold ring-1 ring-white/20">Private Session</span>
                    </div>
                    <div class="p-6">
                        <h2 class="text-xl font-extrabold text-[#141b2c]">Private Online 1-on-1</h2>
                        <p class="mt-3 text-sm leading-6 text-[#5f667d]">Pendampingan personal bersama tutor untuk materi yang disesuaikan dengan kebutuhan siswa.</p>
                        <div class="mt-5 grid gap-3 text-sm text-[#434655]">
                            <div class="flex items-center justify-between rounded-2xl bg-[#f1f3ff] px-4 py-3"><span>Jadwal</span><strong>Jadwal fleksibel</strong></div>
                            <div class="flex items-center justify-between rounded-2xl bg-[#f9f9ff] px-4 py-3"><span>Metode</span><strong>Private Session</strong></div>
                            <div class="flex items-center justify-between rounded-2xl bg-[#f9f9ff] px-4 py-3"><span>Harga</span><strong>Mulai Rp399.000/bulan</strong></div>
                        </div>
                        <a href="<?php echo e(route('bimbel.detail', 'private-online')); ?>" class="mt-6 inline-flex w-full justify-center rounded-2xl bg-[#feb700] px-5 py-3 text-sm font-extrabold text-[#271900] transition hover:bg-[#ffca35]">Lihat Detail Bimbel</a>
                    </div>
                </article>
            </div>
        </div>
    </section>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8c0e86a062c1c5bb6d0e151b7076f3fd)): ?>
<?php $attributes = $__attributesOriginal8c0e86a062c1c5bb6d0e151b7076f3fd; ?>
<?php unset($__attributesOriginal8c0e86a062c1c5bb6d0e151b7076f3fd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8c0e86a062c1c5bb6d0e151b7076f3fd)): ?>
<?php $component = $__componentOriginal8c0e86a062c1c5bb6d0e151b7076f3fd; ?>
<?php unset($__componentOriginal8c0e86a062c1c5bb6d0e151b7076f3fd); ?>
<?php endif; ?>
<?php /**PATH C:\dev\jagobelajar-cms\resources\views\pages\public\bimbel.blade.php ENDPATH**/ ?>