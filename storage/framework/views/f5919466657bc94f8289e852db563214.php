<?php if (isset($component)) { $__componentOriginal8c0e86a062c1c5bb6d0e151b7076f3fd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c0e86a062c1c5bb6d0e151b7076f3fd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.public','data' => ['title' => 'Try Out - '.config('app.name')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.public'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('Try Out - '.config('app.name'))]); ?>
    <section class="bg-[#f9f9ff] py-12 sm:py-16">
        <div class="jb-container">
            <div class="max-w-2xl">
                <h1 class="text-3xl font-extrabold tracking-tight text-[#141b2c] sm:text-4xl">Try Out</h1>
                <p class="mt-3 text-sm leading-7 text-[#5f667d] sm:text-base">Pilih simulasi ujian sesuai jenjang, lengkap dengan jadwal pelaksanaan dan detail paket.</p>
            </div>
            <div class="mt-8 grid gap-6 lg:grid-cols-3">
                <article class="overflow-hidden rounded-3xl bg-white shadow-[0_14px_34px_rgba(20,27,44,0.10)] ring-1 ring-[#e9edff]">
                    <div class="relative grid aspect-[16/9] place-items-center bg-[radial-gradient(circle_at_75%_25%,rgba(254,183,0,0.55),transparent_30%),linear-gradient(135deg,#0043c6,#1e5af0)] text-white">
                        <span class="rounded-2xl bg-white/15 px-5 py-3 text-3xl font-extrabold ring-1 ring-white/25">SD</span>
                        <span class="absolute left-4 top-4 rounded-full bg-[#feb700] px-3 py-1 text-xs font-bold text-[#271900]">Gratis</span>
                    </div>
                    <div class="p-6">
                        <p class="text-xs font-bold uppercase tracking-[0.18em] text-[#0043c6]">Minggu, 14 Juli 2026</p>
                        <h2 class="mt-3 text-xl font-extrabold text-[#141b2c]">Try Out SD Nasional</h2>
                        <p class="mt-3 text-sm leading-6 text-[#5f667d]">Simulasi ujian untuk siswa SD dengan materi numerasi, literasi, dan penalaran dasar.</p>
                        <div class="mt-5 grid gap-3 text-sm text-[#434655]">
                            <div class="flex items-center justify-between rounded-2xl bg-[#f1f3ff] px-4 py-3"><span>Jam Pelaksanaan</span><strong>09.00 - 10.30 WIB</strong></div>
                            <div class="flex items-center justify-between rounded-2xl bg-[#f9f9ff] px-4 py-3"><span>Durasi</span><strong>90 menit</strong></div>
                            <div class="flex items-center justify-between rounded-2xl bg-[#f9f9ff] px-4 py-3"><span>Jumlah Soal</span><strong>60 soal</strong></div>
                        </div>
                        <a href="<?php echo e(route('tryout.detail', 'tryout-sd-nasional')); ?>" class="mt-6 inline-flex w-full justify-center rounded-2xl bg-[#feb700] px-5 py-3 text-sm font-extrabold text-[#271900] transition hover:bg-[#ffca35]">Daftar Try Out</a>
                    </div>
                </article>
                <article class="overflow-hidden rounded-3xl bg-white shadow-[0_14px_34px_rgba(20,27,44,0.10)] ring-1 ring-[#e9edff]">
                    <div class="relative grid aspect-[16/9] place-items-center bg-[radial-gradient(circle_at_75%_25%,rgba(254,183,0,0.55),transparent_30%),linear-gradient(135deg,#0043c6,#1e5af0)] text-white">
                        <span class="rounded-2xl bg-white/15 px-5 py-3 text-3xl font-extrabold ring-1 ring-white/25">SMP</span>
                        <span class="absolute left-4 top-4 rounded-full bg-[#feb700] px-3 py-1 text-xs font-bold text-[#271900]">Rp25.000</span>
                    </div>
                    <div class="p-6">
                        <p class="text-xs font-bold uppercase tracking-[0.18em] text-[#0043c6]">Sabtu, 20 Juli 2026</p>
                        <h2 class="mt-3 text-xl font-extrabold text-[#141b2c]">Try Out SMP Persiapan Ujian</h2>
                        <p class="mt-3 text-sm leading-6 text-[#5f667d]">Latihan komprehensif untuk mengukur kesiapan menghadapi ujian sekolah dan asesmen.</p>
                        <div class="mt-5 grid gap-3 text-sm text-[#434655]">
                            <div class="flex items-center justify-between rounded-2xl bg-[#f1f3ff] px-4 py-3"><span>Jam Pelaksanaan</span><strong>13.00 - 15.00 WIB</strong></div>
                            <div class="flex items-center justify-between rounded-2xl bg-[#f9f9ff] px-4 py-3"><span>Durasi</span><strong>120 menit</strong></div>
                            <div class="flex items-center justify-between rounded-2xl bg-[#f9f9ff] px-4 py-3"><span>Jumlah Soal</span><strong>80 soal</strong></div>
                        </div>
                        <a href="<?php echo e(route('tryout.detail', 'tryout-smp-persiapan-ujian')); ?>" class="mt-6 inline-flex w-full justify-center rounded-2xl bg-[#feb700] px-5 py-3 text-sm font-extrabold text-[#271900] transition hover:bg-[#ffca35]">Daftar Try Out</a>
                    </div>
                </article>
                <article class="overflow-hidden rounded-3xl bg-white shadow-[0_14px_34px_rgba(20,27,44,0.10)] ring-1 ring-[#e9edff]">
                    <div class="relative grid aspect-[16/9] place-items-center bg-[radial-gradient(circle_at_75%_25%,rgba(254,183,0,0.55),transparent_30%),linear-gradient(135deg,#0043c6,#1e5af0)] text-white">
                        <span class="rounded-2xl bg-white/15 px-5 py-3 text-3xl font-extrabold ring-1 ring-white/25">SMA</span>
                        <span class="absolute left-4 top-4 rounded-full bg-[#feb700] px-3 py-1 text-xs font-bold text-[#271900]">Rp49.000</span>
                    </div>
                    <div class="p-6">
                        <p class="text-xs font-bold uppercase tracking-[0.18em] text-[#0043c6]">Minggu, 28 Juli 2026</p>
                        <h2 class="mt-3 text-xl font-extrabold text-[#141b2c]">Try Out SMA TKA & UTBK Dasar</h2>
                        <p class="mt-3 text-sm leading-6 text-[#5f667d]">Paket simulasi untuk menguji kemampuan penalaran umum, matematika, dan literasi.</p>
                        <div class="mt-5 grid gap-3 text-sm text-[#434655]">
                            <div class="flex items-center justify-between rounded-2xl bg-[#f1f3ff] px-4 py-3"><span>Jam Pelaksanaan</span><strong>08.00 - 11.00 WIB</strong></div>
                            <div class="flex items-center justify-between rounded-2xl bg-[#f9f9ff] px-4 py-3"><span>Durasi</span><strong>180 menit</strong></div>
                            <div class="flex items-center justify-between rounded-2xl bg-[#f9f9ff] px-4 py-3"><span>Jumlah Soal</span><strong>100 soal</strong></div>
                        </div>
                        <a href="<?php echo e(route('tryout.detail', 'tryout-sma-tka-utbk-dasar')); ?>" class="mt-6 inline-flex w-full justify-center rounded-2xl bg-[#feb700] px-5 py-3 text-sm font-extrabold text-[#271900] transition hover:bg-[#ffca35]">Daftar Try Out</a>
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
<?php /**PATH C:\dev\jagobelajar-cms\resources\views\pages\public\tryout.blade.php ENDPATH**/ ?>