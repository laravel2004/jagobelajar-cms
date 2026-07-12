<?php if (isset($component)) { $__componentOriginal8c0e86a062c1c5bb6d0e151b7076f3fd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c0e86a062c1c5bb6d0e151b7076f3fd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.public','data' => ['title' => 'Dashboard User - '.config('app.name')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.public'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('Dashboard User - '.config('app.name'))]); ?>
    <section class="bg-[#f9f9ff] py-12 sm:py-16">
        <div class="jb-container space-y-8">
            <?php if(session('status')): ?>
                <div x-data="{ show: true }" x-show="show" class="rounded-[2rem] bg-emerald-50 p-5 shadow-[0_14px_40px_rgba(16,185,129,0.12)] ring-1 ring-emerald-100">
                    <div class="flex items-start gap-4">
                        <div class="grid h-12 w-12 shrink-0 place-items-center rounded-2xl bg-emerald-500 text-xl font-extrabold text-white">&#10003;</div>
                        <div class="min-w-0 flex-1">
                            <p class="text-sm font-bold uppercase tracking-[0.16em] text-emerald-700">Berhasil</p>
                            <h2 class="mt-1 text-xl font-extrabold text-[#141b2c]">Paket gratis aktif</h2>
                            <p class="mt-1 text-sm leading-6 text-emerald-800"><?php echo e(session('status')); ?></p>
                        </div>
                        <button type="button" @click="show = false" class="text-emerald-700 transition hover:text-[#141b2c]">&times;</button>
                    </div>
                </div>
            <?php endif; ?>

            <div class="rounded-[2rem] bg-[radial-gradient(circle_at_85%_12%,rgba(254,183,0,0.35),transparent_28%),linear-gradient(135deg,#0043c6,#1e5af0)] p-6 text-white shadow-[0_18px_50px_rgba(20,27,44,0.14)] sm:p-8">
                <p class="text-xs font-bold uppercase tracking-[0.2em] text-white/75">Dashboard User</p>
                <h1 class="mt-3 text-3xl font-extrabold sm:text-4xl">Halo, <?php echo e($user->name); ?></h1>
                <p class="mt-3 max-w-2xl text-sm leading-7 text-white/80">Lihat paket tryout, paket bimbel, dan paket yang sudah kamu daftar di satu tempat.</p>

                <div class="mt-5 grid gap-3 text-sm sm:grid-cols-3">
                    <div class="rounded-2xl bg-white/12 p-4 ring-1 ring-white/15"><span class="block text-white/70">Email</span><strong><?php echo e($user->email); ?></strong></div>
                    <div class="rounded-2xl bg-white/12 p-4 ring-1 ring-white/15"><span class="block text-white/70">Whatsapp</span><strong><?php echo e($user->whatsapp ?? '-'); ?></strong></div>
                    <div class="rounded-2xl bg-white/12 p-4 ring-1 ring-white/15"><span class="block text-white/70">Paket Terdaftar</span><strong><?php echo e($registeredPackages->count()); ?></strong></div>
                </div>

                <div class="mt-6 rounded-[2rem] bg-white/12 p-5 ring-1 ring-white/15 backdrop-blur-sm">
                    <div class="flex flex-col items-start gap-3 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <h2 class="text-lg font-extrabold text-white">Paket Terdaftar</h2>
                            <p class="text-sm text-white/70">List paket yang sudah kamu beli atau daftar.</p>
                        </div>
                        <span class="rounded-full bg-white/15 px-3 py-1 text-xs font-bold uppercase tracking-[0.16em] text-white ring-1 ring-white/20"><?php echo e($registeredPackages->count()); ?> Paket</span>
                    </div>
                    <div class="mt-4 grid gap-3">
                        <?php $__empty_1 = true; $__currentLoopData = $registeredPackages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="flex flex-col gap-3 rounded-2xl bg-white/12 p-4 ring-1 ring-white/15 transition hover:bg-white/15 sm:flex-row sm:items-center sm:justify-between">
                                <div class="flex items-start gap-3">
                                    <span class="grid h-11 w-11 shrink-0 place-items-center rounded-2xl bg-white/15 text-sm font-extrabold text-white ring-1 ring-white/20"><?php echo e(strtoupper(substr($package->package_type, 0, 1))); ?></span>
                                    <div>
                                        <p class="font-extrabold text-white"><?php echo e($package->package_name); ?></p>
                                        <p class="mt-1 text-sm text-white/70"><?php echo e(ucfirst($package->package_type)); ?> - <?php echo e(ucfirst($package->status)); ?></p>
                                    </div>
                                </div>
                                <div class="flex flex-col items-start gap-2 sm:items-end">
                                    <div class="text-sm text-white/80 sm:text-right">
                                        <p class="font-bold text-[#feb700]"><?php echo e(optional($package->registered_at)->format('d M Y') ?? '-'); ?></p>
                                        <p class="mt-1 text-xs uppercase tracking-[0.16em] text-white/55">Tanggal Daftar</p>
                                    </div>
                                    <?php if($package->join_url): ?>
                                        <a href="<?php echo e($package->join_url); ?>" target="_blank" rel="noopener noreferrer" class="inline-flex justify-center rounded-xl bg-white px-4 py-2 text-xs font-extrabold text-[#0043c6] transition hover:bg-[#f1f3ff]"><?php echo e($package->package_type === 'bimbel' ? 'Masuk ke Forum' : 'Masuk ke Ujian'); ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="rounded-2xl bg-white/12 p-6 text-center text-sm text-white/75 ring-1 ring-white/15">Belum ada paket terdaftar.</div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <section class="rounded-[2rem] bg-white p-6 shadow-[0_14px_40px_rgba(20,27,44,0.08)] ring-1 ring-[#e6eaf5]">
                <div class="flex flex-col items-start gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <h2 class="text-xl font-extrabold text-[#141b2c]">Paket Tryout</h2>
                        <p class="text-sm text-[#8a93a8]">Sesi tryout aktif yang tersedia.</p>
                    </div>
                    <a href="<?php echo e(route('tryout.index')); ?>" class="text-sm font-bold text-[#0043c6]">Lihat semua</a>
                </div>
                <div class="mt-5 grid gap-4 sm:grid-cols-2 xl:grid-cols-3">
                    <?php $__empty_1 = true; $__currentLoopData = $tryoutPackages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php ($displayPrice = $package->is_promo_active && $package->sale_price !== null && $package->sale_price < $package->price ? $package->sale_price : $package->price); ?>
                        <a href="<?php echo e(route('tryout.detail', $package->slug)); ?>" class="overflow-hidden rounded-3xl bg-white shadow-[0_14px_34px_rgba(20,27,44,0.10)] ring-1 ring-[#e9edff] transition hover:-translate-y-1">
                            <div class="relative aspect-[16/9] bg-[radial-gradient(circle_at_75%_25%,rgba(254,183,0,0.55),transparent_30%),linear-gradient(135deg,#0043c6,#1e5af0)] text-white">
                                <?php if($package->image_path): ?>
                                    <img src="<?php echo e(asset('storage/'.$package->image_path)); ?>" alt="<?php echo e($package->title ?? $package->name); ?>" class="h-full w-full object-cover">
                                <?php else: ?>
                                    <div class="grid h-full w-full place-items-center text-white">
                                        <span class="rounded-2xl bg-white/15 px-5 py-3 text-3xl font-extrabold ring-1 ring-white/25"><?php echo e(strtoupper(substr($package->title ?? $package->name, 0, 2))); ?></span>
                                    </div>
                                <?php endif; ?>
                                <span class="absolute left-4 top-4 rounded-full bg-[#feb700] px-3 py-1 text-xs font-bold text-[#271900]"><?php echo e($displayPrice > 0 ? 'Rp'.number_format($displayPrice, 0, ',', '.') : 'Gratis'); ?></span>
                            </div>
                            <div class="p-5">
                                <p class="text-xs font-bold uppercase tracking-[0.18em] text-[#0043c6]"><?php echo e(optional($package->starts_at)->translatedFormat('d M Y') ?? '-'); ?></p>
                                <h3 class="mt-2 text-lg font-extrabold text-[#141b2c]"><?php echo e($package->title ?? $package->name); ?></h3>
                                <p class="mt-2 line-clamp-2 text-sm leading-6 text-[#5f667d]"><?php echo e(\Illuminate\Support\Str::limit(strip_tags($package->description ?: 'Try out aktif yang bisa kamu akses di dashboard.'), 90)); ?></p>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <p class="rounded-2xl bg-[#f9f9ff] p-4 text-sm text-[#8a93a8]">Belum ada paket tryout aktif.</p>
                    <?php endif; ?>
                </div>
            </section>

            <section class="rounded-[2rem] bg-white p-6 shadow-[0_14px_40px_rgba(20,27,44,0.08)] ring-1 ring-[#e6eaf5]">
                <div class="flex flex-col items-start gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <h2 class="text-xl font-extrabold text-[#141b2c]">Paket Bimbel</h2>
                        <p class="text-sm text-[#8a93a8]">Pilihan belajar dengan tutor.</p>
                    </div>
                    <a href="<?php echo e(route('bimbel.index')); ?>" class="text-sm font-bold text-[#0043c6]">Lihat semua</a>
                </div>
                <div class="mt-5 grid gap-4 sm:grid-cols-2 xl:grid-cols-3">
                    <?php $__currentLoopData = $bimbelPackages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e($package['url']); ?>" class="overflow-hidden rounded-3xl bg-white shadow-[0_14px_34px_rgba(20,27,44,0.10)] ring-1 ring-[#e9edff] transition hover:-translate-y-1">
                            <div class="relative aspect-[16/9] bg-[radial-gradient(circle_at_75%_25%,rgba(255,255,255,0.18),transparent_28%),linear-gradient(135deg,#7c5800,#feb700)] text-white">
                                <div class="grid h-full w-full place-items-center">
                                    <span class="rounded-2xl bg-white/15 px-5 py-3 text-xl font-extrabold ring-1 ring-white/25">Bimbel</span>
                                </div>
                                <span class="absolute left-4 top-4 rounded-full bg-white/15 px-3 py-1 text-xs font-bold ring-1 ring-white/20">Paket Belajar</span>
                            </div>
                            <div class="p-5">
                                <h3 class="text-lg font-extrabold text-[#141b2c]"><?php echo e($package['title']); ?></h3>
                                <p class="mt-2 line-clamp-2 text-sm leading-6 text-[#5f667d]"><?php echo e($package['description']); ?></p>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </section>
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


<?php /**PATH /Users/laravel2004/dev/jagobelajar-cms/resources/views/pages/user/dashboard.blade.php ENDPATH**/ ?>