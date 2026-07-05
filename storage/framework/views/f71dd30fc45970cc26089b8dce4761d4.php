<?php if (isset($component)) { $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.admin','data' => ['title' => 'Dashboard - '.config('app.name')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('Dashboard - '.config('app.name'))]); ?>
    <section class="rounded-[1.75rem] border border-[#d9def1] bg-white p-6 shadow-[0_18px_50px_rgba(20,27,44,0.06)] sm:p-8">
        <div class="grid gap-6 lg:grid-cols-[1fr_auto] lg:items-center">
            <div>
                <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#0043c6]">Overview</p>
                <h2 class="mt-2 text-2xl font-semibold tracking-tight text-[#141b2c] sm:text-3xl">Kelola konten Jago Belajar</h2>
                <p class="mt-3 max-w-2xl text-sm leading-7 text-[#64708b]">Pantau materi, latihan soal, diskusi, dan kategori yang tampil di platform belajar.</p>
            </div>
            <a href="<?php echo e(route('home')); ?>" class="inline-flex justify-center rounded-xl bg-[#0043c6] px-5 py-3 text-sm font-semibold text-white transition hover:bg-[#003ab1]">Lihat Website</a>
        </div>
    </section>

    <section class="mt-6 grid gap-4 md:grid-cols-2 xl:grid-cols-4">
        <?php $__currentLoopData = [
            ['Total Materi', $stats['materials'] ?? 0, 'bg-[#eef3ff] text-[#0043c6]'],
            ['Total Soal', $stats['quizzes'] ?? 0, 'bg-[#fff8df] text-[#7c5800]'],
            ['Diskusi', $stats['discussions'] ?? 0, 'bg-[#edf8f2] text-[#1c9b5e]'],
            ['Kategori', $stats['categories'] ?? 0, 'bg-[#f1efff] text-[#4a36c4]'],
        ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$label, $value, $color]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <article class="rounded-2xl border border-[#e6eaf5] bg-white p-5 shadow-[0_12px_30px_rgba(20,27,44,0.04)]">
                <div class="flex items-center justify-between gap-4">
                    <p class="text-sm font-medium text-[#64708b]"><?php echo e($label); ?></p>
                    <span class="grid h-9 w-9 place-items-center rounded-xl <?php echo e($color); ?> text-xs font-bold"><?php echo e(Str::substr($label, 0, 1)); ?></span>
                </div>
                <p class="mt-5 text-3xl font-semibold tracking-tight text-[#141b2c]"><?php echo e($value); ?></p>
            </article>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </section>

    <section class="mt-6 grid gap-6 lg:grid-cols-[1fr_340px]">
        <div class="rounded-2xl border border-[#e6eaf5] bg-white p-5 shadow-[0_12px_30px_rgba(20,27,44,0.04)] sm:p-6">
            <div class="flex items-start justify-between gap-4">
                <div>
                    <h3 class="text-lg font-semibold text-[#141b2c]">Aktivitas Konten</h3>
                    <p class="mt-1 text-sm text-[#64708b]">Ringkasan dummy aktivitas terbaru.</p>
                </div>
                <span class="rounded-full bg-[#f1f3ff] px-3 py-1 text-xs font-semibold text-[#0043c6]">Hari ini</span>
            </div>
            <div class="mt-5 divide-y divide-[#edf0f7]">
                <?php $__currentLoopData = [['Materi baru siap dipublish', 'Matematika - Pecahan'], ['Try out perlu dicek', 'Latihan Pecahan Dasar'], ['Diskusi pinned aktif', 'Tips belajar matematika']]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$title, $desc]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex items-center justify-between gap-4 py-4 first:pt-0 last:pb-0">
                        <div>
                            <p class="text-sm font-semibold text-[#141b2c]"><?php echo e($title); ?></p>
                            <p class="mt-1 text-xs text-[#8a93a8]"><?php echo e($desc); ?></p>
                        </div>
                        <span class="h-2 w-2 rounded-full bg-[#0043c6]"></span>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        <aside class="rounded-2xl border border-[#e6eaf5] bg-white p-5 shadow-[0_12px_30px_rgba(20,27,44,0.04)] sm:p-6">
            <h3 class="text-lg font-semibold text-[#141b2c]">Aksi Cepat</h3>
            <p class="mt-1 text-sm text-[#64708b]">Shortcut admin paling sering dipakai.</p>
            <div class="mt-5 grid gap-3">
                <a href="<?php echo e(route('materials.index')); ?>" class="rounded-xl bg-[#f6f8ff] px-4 py-3 text-sm font-semibold text-[#0043c6] transition hover:bg-[#eef3ff]">Kelola Materi</a>
                <a href="<?php echo e(route('quizzes.index')); ?>" class="rounded-xl bg-[#fffaf0] px-4 py-3 text-sm font-semibold text-[#7c5800] transition hover:bg-[#fff2c7]">Kelola Soal</a>
                <a href="<?php echo e(route('forum.index')); ?>" class="rounded-xl bg-[#f0faf5] px-4 py-3 text-sm font-semibold text-[#1c9b5e] transition hover:bg-[#e8f7ef]">Lihat Forum</a>
            </div>
        </aside>
    </section>
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
<?php /**PATH C:\dev\jagobelajar-cms\resources\views/pages/admin/dashboard.blade.php ENDPATH**/ ?>