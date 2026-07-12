<?php if (isset($component)) { $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.admin','data' => ['title' => 'Sesi Ujian - '.config('app.name')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('Sesi Ujian - '.config('app.name'))]); ?>
    <div class="space-y-6">
        <section class="overflow-hidden rounded-[2rem] bg-white shadow-[0_18px_55px_rgba(20,27,44,0.08)] ring-1 ring-[#e6eaf5]">
            <div class="relative bg-[radial-gradient(circle_at_85%_10%,rgba(254,183,0,0.35),transparent_28%),linear-gradient(135deg,#0b2f8f,#0043c6_48%,#1e5af0)] p-6 text-white sm:p-8">
                <div class="absolute inset-x-0 bottom-0 h-20 bg-gradient-to-t from-black/10 to-transparent"></div>
                <div class="relative flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
                    <div class="max-w-2xl">
                        <span class="inline-flex rounded-full bg-white/15 px-3 py-1 text-xs font-bold uppercase tracking-[0.2em] ring-1 ring-white/20">Admin Module</span>
                        <h2 class="mt-4 text-3xl font-extrabold tracking-tight sm:text-4xl">Sesi Ujian</h2>
                        <p class="mt-3 text-sm leading-7 text-white/80">Ambil sesi dari irt-quiz, simpan sebagai draft, lalu lengkapi konten sebelum tampil di halaman tryout.</p>
                    </div>
                    <form method="POST" action="<?php echo e(route('admin.exam-sessions.fetch')); ?>">
                        <?php echo csrf_field(); ?>
                        <button class="inline-flex items-center justify-center rounded-2xl bg-[#feb700] px-5 py-3 text-sm font-extrabold text-[#271900] shadow-[0_16px_32px_rgba(254,183,0,0.28)] transition hover:-translate-y-0.5 hover:bg-[#ffca35]">
                            Fetch Data
                        </button>
                    </form>
                </div>
            </div>
            <div class="grid gap-px bg-[#e9edff] grid-cols-1 sm:grid-cols-2 xl:grid-cols-4">
                <div class="bg-white p-5"><p class="text-xs font-bold uppercase tracking-[0.18em] text-[#8a93a8]">Total Sesi</p><p class="mt-2 text-3xl font-extrabold text-[#141b2c]"><?php echo e($examSessions->count()); ?></p></div>
                <div class="bg-white p-5"><p class="text-xs font-bold uppercase tracking-[0.18em] text-[#8a93a8]">Published</p><p class="mt-2 text-3xl font-extrabold text-emerald-600"><?php echo e($examSessions->where('status', 'active')->count()); ?></p></div>
                <div class="bg-white p-5"><p class="text-xs font-bold uppercase tracking-[0.18em] text-[#8a93a8]">Draft</p><p class="mt-2 text-3xl font-extrabold text-amber-500"><?php echo e($examSessions->where('status', 'draft')->count()); ?></p></div>
                <div class="bg-white p-5"><p class="text-xs font-bold uppercase tracking-[0.18em] text-[#8a93a8]">Inactive</p><p class="mt-2 text-3xl font-extrabold text-slate-500"><?php echo e($examSessions->where('status', 'inactive')->count()); ?></p></div>
            </div>
        </section>

        <?php if(session('status')): ?>
            <div class="rounded-2xl bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-700 ring-1 ring-emerald-100"><?php echo e(session('status')); ?></div>
        <?php endif; ?>
        <?php if($errors->any()): ?>
            <div class="rounded-2xl bg-rose-50 px-4 py-3 text-sm font-medium text-rose-700 ring-1 ring-rose-100"><?php echo e($errors->first()); ?></div>
        <?php endif; ?>

        <section class="rounded-[2rem] bg-white p-4 shadow-[0_14px_45px_rgba(20,27,44,0.06)] ring-1 ring-[#e6eaf5] sm:p-5">
            <div class="mb-5 flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h3 class="text-lg font-extrabold text-[#141b2c]">Daftar Sesi</h3>
                    <p class="text-sm text-[#8a93a8]">Urut berdasarkan tanggal mulai terbaru dari irt-quiz.</p>
                </div>
                <span class="rounded-full bg-[#f1f3ff] px-4 py-2 text-xs font-bold uppercase tracking-[0.16em] text-[#0043c6]"><?php echo e($examSessions->count()); ?> Item</span>
            </div>

            <div class="overflow-hidden rounded-3xl border border-[#e6eaf5]">
                <div class="hidden grid-cols-[1.45fr_1fr_1fr_0.8fr_0.7fr] gap-4 bg-[#f9f9ff] px-5 py-3 text-xs font-bold uppercase tracking-[0.16em] text-[#8a93a8] xl:grid">
                    <span>Sesi</span>
                    <span>Jadwal</span>
                    <span>Mata Pelajaran</span>
                    <span>Harga</span>
                    <span class="text-right">Aksi</span>
                </div>

                <div class="divide-y divide-[#e6eaf5]">
                    <?php $__empty_1 = true; $__currentLoopData = $examSessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $examSession): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php ($statusClass = ['active' => 'bg-emerald-50 text-emerald-700 ring-emerald-100', 'draft' => 'bg-amber-50 text-amber-700 ring-amber-100', 'inactive' => 'bg-slate-100 text-slate-600 ring-slate-200'][$examSession->status] ?? 'bg-slate-100 text-slate-600 ring-slate-200'); ?>
                        <article class="grid gap-4 bg-white p-5 transition hover:bg-[#fbfcff] xl:grid-cols-[1.45fr_1fr_1fr_0.8fr_0.7fr] xl:items-center">
                            <div class="flex gap-4">
                                <div class="relative h-16 w-16 shrink-0 overflow-hidden rounded-2xl bg-[linear-gradient(135deg,#0043c6,#1e5af0)] shadow-sm">
                                    <?php if($examSession->image_path): ?>
                                        <img src="<?php echo e(asset('storage/'.$examSession->image_path)); ?>" alt="<?php echo e($examSession->title ?? $examSession->name); ?>" class="h-full w-full object-cover">
                                    <?php else: ?>
                                        <div class="grid h-full w-full place-items-center text-sm font-extrabold text-white"><?php echo e(strtoupper(substr($examSession->title ?? $examSession->name, 0, 2))); ?></div>
                                    <?php endif; ?>
                                </div>
                                <div class="min-w-0">
                                    <div class="flex flex-wrap items-center gap-2">
                                        <h4 class="truncate text-base font-extrabold text-[#141b2c]"><?php echo e($examSession->title ?? $examSession->name); ?></h4>
                                        <span class="rounded-full px-2.5 py-1 text-[11px] font-bold ring-1 <?php echo e($statusClass); ?>"><?php echo e(ucfirst($examSession->status)); ?></span>
                                    </div>
                                    <p class="mt-1 truncate text-sm text-[#8a93a8]">Source: <?php echo e($examSession->name); ?></p>
                                    <p class="mt-2 line-clamp-1 text-sm text-[#5f667d]"><?php echo e($examSession->description ?: 'Belum ada deskripsi. Lengkapi sebelum publish.'); ?></p>
                                </div>
                            </div>

                            <div class="rounded-2xl bg-[#f9f9ff] px-4 py-3 text-sm text-[#434655] ring-1 ring-[#edf0ff] xl:bg-transparent xl:px-0 xl:ring-0">
                                <p class="font-bold text-[#141b2c]"><?php echo e(optional($examSession->starts_at)->translatedFormat('d M Y') ?? '-'); ?></p>
                                <p class="mt-1 text-xs text-[#8a93a8]"><?php echo e(optional($examSession->starts_at)->format('H:i') ?? '-'); ?> - <?php echo e(optional($examSession->ends_at)->format('H:i') ?? '-'); ?> WIB</p>
                            </div>

                            <div class="text-sm text-[#434655]">
                                <span class="inline-flex rounded-full bg-[#f1f3ff] px-3 py-1.5 text-xs font-bold text-[#0043c6]"><?php echo e($examSession->subject ?? 'Belum ada mapel'); ?></span>
                            </div>

                            <div class="text-sm">
                                <p class="font-extrabold text-[#141b2c]">Rp<?php echo e(number_format($examSession->sale_price ?? $examSession->price, 0, ',', '.')); ?></p>
                                <?php if($examSession->sale_price): ?>
                                    <p class="text-xs text-[#8a93a8] line-through">Rp<?php echo e(number_format($examSession->price, 0, ',', '.')); ?></p>
                                <?php endif; ?>
                            </div>

                            <div class="flex justify-end">
                                <a href="<?php echo e(route('admin.exam-sessions.edit', $examSession)); ?>" class="inline-flex items-center justify-center rounded-2xl bg-[#141b2c] px-4 py-2.5 text-sm font-bold text-white transition hover:-translate-y-0.5 hover:bg-[#0043c6]">Edit</a>
                            </div>
                        </article>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="p-10 text-center">
                            <div class="mx-auto grid h-14 w-14 place-items-center rounded-2xl bg-[#f1f3ff] text-2xl">&#8635;</div>
                            <h4 class="mt-4 font-extrabold text-[#141b2c]">Belum ada sesi ujian</h4>
                            <p class="mt-2 text-sm text-[#8a93a8]">Klik Fetch Data untuk mengambil sesi dari irt-quiz.</p>
                        </div>
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

<?php /**PATH /Users/laravel2004/dev/jagobelajar-cms/resources/views/pages/admin/exam-sessions/index.blade.php ENDPATH**/ ?>