<?php if (isset($component)) { $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.admin','data' => ['title' => $user->name.' - User Detail']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($user->name.' - User Detail')]); ?>
    <div class="space-y-6">
        <section class="overflow-hidden rounded-[2rem] bg-white shadow-[0_18px_55px_rgba(20,27,44,0.08)] ring-1 ring-[#e6eaf5]">
            <div class="relative bg-[radial-gradient(circle_at_85%_10%,rgba(254,183,0,0.35),transparent_28%),linear-gradient(135deg,#0b2f8f,#0043c6_48%,#1e5af0)] p-6 text-white sm:p-8">
                <a href="<?php echo e(route('admin.users.index')); ?>" class="inline-flex text-sm font-bold text-white/80 transition hover:text-white">&larr; Kembali</a>
                <div class="mt-5 flex flex-col gap-5 sm:flex-row sm:items-center">
                    <span class="grid h-16 w-16 shrink-0 place-items-center rounded-3xl bg-white/15 text-2xl font-extrabold text-white ring-1 ring-white/20"><?php echo e(strtoupper(substr($user->name, 0, 1))); ?></span>
                    <div class="min-w-0">
                        <p class="text-xs font-bold uppercase tracking-[0.18em] text-white/70">Detail User</p>
                        <h1 class="mt-2 break-words text-3xl font-extrabold tracking-tight sm:text-4xl"><?php echo e($user->name); ?></h1>
                        <p class="mt-2 break-all text-sm text-white/80"><?php echo e($user->email); ?></p>
                    </div>
                </div>
            </div>
        </section>

        <section class="grid gap-6 lg:grid-cols-[360px_1fr]">
            <aside class="h-fit rounded-[2rem] bg-white p-5 shadow-[0_14px_40px_rgba(20,27,44,0.08)] ring-1 ring-[#e6eaf5] sm:p-6">
                <h2 class="text-xl font-extrabold text-[#141b2c]">Profil</h2>
                <div class="mt-5 grid gap-3 text-sm text-[#434655]">
                    <?php $__currentLoopData = [['Role', ucfirst($user->role)], ['WhatsApp', $user->whatsapp ?: '-'], ['Alamat', $user->address ?: '-'], ['Tanggal Daftar', optional($user->created_at)->format('d M Y') ?: '-']]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$label, $value]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="rounded-2xl bg-[#f9f9ff] px-4 py-3 ring-1 ring-[#e9edff]">
                            <p class="text-xs font-bold uppercase tracking-[0.14em] text-[#8a93a8]"><?php echo e($label); ?></p>
                            <p class="mt-1 break-words font-bold text-[#141b2c]"><?php echo e($value); ?></p>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </aside>

            <div class="rounded-[2rem] bg-white p-5 shadow-[0_14px_40px_rgba(20,27,44,0.08)] ring-1 ring-[#e6eaf5] sm:p-6">
                <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <h2 class="text-xl font-extrabold text-[#141b2c]">Paket Terdaftar</h2>
                        <p class="text-sm text-[#8a93a8]">Daftar paket yang sudah dibeli atau didaftarkan user.</p>
                    </div>
                    <span class="rounded-full bg-[#f1f3ff] px-3 py-1 text-xs font-bold uppercase tracking-[0.16em] text-[#0043c6]"><?php echo e($user->packages->count()); ?> Paket</span>
                </div>

                <div class="mt-5 grid gap-4">
                    <?php $__empty_1 = true; $__currentLoopData = $user->packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <article class="rounded-3xl bg-[#f9f9ff] p-4 ring-1 ring-[#e9edff] sm:p-5">
                            <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
                                <div>
                                    <p class="text-xs font-bold uppercase tracking-[0.16em] text-[#0043c6]"><?php echo e($package->package_type); ?></p>
                                    <h3 class="mt-2 text-lg font-extrabold text-[#141b2c]"><?php echo e($package->package_name); ?></h3>
                                    <p class="mt-1 text-sm text-[#5f667d]">Status: <strong><?php echo e(ucfirst($package->status)); ?></strong></p>
                                    <p class="mt-1 text-sm text-[#5f667d]">Tanggal: <strong><?php echo e(optional($package->registered_at)->format('d M Y') ?? '-'); ?></strong></p>
                                </div>
                                <?php if($package->join_url): ?>
                                    <a href="<?php echo e($package->join_url); ?>" target="_blank" rel="noopener noreferrer" class="inline-flex justify-center rounded-xl bg-white px-4 py-2 text-xs font-extrabold text-[#0043c6] ring-1 ring-[#d9def1] transition hover:bg-[#f1f3ff]"><?php echo e($package->package_type === 'bimbel' ? 'Masuk ke Forum' : 'Masuk ke Ujian'); ?></a>
                                <?php endif; ?>
                            </div>
                        </article>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="rounded-2xl bg-[#f9f9ff] p-5 text-sm text-[#5f667d] ring-1 ring-[#e9edff]">User belum punya paket terdaftar.</div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
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
<?php /**PATH C:\dev\jagobelajar-cms\resources\views/pages/admin/users/show.blade.php ENDPATH**/ ?>