<?php if (isset($component)) { $__componentOriginal8c0e86a062c1c5bb6d0e151b7076f3fd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c0e86a062c1c5bb6d0e151b7076f3fd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.public','data' => ['title' => 'Blog - '.config('app.name')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.public'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('Blog - '.config('app.name'))]); ?>
    <section class="bg-[#f9f9ff] py-12 sm:py-16">
        <div class="jb-container">
            <div class="max-w-2xl">
                <h1 class="text-3xl font-extrabold tracking-tight text-[#141b2c] sm:text-4xl">Blog</h1>
                <p class="mt-3 text-sm leading-7 text-[#5f667d] sm:text-base">Kumpulan artikel, tips belajar, dan panduan ringan untuk membantu siswa belajar lebih efektif.</p>
            </div>
            <div class="mt-8 grid gap-6 lg:grid-cols-3">
                <article class="overflow-hidden rounded-3xl bg-white shadow-[0_14px_34px_rgba(20,27,44,0.10)] ring-1 ring-[#e9edff]">
                    <a href="<?php echo e(route('blog.detail', 'tips-belajar-konsisten')); ?>" class="block">
                        <div class="relative aspect-[16/9]" style="background: radial-gradient(circle at 75% 25%, rgba(255,255,255,0.2), transparent 28%), linear-gradient(135deg, #0043c6, #1e5af0);">
                            <div class="absolute inset-0 flex items-end p-5">
                                <span class="rounded-full bg-white/15 px-3 py-1 text-xs font-bold text-white ring-1 ring-white/25">Blog Jago Belajar</span>
                            </div>
                        </div>
                    </a>
                    <div class="p-6">
                        <div class="flex items-center gap-3 text-xs font-bold uppercase tracking-[0.14em] text-[#737687]">
                            <span>12 Juli 2026</span>
                            <span>&bull;</span>
                            <span>5 menit baca</span>
                        </div>
                        <h2 class="mt-4 text-xl font-extrabold leading-snug text-[#141b2c]">
                            <a href="<?php echo e(route('blog.detail', 'tips-belajar-konsisten')); ?>" class="transition hover:text-[#0043c6]">Tips Belajar Konsisten untuk Siswa SD sampai SMA</a>
                        </h2>
                        <p class="mt-3 text-sm leading-7 text-[#5f667d]">Cara sederhana membangun rutinitas belajar yang ringan tapi tetap jalan setiap hari.</p>
                        <a href="<?php echo e(route('blog.detail', 'tips-belajar-konsisten')); ?>" class="mt-5 inline-flex items-center gap-2 text-sm font-extrabold text-[#0043c6]">Baca selengkapnya <span aria-hidden="true">&rarr;</span></a>
                    </div>
                </article>
                <article class="overflow-hidden rounded-3xl bg-white shadow-[0_14px_34px_rgba(20,27,44,0.10)] ring-1 ring-[#e9edff]">
                    <a href="<?php echo e(route('blog.detail', 'strategi-menghadapi-tryout')); ?>" class="block">
                        <div class="relative aspect-[16/9]" style="background: radial-gradient(circle at 75% 25%, rgba(255,255,255,0.2), transparent 28%), linear-gradient(135deg, #7c5800, #feb700);">
                            <div class="absolute inset-0 flex items-end p-5">
                                <span class="rounded-full bg-white/15 px-3 py-1 text-xs font-bold text-white ring-1 ring-white/25">Blog Jago Belajar</span>
                            </div>
                        </div>
                    </a>
                    <div class="p-6">
                        <div class="flex items-center gap-3 text-xs font-bold uppercase tracking-[0.14em] text-[#737687]">
                            <span>15 Juli 2026</span>
                            <span>&bull;</span>
                            <span>6 menit baca</span>
                        </div>
                        <h2 class="mt-4 text-xl font-extrabold leading-snug text-[#141b2c]">
                            <a href="<?php echo e(route('blog.detail', 'strategi-menghadapi-tryout')); ?>" class="transition hover:text-[#0043c6]">Strategi Menghadapi Try Out Tanpa Panik</a>
                        </h2>
                        <p class="mt-3 text-sm leading-7 text-[#5f667d]">Langkah praktis sebelum, saat, dan sesudah try out supaya hasil belajar lebih maksimal.</p>
                        <a href="<?php echo e(route('blog.detail', 'strategi-menghadapi-tryout')); ?>" class="mt-5 inline-flex items-center gap-2 text-sm font-extrabold text-[#0043c6]">Baca selengkapnya <span aria-hidden="true">&rarr;</span></a>
                    </div>
                </article>
                <article class="overflow-hidden rounded-3xl bg-white shadow-[0_14px_34px_rgba(20,27,44,0.10)] ring-1 ring-[#e9edff]">
                    <a href="<?php echo e(route('blog.detail', 'belajar-online-efektif')); ?>" class="block">
                        <div class="relative aspect-[16/9]" style="background: radial-gradient(circle at 75% 25%, rgba(255,255,255,0.2), transparent 28%), linear-gradient(135deg, #4a36c4, #6352dd);">
                            <div class="absolute inset-0 flex items-end p-5">
                                <span class="rounded-full bg-white/15 px-3 py-1 text-xs font-bold text-white ring-1 ring-white/25">Blog Jago Belajar</span>
                            </div>
                        </div>
                    </a>
                    <div class="p-6">
                        <div class="flex items-center gap-3 text-xs font-bold uppercase tracking-[0.14em] text-[#737687]">
                            <span>18 Juli 2026</span>
                            <span>&bull;</span>
                            <span>4 menit baca</span>
                        </div>
                        <h2 class="mt-4 text-xl font-extrabold leading-snug text-[#141b2c]">
                            <a href="<?php echo e(route('blog.detail', 'belajar-online-efektif')); ?>" class="transition hover:text-[#0043c6]">Belajar Online Efektif dari Rumah</a>
                        </h2>
                        <p class="mt-3 text-sm leading-7 text-[#5f667d]">Tips menjaga fokus, mengatur waktu, dan tetap produktif saat mengikuti kelas online.</p>
                        <a href="<?php echo e(route('blog.detail', 'belajar-online-efektif')); ?>" class="mt-5 inline-flex items-center gap-2 text-sm font-extrabold text-[#0043c6]">Baca selengkapnya <span aria-hidden="true">&rarr;</span></a>
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
<?php /**PATH C:\dev\jagobelajar-cms\resources\views\pages\public\blog.blade.php ENDPATH**/ ?>