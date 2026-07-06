<?php if (isset($component)) { $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.admin','data' => ['title' => 'Blog CMS - '.config('app.name')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('Blog CMS - '.config('app.name'))]); ?>
    <div class="space-y-6">
        <?php if(session('status')): ?>
            <div class="rounded-2xl bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-700 ring-1 ring-emerald-100"><?php echo e(session('status')); ?></div>
        <?php endif; ?>

        <section class="overflow-hidden rounded-[2rem] bg-white shadow-[0_18px_55px_rgba(20,27,44,0.08)] ring-1 ring-[#e6eaf5]">
            <div class="relative bg-[radial-gradient(circle_at_85%_10%,rgba(254,183,0,0.35),transparent_28%),linear-gradient(135deg,#0b2f8f,#0043c6_48%,#1e5af0)] p-6 text-white sm:p-8">
                <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                    <div>
                        <span class="rounded-full bg-white/15 px-3 py-1 text-xs font-bold uppercase tracking-[0.2em] ring-1 ring-white/20">CMS Module</span>
                        <h1 class="mt-4 text-3xl font-extrabold tracking-tight sm:text-4xl">Blog</h1>
                        <p class="mt-3 max-w-2xl text-sm leading-7 text-white/80">Kelola artikel yang tampil di halaman `/blog` dan detailnya.</p>
                    </div>
                    <a href="<?php echo e(route('admin.blogs.create')); ?>" class="inline-flex items-center justify-center rounded-2xl bg-[#feb700] px-5 py-3 text-sm font-extrabold text-[#271900] transition hover:bg-[#ffca35]">Tambah Blog</a>
                </div>
            </div>

            <div class="divide-y divide-[#e9edff]">
                <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="flex flex-col gap-4 p-4 sm:p-6 md:flex-row md:items-center md:justify-between">
                        <div class="min-w-0">
                            <p class="text-xs font-bold uppercase tracking-[0.16em] text-[#8a93a8]"><?php echo e($post->published_at?->translatedFormat('d F Y') ?? '-'); ?> · <?php echo e($post->reading_minutes); ?> menit</p>
                            <h2 class="mt-2 text-xl font-extrabold text-[#141b2c]"><?php echo e($post->title); ?></h2>
                            <p class="mt-2 max-w-3xl text-sm leading-6 text-[#5f667d]"><?php echo e($post->excerpt); ?></p>
                        </div>
                        <div class="flex flex-wrap gap-3">
                            <a href="<?php echo e(route('admin.blogs.edit', $post)); ?>" class="rounded-xl bg-[#f1f3ff] px-4 py-2 text-sm font-bold text-[#0043c6]">Edit</a>
                            <form method="POST" action="<?php echo e(route('admin.blogs.destroy', $post)); ?>" onsubmit="return confirm('Hapus blog ini?')">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button class="rounded-xl bg-rose-50 px-4 py-2 text-sm font-bold text-rose-600">Hapus</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="p-6 text-sm text-[#5f667d]">Belum ada blog.</div>
                <?php endif; ?>
            </div>
        </section>

        <?php echo e($posts->links()); ?>

    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3)): ?>
<?php $attributes = $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3; ?>
<?php unset($__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc8c9fd5d7827a77a31381de67195f0c3)): ?>
<?php $component = $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3; ?>
<?php unset($__componentOriginalc8c9fd5d7827a77a31381de67195f0c3); ?>
<?php endif; ?>
<?php /**PATH C:\dev\jagobelajar-cms\resources\views/pages/admin/blogs/index.blade.php ENDPATH**/ ?>