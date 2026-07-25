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
                <h1 class="text-3xl font-extrabold tracking-tight text-[#141b2c] sm:text-4xl">Try Out & Paket Bundle</h1>
                <p class="mt-3 text-sm leading-7 text-[#5f667d] sm:text-base">Pilih simulasi ujian sesuai jenjang, lengkap dengan jadwal pelaksanaan dan detail paket. Lebih hemat dengan membeli paket bundle!</p>
            </div>

            <?php if(isset($examBundles) && $examBundles->isNotEmpty()): ?>
            <div class="mt-12">
                <h2 class="text-2xl font-extrabold text-[#141b2c] mb-6 flex items-center gap-2">
                    <svg class="h-6 w-6 text-[#feb700]" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                    Paket Bundling Spesial
                </h2>
                <div class="grid gap-6 sm:grid-cols-2 xl:grid-cols-3">
                    <?php $__currentLoopData = $examBundles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bundle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php ($hasPromo = $bundle->is_promo_active && $bundle->sale_price !== null && $bundle->sale_price < $bundle->price); ?>
                        <?php ($displayPrice = $hasPromo ? $bundle->sale_price : $bundle->price); ?>
                        <article class="overflow-hidden rounded-3xl bg-white shadow-[0_14px_34px_rgba(20,27,44,0.10)] ring-1 ring-[#e9edff] border-2 border-[#feb700]/50 relative">
                            <div class="absolute top-0 right-0 bg-[#feb700] text-[#271900] text-xs font-bold px-4 py-1.5 rounded-bl-xl z-10 uppercase tracking-widest">HEMAT</div>
                            <div class="relative grid aspect-[16/9] place-items-center overflow-hidden bg-gradient-to-br from-[#0043c6] to-[#4a36c4] text-white">
                                <?php if($bundle->image_path): ?>
                                    <img src="<?php echo e(asset('storage/'.$bundle->image_path)); ?>" alt="<?php echo e($bundle->title ?? $bundle->name); ?>" class="h-full w-full object-cover">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-black/20 to-transparent"></div>
                                <?php else: ?>
                                    <div class="absolute inset-0 bg-[radial-gradient(circle_at_25%_20%,rgba(255,255,255,0.1),transparent_50%)]"></div>
                                    <div class="relative flex flex-col items-center text-center">
                                        <span class="grid h-16 w-16 place-items-center rounded-2xl bg-white/20 ring-1 ring-white/30 backdrop-blur">
                                            <svg class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                                        </span>
                                    </div>
                                <?php endif; ?>
                                <div class="absolute left-4 top-4 flex flex-col gap-2">
                                    <?php if($hasPromo): ?>
                                        <span class="rounded-full bg-rose-500 px-3 py-1 text-xs font-bold text-white shadow-sm shadow-rose-500/30">Promo Bundle</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="p-6">
                                <h2 class="text-xl font-extrabold text-[#141b2c]"><?php echo e($bundle->title ?? $bundle->name); ?></h2>
                                <p class="mt-3 text-sm leading-6 text-[#5f667d]"><?php echo e(\Illuminate\Support\Str::limit(strip_tags($bundle->description ?: 'Paket bundle hemat untuk beberapa sesi ujian sekaligus.'), 110)); ?></p>
                                <div class="mt-4">
                                    <?php if($hasPromo): ?>
                                        <div class="flex items-end gap-2">
                                            <span class="text-2xl font-extrabold text-rose-500">Rp<?php echo e(number_format($displayPrice, 0, ',', '.')); ?></span>
                                            <span class="pb-0.5 text-sm text-[#8a93a8] line-through">Rp<?php echo e(number_format($bundle->price, 0, ',', '.')); ?></span>
                                        </div>
                                    <?php else: ?>
                                        <p class="text-lg font-extrabold text-[#141b2c]"><?php echo e($displayPrice > 0 ? 'Rp'.number_format($displayPrice, 0, ',', '.') : 'Gratis'); ?></p>
                                    <?php endif; ?>
                                </div>
                                <a href="<?php echo e(route('tryout.bundle.detail', $bundle->slug)); ?>" class="mt-6 inline-flex w-full justify-center rounded-2xl bg-[#0043c6] px-5 py-3 text-sm font-extrabold text-white transition hover:bg-[#1e5af0]">Lihat Isi Bundle</a>
                            </div>
                        </article>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <?php endif; ?>

            <div class="mt-16">
                <h2 class="text-2xl font-extrabold text-[#141b2c] mb-6">Sesi Ujian Satuan</h2>
                <div class="grid gap-6 sm:grid-cols-2 xl:grid-cols-3">
                    <?php $__empty_1 = true; $__currentLoopData = $examSessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $examSession): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php ($hasPromo = $examSession->is_promo_active && $examSession->sale_price !== null && $examSession->sale_price < $examSession->price); ?>
                        <?php ($displayPrice = $hasPromo ? $examSession->sale_price : $examSession->price); ?>
                        <article class="overflow-hidden rounded-3xl bg-white shadow-[0_14px_34px_rgba(20,27,44,0.10)] ring-1 ring-[#e9edff]">
                            <div class="relative grid aspect-[16/9] place-items-center overflow-hidden bg-[radial-gradient(circle_at_75%_25%,rgba(254,183,0,0.55),transparent_30%),linear-gradient(135deg,#0043c6,#1e5af0)] text-white">
                                <?php if($examSession->image_path): ?>
                                    <img src="<?php echo e(asset('storage/'.$examSession->image_path)); ?>" alt="<?php echo e($examSession->title ?? $examSession->name); ?>" class="h-full w-full object-cover">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/35 via-transparent to-transparent"></div>
                                <?php else: ?>
                                    <div class="absolute inset-0 bg-[radial-gradient(circle_at_25%_20%,rgba(255,255,255,0.22),transparent_24%),radial-gradient(circle_at_80%_18%,rgba(254,183,0,0.45),transparent_24%),linear-gradient(135deg,#0043c6,#1e5af0)]"></div>
                                    <div class="relative flex flex-col items-center text-center">
                                        <span class="grid h-16 w-16 place-items-center rounded-2xl bg-white/15 text-2xl font-extrabold ring-1 ring-white/25 backdrop-blur"><?php echo e(strtoupper(substr($examSession->title ?? $examSession->name, 0, 2))); ?></span>
                                        <span class="mt-3 rounded-full bg-white/15 px-4 py-1.5 text-xs font-bold uppercase tracking-[0.16em] ring-1 ring-white/20">Try Out</span>
                                    </div>
                                <?php endif; ?>
                                <div class="absolute left-4 top-4 flex flex-col gap-2">
                                    <?php if($hasPromo): ?>
                                        <span class="rounded-full bg-rose-500 px-3 py-1 text-xs font-bold text-white shadow-sm">Promo</span>
                                    <?php endif; ?>
                                    <span class="rounded-full bg-[#feb700] px-3 py-1 text-xs font-bold text-[#271900]"><?php echo e($displayPrice > 0 ? 'Rp'.number_format($displayPrice, 0, ',', '.') : 'Gratis'); ?></span>
                                </div>
                            </div>
                            <div class="p-6">
                                <p class="text-xs font-bold uppercase tracking-[0.18em] text-[#0043c6]"><?php echo e(optional($examSession->starts_at)->translatedFormat('l, d F Y') ?? '-'); ?></p>
                                <h2 class="mt-3 text-xl font-extrabold text-[#141b2c]"><?php echo e($examSession->title ?? $examSession->name); ?></h2>
                                <p class="mt-3 text-sm leading-6 text-[#5f667d]"><?php echo e(\Illuminate\Support\Str::limit(strip_tags($examSession->description ?: 'Try out ini dirancang sebagai simulasi yang mendekati ujian sesungguhnya.'), 110)); ?></p>
                                <div class="mt-4">
                                    <?php if($hasPromo): ?>
                                        <div class="flex items-end gap-2">
                                            <span class="text-2xl font-extrabold text-rose-500">Rp<?php echo e(number_format($displayPrice, 0, ',', '.')); ?></span>
                                            <span class="pb-0.5 text-sm text-[#8a93a8] line-through">Rp<?php echo e(number_format($examSession->price, 0, ',', '.')); ?></span>
                                        </div>
                                        <p class="mt-1 text-xs font-bold uppercase tracking-[0.16em] text-rose-500">Hemat Rp<?php echo e(number_format($examSession->price - $displayPrice, 0, ',', '.')); ?></p>
                                    <?php else: ?>
                                        <p class="text-lg font-extrabold text-[#141b2c]"><?php echo e($displayPrice > 0 ? 'Rp'.number_format($displayPrice, 0, ',', '.') : 'Gratis'); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="mt-5 grid gap-3 text-sm text-[#434655]">
                                    <div class="flex items-center justify-between rounded-2xl bg-[#f1f3ff] px-4 py-3"><span>Mapel</span><strong><?php echo e($examSession->subject ?? '-'); ?></strong></div>
                                    <div class="flex items-center justify-between rounded-2xl bg-[#f9f9ff] px-4 py-3"><span>Jadwal</span><strong><?php echo e(optional($examSession->starts_at)->format('H:i') ?? '-'); ?> - <?php echo e(optional($examSession->ends_at)->format('H:i') ?? '-'); ?></strong></div>
                                </div>
                                <a href="<?php echo e(route('tryout.detail', $examSession->slug)); ?>" class="mt-6 inline-flex w-full justify-center rounded-2xl bg-[#feb700] px-5 py-3 text-sm font-extrabold text-[#271900] transition hover:bg-[#ffca35]">Lihat Detail</a>
                            </div>
                        </article>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="rounded-3xl bg-white p-8 text-sm text-[#64708b] ring-1 ring-[#e9edff] lg:col-span-3">Belum ada sesi ujian aktif.</div>
                    <?php endif; ?>
                </div>
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
<?php /**PATH /Users/laravel2004/dev/jagobelajar-cms/resources/views/pages/public/tryout.blade.php ENDPATH**/ ?>