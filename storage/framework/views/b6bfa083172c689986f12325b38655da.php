<?php if (isset($component)) { $__componentOriginal8c0e86a062c1c5bb6d0e151b7076f3fd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c0e86a062c1c5bb6d0e151b7076f3fd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.public','data' => ['title' => $bundle->title ?? $bundle->name . ' - ' . config('app.name')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.public'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($bundle->title ?? $bundle->name . ' - ' . config('app.name'))]); ?>
    <div class="bg-[#f9f9ff] py-10 lg:py-16" x-data="{ openFree: false }">
        <div class="jb-container">
            <div class="mb-6 flex items-center gap-2 text-sm text-[#5f667d]">
                <a href="<?php echo e(route('tryout.index')); ?>" class="hover:text-[#0043c6] transition">Try Out</a>
                <svg class="h-4 w-4 mx-1" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
                <span class="text-[#141b2c] font-medium"><?php echo e($bundle->name); ?></span>
            </div>

            <div class="grid grid-cols-1 gap-8 lg:grid-cols-3 lg:gap-12">
                <div class="lg:col-span-2">
                    <div class="overflow-hidden rounded-3xl bg-white shadow-[0_14px_34px_rgba(20,27,44,0.10)] ring-1 ring-[#e9edff]">
                        <div class="relative grid aspect-[21/9] place-items-center bg-gradient-to-br from-[#0043c6] to-[#4a36c4] text-white">
                            <?php if($bundle->image_path): ?>
                                <img src="<?php echo e(Storage::url($bundle->image_path)); ?>" alt="<?php echo e($bundle->title ?? $bundle->name); ?>" class="h-full w-full object-cover">
                            <?php else: ?>
                                <div class="absolute inset-0 bg-[radial-gradient(circle_at_25%_20%,rgba(255,255,255,0.1),transparent_50%)]"></div>
                                <svg class="h-16 w-16 opacity-50 relative z-10" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>
                            <?php endif; ?>
                        </div>
                        
                        <div class="p-6 md:p-8">
                            <div class="mb-4 inline-flex items-center gap-1.5 rounded-full bg-blue-50 px-3 py-1.5 text-xs font-bold text-blue-700 ring-1 ring-blue-200">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" /></svg> Paket Bundling
                            </div>
                            <h1 class="text-2xl md:text-3xl font-extrabold text-[#141b2c]"><?php echo e($bundle->title ?? $bundle->name); ?></h1>
                            
                            <div class="mt-8 prose prose-blue max-w-none text-[#434655]">
                                <?php echo nl2br(e($bundle->description)); ?>

                            </div>
                        </div>
                    </div>

                    <div class="mt-8 overflow-hidden rounded-3xl bg-white shadow-[0_14px_34px_rgba(20,27,44,0.10)] ring-1 ring-[#e9edff] p-6 md:p-8">
                        <h2 class="text-xl font-extrabold text-[#141b2c] mb-6 border-b border-gray-100 pb-4">Isi Paket Bundle Ini (<?php echo e($bundle->sessions->count()); ?> Sesi Ujian)</h2>
                        
                        <div class="space-y-4">
                            <?php $__empty_1 = true; $__currentLoopData = $bundle->sessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="flex flex-col sm:flex-row gap-4 p-4 rounded-2xl bg-gray-50 border border-gray-100 items-start sm:items-center">
                                    <div class="flex-shrink-0 grid h-12 w-12 place-items-center rounded-xl bg-blue-100 text-blue-600 font-bold">
                                        <?php echo e($loop->iteration); ?>

                                    </div>
                                    <div class="flex-1">
                                        <h3 class="font-bold text-gray-900"><?php echo e($session->title ?? $session->name); ?></h3>
                                        <p class="text-sm text-gray-500 mt-1"><?php echo e($session->subject ?? 'Semua Mapel'); ?> &bull; <?php echo e(optional($session->starts_at)->translatedFormat('d M Y') ?? 'Kapan saja'); ?></p>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <div class="text-center py-6 text-gray-500">
                                    Belum ada sesi ujian yang dimasukkan ke bundle ini.
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-1">
                    <div class="sticky top-24 rounded-3xl bg-white p-6 shadow-[0_14px_34px_rgba(20,27,44,0.10)] ring-1 ring-[#e9edff]">
                        <h3 class="text-lg font-extrabold text-[#141b2c]">Ringkasan Pembayaran</h3>
                        <div class="mt-6 space-y-4 border-b border-gray-100 pb-6">
                            <?php ($hasPromo = $bundle->is_promo_active && $bundle->sale_price !== null && $bundle->sale_price < $bundle->price); ?>
                            <?php ($displayPrice = $hasPromo ? $bundle->sale_price : $bundle->price); ?>
                            
                            <?php if($hasPromo): ?>
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-[#5f667d]">Harga Normal</span>
                                    <span class="font-medium text-[#141b2c] line-through">Rp<?php echo e(number_format($bundle->price, 0, ',', '.')); ?></span>
                                </div>
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-[#5f667d]">Diskon Promo</span>
                                    <span class="font-medium text-rose-500">-Rp<?php echo e(number_format($bundle->price - $displayPrice, 0, ',', '.')); ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="mt-4 flex items-center justify-between">
                            <span class="font-bold text-[#141b2c]">Total</span>
                            <span class="text-2xl font-extrabold text-[#0043c6]"><?php echo e($displayPrice > 0 ? 'Rp'.number_format($displayPrice, 0, ',', '.') : 'Gratis'); ?></span>
                        </div>

                        <div class="mt-8 space-y-3">
                            <?php if($bundle->is_free_package_active): ?>
                                <button type="button" @click="openFree = true" class="w-full flex justify-center items-center gap-2 rounded-2xl bg-emerald-500 px-5 py-4 text-sm font-extrabold text-white shadow-[0_14px_24px_rgba(16,185,129,0.22)] transition hover:-translate-y-0.5 hover:bg-emerald-600">
                                    Daftar Paket Gratis
                                </button>
                            <?php endif; ?>
                            <form action="<?php echo e(route('tryout.bundle.checkout', $bundle->slug)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="w-full flex justify-center items-center gap-2 rounded-2xl bg-[#feb700] px-5 py-4 text-sm font-extrabold text-[#271900] shadow-[0_14px_24px_rgba(254,183,0,0.22)] transition hover:-translate-y-0.5 hover:bg-[#ffca35]">
                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                                    <?php echo e($displayPrice > 0 ? 'Daftar Paket Premium' : 'Daftar Paket'); ?>

                                </button>
                            </form>
                            <?php if(!auth()->check()): ?>
                                <p class="mt-3 text-center text-xs text-[#5f667d]">Anda harus <a href="<?php echo e(route('login')); ?>" class="font-bold text-[#0043c6] hover:underline">masuk</a> terlebih dahulu.</p>
                            <?php endif; ?>
                        </div>
                        
                        <div class="mt-6 grid grid-cols-2 gap-3 text-center text-xs text-[#5f667d]">
                            <div class="rounded-xl bg-[#f9f9ff] p-3">
                                <svg class="mx-auto mb-1 h-6 w-6 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
                                <p class="mt-1 font-medium">Aman & Terpercaya</p>
                            </div>
                            <div class="rounded-xl bg-[#f9f9ff] p-3">
                                <svg class="mx-auto mb-1 h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" /></svg>
                                <p class="mt-1 font-medium">Akses Sekaligus</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div x-cloak x-show="openFree" class="fixed inset-0 z-[9999] flex items-center justify-center px-4" @keydown.escape.window="openFree = false">
            <div class="absolute inset-0 bg-[#141b2c]/60 backdrop-blur-sm" @click="openFree = false"></div>
            <div class="relative w-full max-w-lg rounded-[2rem] bg-white p-6 shadow-[0_20px_60px_rgba(20,27,44,0.22)] ring-1 ring-[#e6eaf5]">
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold uppercase tracking-[0.18em] text-[#0043c6]">Konfirmasi Pendaftaran</p>
                        <h3 class="mt-2 text-2xl font-extrabold text-[#141b2c]">Daftar Bundle Gratis?</h3>
                    </div>
                    <button type="button" @click="openFree = false" class="text-[#8a93a8] transition hover:text-[#141b2c]">&larr;</button>
                </div>
                <form method="POST" action="<?php echo e(route('tryout.bundle.free-register', $bundle->slug)); ?>" enctype="multipart/form-data" class="mt-6">
                    <?php echo csrf_field(); ?>
                    <div class="mb-4">
                        <label class="mb-2 block text-sm font-semibold text-[#141b2c]">Bukti Follow IG/TikTok</label>
                        <input type="file" name="proof_follow" accept="image/*" required class="w-full rounded-xl border border-[#d9def1] px-4 py-3 text-sm">
                        <?php $__errorArgs = ['proof_follow'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-1 text-xs text-rose-500"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mb-4">
                        <label class="mb-2 block text-sm font-semibold text-[#141b2c]">Bukti Komen Postingan Jagobelajar</label>
                        <input type="file" name="proof_comment" accept="image/*" required class="w-full rounded-xl border border-[#d9def1] px-4 py-3 text-sm">
                        <?php $__errorArgs = ['proof_comment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-1 text-xs text-rose-500"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mt-6 flex gap-3">
                        <button type="button" @click="openFree = false" class="inline-flex flex-1 justify-center rounded-2xl border border-[#d9def1] bg-white px-5 py-3 text-sm font-bold text-[#0043c6]">Batal</button>
                        <button type="submit" class="inline-flex flex-1 justify-center rounded-2xl bg-[#0043c6] px-5 py-3 text-sm font-bold text-white">Daftarkan Sekarang</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
<?php /**PATH /Users/laravel2004/dev/jagobelajar-cms/resources/views/pages/public/bundle-detail.blade.php ENDPATH**/ ?>