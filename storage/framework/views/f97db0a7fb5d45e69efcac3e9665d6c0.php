<?php if (isset($component)) { $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.admin','data' => ['title' => 'User - '.config('app.name')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('User - '.config('app.name'))]); ?>
    <div class="space-y-6">
        <section class="overflow-hidden rounded-[2rem] bg-white shadow-[0_18px_55px_rgba(20,27,44,0.08)] ring-1 ring-[#e6eaf5]">
            <div class="relative bg-[radial-gradient(circle_at_85%_10%,rgba(254,183,0,0.35),transparent_28%),linear-gradient(135deg,#0b2f8f,#0043c6_48%,#1e5af0)] p-6 text-white sm:p-8">
                <span class="rounded-full bg-white/15 px-3 py-1 text-xs font-bold uppercase tracking-[0.2em] ring-1 ring-white/20">User Management</span>
                <h1 class="mt-4 text-3xl font-extrabold tracking-tight sm:text-4xl">User</h1>
                <p class="mt-3 max-w-2xl text-sm leading-7 text-white/80">Lihat daftar user dan paket yang sudah mereka daftarkan.</p>
            </div>
        </section>

        <section class="overflow-hidden rounded-[2rem] bg-white shadow-[0_18px_55px_rgba(20,27,44,0.08)] ring-1 ring-[#e6eaf5]">
            <div class="divide-y divide-[#e9edff]">
                <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="flex flex-col gap-4 p-4 sm:p-6 md:flex-row md:items-center md:justify-between">
                        <div class="flex min-w-0 items-start gap-4">
                            <span class="grid h-12 w-12 shrink-0 place-items-center rounded-2xl bg-[#f1f3ff] text-sm font-extrabold text-[#0043c6] ring-1 ring-[#d9def1]"><?php echo e(strtoupper(substr($user->name, 0, 1))); ?></span>
                            <div class="min-w-0">
                                <h2 class="truncate text-lg font-extrabold text-[#141b2c]"><?php echo e($user->name); ?></h2>
                                <p class="mt-1 break-all text-sm text-[#5f667d]"><?php echo e($user->email); ?></p>
                                <div class="mt-2 flex flex-wrap gap-2 text-xs font-bold uppercase tracking-[0.14em]">
                                    <span class="rounded-full bg-[#f1f3ff] px-3 py-1 text-[#0043c6]"><?php echo e($user->role); ?></span>
                                    <span class="rounded-full bg-[#fff8df] px-3 py-1 text-[#7c5800]"><?php echo e($user->packages_count); ?> Paket</span>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo e(route('admin.users.show', $user)); ?>" class="inline-flex justify-center rounded-xl bg-[#0043c6] px-4 py-2.5 text-sm font-bold text-white transition hover:bg-[#003ab1]">Show</a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="p-6 text-sm text-[#5f667d]">Belum ada user.</div>
                <?php endif; ?>
            </div>
        </section>

        <?php echo e($users->links()); ?>

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
<?php /**PATH C:\dev\jagobelajar-cms\resources\views/pages/admin/users/index.blade.php ENDPATH**/ ?>