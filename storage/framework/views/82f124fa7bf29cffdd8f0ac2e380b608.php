<?php if (isset($component)) { $__componentOriginal8c0e86a062c1c5bb6d0e151b7076f3fd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c0e86a062c1c5bb6d0e151b7076f3fd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.public','data' => ['title' => $post->title.' - '.config('app.name')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.public'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($post->title.' - '.config('app.name'))]); ?>
    <section class="bg-[#f9f9ff] py-12 sm:py-16">
        <div class="jb-container">
            <a href="<?php echo e(route('blog.index')); ?>" class="inline-flex items-center gap-2 text-sm font-bold text-[#0043c6] transition hover:text-[#003ab1]">&larr; Kembali ke blog</a>
            <article class="mt-6 overflow-hidden rounded-[2rem] bg-white shadow-[0_18px_50px_rgba(20,27,44,0.12)] ring-1 ring-[#e9edff]">
                <div class="aspect-[16/6] overflow-hidden bg-[radial-gradient(circle_at_75%_25%,rgba(255,255,255,0.2),transparent_28%),linear-gradient(135deg,#0043c6,#1e5af0)]">
                    <?php if($post->featured_image_path): ?>
                        <img src="<?php echo e(asset('storage/'.$post->featured_image_path)); ?>" alt="<?php echo e($post->title); ?>" class="h-full w-full object-cover">
                    <?php endif; ?>
                </div>
                <div class="mx-auto max-w-4xl p-6 sm:p-8 lg:p-10">
                    <div class="flex flex-wrap items-center gap-3 text-xs font-bold uppercase tracking-[0.14em] text-[#737687]">
                        <span>Blog Jago Belajar</span><span>&bull;</span><span><?php echo e($post->published_at?->translatedFormat('d F Y') ?? '-'); ?></span><span>&bull;</span><span><?php echo e($post->reading_minutes); ?> menit baca</span>
                    </div>
                    <h1 class="mt-4 text-3xl font-extrabold tracking-tight text-[#141b2c] sm:text-5xl"><?php echo e($post->title); ?></h1>
                    <div class="mt-8 grid gap-4 rounded-3xl bg-[#f1f3ff] p-6 md:grid-cols-3">
                        <?php $__currentLoopData = [['Fokus', 'Artikel belajar'], ['Durasi', $post->reading_minutes.' menit'], ['Topik', 'Jago Belajar']]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$label, $value]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div><p class="text-xs font-bold uppercase tracking-[0.14em] text-[#0043c6]"><?php echo e($label); ?></p><p class="mt-2 text-lg font-extrabold text-[#141b2c]"><?php echo e($value); ?></p></div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="prose prose-slate mt-8 max-w-none prose-headings:font-extrabold prose-headings:text-[#141b2c] prose-p:text-[#5f667d] prose-p:leading-7">
                        <?php echo $post->content; ?>

                    </div>
                </div>
            </article>
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
<?php /**PATH C:\dev\jagobelajar-cms\resources\views/pages/public/blog-detail.blade.php ENDPATH**/ ?>