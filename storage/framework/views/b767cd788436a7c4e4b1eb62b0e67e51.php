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
            <div class="mt-8 grid gap-6 sm:grid-cols-2 xl:grid-cols-3">
                <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <article class="overflow-hidden rounded-3xl bg-white shadow-[0_14px_34px_rgba(20,27,44,0.10)] ring-1 ring-[#e9edff]">
                        <a href="<?php echo e(route('blog.detail', $post->slug)); ?>" class="block">
                            <div class="relative aspect-[16/9] overflow-hidden bg-[radial-gradient(circle_at_75%_25%,rgba(255,255,255,0.2),transparent_28%),linear-gradient(135deg,#0043c6,#1e5af0)]">
                                <?php if($post->featured_image_path): ?>
                                    <img src="<?php echo e(asset('storage/'.$post->featured_image_path)); ?>" alt="<?php echo e($post->title); ?>" class="h-full w-full object-cover">
                                <?php endif; ?>
                                <div class="absolute inset-0 flex items-end p-5">
                                    <span class="rounded-full bg-white/15 px-3 py-1 text-xs font-bold text-white ring-1 ring-white/25">Blog Jago Belajar</span>
                                </div>
                            </div>
                        </a>
                        <div class="p-6">
                            <div class="flex items-center gap-3 text-xs font-bold uppercase tracking-[0.14em] text-[#737687]">
                                <span><?php echo e($post->published_at?->translatedFormat('d F Y') ?? '-'); ?></span>
                                <span>&bull;</span>
                                <span><?php echo e($post->reading_minutes); ?> menit baca</span>
                            </div>
                            <h2 class="mt-4 text-xl font-extrabold leading-snug text-[#141b2c]"><a href="<?php echo e(route('blog.detail', $post->slug)); ?>" class="transition hover:text-[#0043c6]"><?php echo e($post->title); ?></a></h2>
                            <a href="<?php echo e(route('blog.detail', $post->slug)); ?>" class="mt-5 inline-flex items-center gap-2 text-sm font-extrabold text-[#0043c6]">Baca selengkapnya <span aria-hidden="true">&rarr;</span></a>
                        </div>
                    </article>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="rounded-3xl bg-white p-6 text-sm text-[#5f667d] ring-1 ring-[#e9edff]">Belum ada blog.</div>
                <?php endif; ?>
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
<?php /**PATH C:\dev\jagobelajar-cms\resources\views/pages/public/blog.blade.php ENDPATH**/ ?>