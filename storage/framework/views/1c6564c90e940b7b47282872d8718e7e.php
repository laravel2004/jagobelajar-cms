<?php if (isset($component)) { $__componentOriginal8c0e86a062c1c5bb6d0e151b7076f3fd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c0e86a062c1c5bb6d0e151b7076f3fd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.public','data' => ['title' => $bimbel->name.' - '.config('app.name')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.public'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($bimbel->name.' - '.config('app.name'))]); ?>
    <?php ($hasPromo = $bimbel->has_promo); ?>
    <?php ($displayPrice = $bimbel->display_price); ?>
    <section class="relative overflow-hidden bg-[#f9f9ff] py-12 sm:py-16">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_82%_12%,rgba(254,183,0,0.22),transparent_28%),radial-gradient(circle_at_12%_18%,rgba(30,90,240,0.16),transparent_32%)]"></div>
        <div class="jb-container relative">
            <a href="<?php echo e(route('bimbel.index')); ?>" class="inline-flex items-center gap-2 text-sm font-bold text-[#0043c6] transition hover:text-[#003ab1]">&larr; Kembali ke daftar bimbel</a>

            <div class="mt-6 grid gap-8 lg:grid-cols-[1fr_380px]">
                <article class="overflow-hidden rounded-[2rem] bg-white shadow-[0_18px_50px_rgba(20,27,44,0.12)] ring-1 ring-[#e9edff]">
                    <div class="aspect-[16/7] overflow-hidden bg-[radial-gradient(circle_at_75%_25%,rgba(255,255,255,0.18),transparent_28%),linear-gradient(135deg,#0043c6,#1e5af0)]">
                        <?php if($bimbel->image_path): ?>
                            <img src="<?php echo e(asset('storage/'.$bimbel->image_path)); ?>" alt="<?php echo e($bimbel->name); ?>" class="h-full w-full object-cover">
                        <?php endif; ?>
                    </div>

                    <div class="p-4 sm:p-6 lg:p-8">
                        <?php if($hasPromo): ?>
                            <span class="inline-flex rounded-full bg-rose-500 px-4 py-2 text-xs font-extrabold text-white">Promo Aktif</span>
                        <?php endif; ?>
                        <h1 class="mt-4 text-3xl font-extrabold tracking-tight text-[#141b2c] sm:text-5xl"><?php echo e($bimbel->name); ?></h1>

                        <div class="mt-6 grid gap-4 grid-cols-1 sm:grid-cols-2 md:grid-cols-3">
                            <?php $__currentLoopData = [['Jadwal', $bimbel->schedule ?: '-'], ['Metode', $bimbel->method ?: '-'], ['Level', $bimbel->level ?: '-']]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$label, $value]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="rounded-2xl bg-[#f1f3ff] p-4">
                                    <p class="text-xs font-bold uppercase tracking-[0.16em] text-[#0043c6]"><?php echo e($label); ?></p>
                                    <p class="mt-2 text-lg font-extrabold text-[#141b2c]"><?php echo e($value); ?></p>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <div class="mt-8 rounded-3xl bg-[#fff8df] p-6 ring-1 ring-[#ffdea8]">
                            <h2 class="text-xl font-extrabold text-[#271900]">Alur Belajar</h2>
                            <div class="mt-5 grid gap-3 sm:grid-cols-3">
                                <?php $__currentLoopData = [['1', 'Pilih paket'], ['2', 'Gabung grup'], ['3', 'Mulai belajar']]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$number, $text]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="flex items-center gap-3 rounded-2xl bg-white/70 p-4">
                                        <span class="grid h-9 w-9 shrink-0 place-items-center rounded-full bg-[#feb700] text-sm font-extrabold text-[#271900]"><?php echo e($number); ?></span>
                                        <span class="text-sm font-bold text-[#271900]"><?php echo e($text); ?></span>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>

                        <div class="mt-8 border-t border-[#e9edff] pt-8">
                            <h2 class="text-2xl font-extrabold text-[#141b2c]">Deskripsi Bimbel</h2>
                            <p class="mt-4 text-sm leading-7 text-[#5f667d] sm:text-base"><?php echo e($bimbel->description); ?></p>
                        </div>
                    </div>
                </article>

                <aside class="h-fit rounded-[2rem] bg-white p-6 shadow-[0_18px_50px_rgba(20,27,44,0.12)] ring-1 ring-[#e9edff] lg:sticky lg:top-28">
                    <p class="text-sm font-bold text-[#0043c6]">Ringkasan Paket</p>
                    <h2 class="mt-2 text-2xl font-extrabold text-[#141b2c]"><?php echo e($bimbel->short_label ?: 'Bimbel'); ?></h2>
                    <div class="mt-5 grid gap-3 text-sm text-[#434655]">
                        <?php if($hasPromo): ?>
                            <div class="rounded-2xl bg-[#fff5f5] px-4 py-3 ring-1 ring-rose-100">
                                <p class="text-xs font-bold uppercase tracking-[0.16em] text-rose-500">Promo Bimbel</p>
                                <div class="mt-2 flex items-end justify-between gap-3">
                                    <div>
                                        <p class="text-xl font-extrabold text-rose-500">Rp<?php echo e(number_format($displayPrice, 0, ',', '.')); ?></p>
                                        <p class="text-xs text-[#8a93a8] line-through">Rp<?php echo e(number_format($bimbel->price, 0, ',', '.')); ?></p>
                                    </div>
                                    <span class="rounded-full bg-rose-500 px-3 py-1 text-xs font-bold text-white">Hemat Rp<?php echo e(number_format($bimbel->price - $displayPrice, 0, ',', '.')); ?></span>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="flex items-center justify-between rounded-2xl bg-[#f9f9ff] px-4 py-3 ring-1 ring-[#e9edff]"><span>Harga</span><strong>Rp<?php echo e(number_format($bimbel->price, 0, ',', '.')); ?></strong></div>
                        <?php endif; ?>
                        <div class="flex items-center justify-between rounded-2xl bg-[#f9f9ff] px-4 py-3 ring-1 ring-[#e9edff]"><span>Jumlah Sesi</span><strong><?php echo e($bimbel->sessions_count ?: '-'); ?></strong></div>
                        <div class="flex items-center justify-between rounded-2xl bg-[#f9f9ff] px-4 py-3 ring-1 ring-[#e9edff]"><span>Metode</span><strong><?php echo e($bimbel->method ?: '-'); ?></strong></div>
                    </div>
                    <form method="POST" action="<?php echo e(route('bimbel.checkout', $bimbel)); ?>" class="mt-6">
                        <?php echo csrf_field(); ?>
                        <button class="inline-flex w-full justify-center rounded-2xl bg-[#feb700] px-5 py-4 text-sm font-extrabold text-[#271900] shadow-[0_14px_24px_rgba(254,183,0,0.22)] transition hover:-translate-y-0.5 hover:bg-[#ffca35]">Daftar Sekarang</button>
                    </form>
                </aside>
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
<?php /**PATH C:\dev\jagobelajar-cms\resources\views/pages/public/bimbel-detail.blade.php ENDPATH**/ ?>