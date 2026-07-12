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
            <div class="mt-8 grid gap-6 sm:grid-cols-2 xl:grid-cols-3">
                <?php $__empty_1 = true; $__currentLoopData = $bimbels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bimbel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php ($hasPromo = $bimbel->has_promo); ?>
                    <article class="overflow-hidden rounded-3xl bg-white shadow-[0_14px_34px_rgba(20,27,44,0.10)] ring-1 ring-[#e9edff]">
                        <div class="aspect-[16/9] overflow-hidden bg-[radial-gradient(circle_at_75%_25%,rgba(255,255,255,0.18),transparent_28%),linear-gradient(135deg,#0043c6,#1e5af0)]">
                            <?php if($bimbel->image_path): ?>
                                <img src="<?php echo e(asset('storage/'.$bimbel->image_path)); ?>" alt="<?php echo e($bimbel->name); ?>" class="h-full w-full object-cover">
                            <?php endif; ?>
                        </div>
                        <div class="p-6">
                            <div class="flex flex-wrap items-center gap-2">
                                <p class="text-xs font-bold uppercase tracking-[0.16em] text-[#0043c6]"><?php echo e($bimbel->short_label ?: 'Paket Bimbel'); ?></p>
                                <?php if($hasPromo): ?>
                                    <span class="rounded-full bg-rose-500 px-3 py-1 text-xs font-bold text-white">Promo</span>
                                <?php endif; ?>
                            </div>
                            <h2 class="mt-3 text-xl font-extrabold text-[#141b2c]"><?php echo e($bimbel->name); ?></h2>
                            <div class="mt-5 grid gap-3 text-sm text-[#434655]">
                                <div class="flex items-center justify-between rounded-2xl bg-[#f1f3ff] px-4 py-3"><span>Jadwal</span><strong><?php echo e($bimbel->schedule ?: '-'); ?></strong></div>
                                <div class="flex items-center justify-between rounded-2xl bg-[#f9f9ff] px-4 py-3"><span>Metode</span><strong><?php echo e($bimbel->method ?: '-'); ?></strong></div>
                                <div class="rounded-2xl bg-[#f9f9ff] px-4 py-3">
                                    <div class="flex items-center justify-between gap-3">
                                        <span>Harga</span>
                                        <div class="text-right">
                                            <?php if($hasPromo): ?>
                                                <p class="text-base font-extrabold text-rose-500">Rp<?php echo e(number_format($bimbel->display_price, 0, ',', '.')); ?></p>
                                                <p class="text-xs text-[#8a93a8] line-through">Rp<?php echo e(number_format($bimbel->price, 0, ',', '.')); ?></p>
                                            <?php else: ?>
                                                <p class="text-base font-extrabold text-[#141b2c]">Rp<?php echo e(number_format($bimbel->price, 0, ',', '.')); ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-5 border-t border-[#e9edff] pt-5 text-sm leading-6 text-[#5f667d]"><?php echo e(\Illuminate\Support\Str::limit($bimbel->description, 95)); ?></p>
                            <a href="<?php echo e(route('bimbel.detail', $bimbel->slug)); ?>" class="mt-6 inline-flex w-full justify-center rounded-2xl bg-[#feb700] px-5 py-3 text-sm font-extrabold text-[#271900] transition hover:bg-[#ffca35]">Lihat Detail Bimbel</a>
                        </div>
                    </article>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="rounded-3xl bg-white p-6 text-sm text-[#5f667d] ring-1 ring-[#e9edff]">Belum ada paket bimbel.</div>
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
<?php /**PATH /Users/laravel2004/dev/jagobelajar-cms/resources/views/pages/public/bimbel.blade.php ENDPATH**/ ?>