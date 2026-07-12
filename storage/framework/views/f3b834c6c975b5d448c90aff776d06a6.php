<?php if (isset($component)) { $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.admin','data' => ['title' => 'Edit Sesi Ujian - '.config('app.name')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('Edit Sesi Ujian - '.config('app.name'))]); ?>
    <form method="POST" action="<?php echo e(route('admin.exam-sessions.update', $examSession)); ?>" enctype="multipart/form-data" class="space-y-6">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <section class="overflow-hidden rounded-[2rem] bg-white shadow-[0_18px_55px_rgba(20,27,44,0.08)] ring-1 ring-[#e6eaf5]">
            <div class="relative bg-[radial-gradient(circle_at_85%_10%,rgba(254,183,0,0.35),transparent_28%),linear-gradient(135deg,#0b2f8f,#0043c6_48%,#1e5af0)] p-6 text-white sm:p-8">
                <a href="<?php echo e(route('admin.exam-sessions.index')); ?>" class="inline-flex text-sm font-bold text-white/80 transition hover:text-white">&larr; Kembali</a>
                <div class="mt-5 grid gap-6 lg:grid-cols-[1fr_320px] lg:items-end">
                    <div>
                        <span class="rounded-full bg-white/15 px-3 py-1 text-xs font-bold uppercase tracking-[0.2em] ring-1 ring-white/20">Edit Tryout Detail</span>
                        <h2 class="mt-4 text-3xl font-extrabold tracking-tight sm:text-4xl"><?php echo e($examSession->title ?? $examSession->name); ?></h2>
                        <p class="mt-3 text-sm leading-7 text-white/80">Field di bawah mengikuti card dan detail yang tampil di halaman publik `/tryout`.</p>
                    </div>
                    <div class="rounded-3xl bg-white/12 p-4 ring-1 ring-white/20 backdrop-blur">
                        <p class="text-xs font-bold uppercase tracking-[0.18em] text-white/70">Source irt-quiz</p>
                        <p class="mt-2 font-bold"><?php echo e($examSession->name); ?></p>
                        <p class="mt-1 text-sm text-white/75"><?php echo e($examSession->subject ?? '-'); ?></p>
                    </div>
                </div>
            </div>
        </section>

        <?php if($errors->any()): ?>
            <div class="rounded-2xl bg-rose-50 px-4 py-3 text-sm font-medium text-rose-700 ring-1 ring-rose-100"><?php echo e($errors->first()); ?></div>
        <?php endif; ?>

        <div class="grid gap-6 xl:grid-cols-[1.35fr_0.8fr]">
            <section class="rounded-[2rem] bg-white p-5 shadow-[0_14px_45px_rgba(20,27,44,0.06)] ring-1 ring-[#e6eaf5] sm:p-6">
                <div>
                    <h3 class="text-lg font-extrabold text-[#141b2c]">Konten Publik</h3>
                    <p class="text-sm text-[#8a93a8]">Ini yang muncul di card `/tryout` dan halaman detail tryout.</p>
                </div>

                <div class="mt-5 grid gap-4 md:grid-cols-2">
                    <label class="md:col-span-2">
                        <span class="mb-2 block text-sm font-bold text-[#141b2c]">Judul Tryout</span>
                        <input name="title" value="<?php echo e(old('title', $examSession->title)); ?>" class="w-full rounded-2xl border-[#d9def1] px-4 py-3 text-sm" placeholder="Contoh: Try Out TKA SD Paket 1">
                    </label>

                    <label class="md:col-span-2">
                        <span class="mb-2 block text-sm font-bold text-[#141b2c]">Slug Detail</span>
                        <input name="slug" value="<?php echo e(old('slug', $examSession->slug)); ?>" class="w-full rounded-2xl border-[#d9def1] px-4 py-3 text-sm" placeholder="try-out-tka-sd-paket-1">
                    </label>

                    <label>
                        <span class="mb-2 block text-sm font-bold text-[#141b2c]">Harga Normal</span>
                        <input name="price" type="number" value="<?php echo e(old('price', $examSession->price)); ?>" class="w-full rounded-2xl border-[#d9def1] px-4 py-3 text-sm" placeholder="0">
                    </label>

                    <label>
                        <span class="mb-2 block text-sm font-bold text-[#141b2c]">Harga Promo</span>
                        <input name="sale_price" type="number" value="<?php echo e(old('sale_price', $examSession->sale_price)); ?>" class="w-full rounded-2xl border-[#d9def1] px-4 py-3 text-sm" placeholder="Opsional">
                    </label>

                    <label class="rounded-2xl bg-[#f9f9ff] p-4 ring-1 ring-[#e6eaf5]">
                        <span class="flex items-center justify-between gap-3 text-sm font-bold text-[#141b2c]">
                            Aktifkan Harga Promo Premium
                            <input type="checkbox" name="is_promo_active" value="1" <?php if(old('is_promo_active', $examSession->is_promo_active)): echo 'checked'; endif; ?> class="h-5 w-5 rounded border-[#d9def1] text-[#0043c6]">
                        </span>
                        <span class="mt-2 block text-xs leading-5 text-[#8a93a8]">Jika aktif, harga paket premium memakai harga promo.</span>
                    </label>

                    <label class="rounded-2xl bg-[#f9f9ff] p-4 ring-1 ring-[#e6eaf5]">
                        <span class="flex items-center justify-between gap-3 text-sm font-bold text-[#141b2c]">
                            Aktifkan Paket Gratis
                            <input type="checkbox" name="is_free_package_active" value="1" <?php if(old('is_free_package_active', $examSession->is_free_package_active)): echo 'checked'; endif; ?> class="h-5 w-5 rounded border-[#d9def1] text-[#0043c6]">
                        </span>
                        <span class="mt-2 block text-xs leading-5 text-[#8a93a8]">Jika aktif, detail tryout menampilkan tombol gratis dan premium sekaligus.</span>
                    </label>

                    <label>
                        <span class="mb-2 block text-sm font-bold text-[#141b2c]">Status Publish</span>
                        <select name="status" class="w-full rounded-2xl border-[#d9def1] px-4 py-3 text-sm">
                            <?php $__currentLoopData = ['draft' => 'Draft', 'active' => 'Active / Tampil', 'inactive' => 'Inactive / Sembunyi']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($value); ?>" <?php if(old('status', $examSession->status) === $value): echo 'selected'; endif; ?>><?php echo e($label); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </label>

                    <label>
                        <span class="mb-2 block text-sm font-bold text-[#141b2c]">Urutan Card</span>
                        <input name="sort_order" type="number" value="<?php echo e(old('sort_order', $examSession->sort_order)); ?>" class="w-full rounded-2xl border-[#d9def1] px-4 py-3 text-sm" placeholder="0">
                    </label>

                    <label class="md:col-span-2">
                        <span class="mb-2 block text-sm font-bold text-[#141b2c]">Deskripsi Detail</span>
                        <textarea name="description" rows="8" class="w-full rounded-2xl border-[#d9def1] px-4 py-3 text-sm" placeholder="Deskripsi yang tampil di detail tryout"><?php echo e(old('description', $examSession->description)); ?></textarea>
                    </label>

                    <label class="md:col-span-2">
                        <span class="mb-2 block text-sm font-bold text-[#141b2c]">Gambar Card & Detail</span>
                        <input type="file" name="image" accept="image/*" class="w-full rounded-2xl border border-dashed border-[#d9def1] px-4 py-3 text-sm">
                    </label>
                </div>
            </section>

            <aside class="space-y-6">
                <section class="overflow-hidden rounded-[2rem] bg-white shadow-[0_14px_45px_rgba(20,27,44,0.06)] ring-1 ring-[#e6eaf5]">
                    <div class="relative aspect-[16/9] bg-[radial-gradient(circle_at_75%_25%,rgba(254,183,0,0.55),transparent_30%),linear-gradient(135deg,#0043c6,#1e5af0)]">
                        <?php if($examSession->image_path): ?>
                            <img src="<?php echo e(asset('storage/'.$examSession->image_path)); ?>" alt="<?php echo e($examSession->title); ?>" class="h-full w-full object-cover">
                        <?php else: ?>
                            <div class="grid h-full w-full place-items-center text-white"><span class="rounded-2xl bg-white/15 px-5 py-3 text-3xl font-extrabold ring-1 ring-white/25"><?php echo e(strtoupper(substr($examSession->title ?? $examSession->name, 0, 3))); ?></span></div>
                        <?php endif; ?>
                    </div>
                    <div class="p-5">
                        <p class="text-xs font-bold uppercase tracking-[0.18em] text-[#0043c6]">Preview Card</p>
                        <h3 class="mt-2 text-xl font-extrabold text-[#141b2c]"><?php echo e(old('title', $examSession->title)); ?></h3>
                        <p class="mt-2 line-clamp-2 text-sm leading-6 text-[#5f667d]"><?php echo e(old('description', $examSession->description) ?: 'Belum ada deskripsi.'); ?></p>
                    </div>
                </section>

                <section class="rounded-[2rem] bg-white p-5 shadow-[0_14px_45px_rgba(20,27,44,0.06)] ring-1 ring-[#e6eaf5]">
                    <h3 class="text-lg font-extrabold text-[#141b2c]">Data Jadwal dari irt-quiz</h3>
                    <div class="mt-4 grid gap-3 text-sm text-[#434655]">
                        <div class="flex items-center justify-between rounded-2xl bg-[#f9f9ff] px-4 py-3"><span>Mata Pelajaran</span><strong><?php echo e($examSession->subject ?? '-'); ?></strong></div>
                        <div class="flex items-center justify-between rounded-2xl bg-[#f9f9ff] px-4 py-3"><span>Tanggal</span><strong><?php echo e(optional($examSession->starts_at)->format('d M Y') ?? '-'); ?></strong></div>
                        <div class="flex items-center justify-between rounded-2xl bg-[#f9f9ff] px-4 py-3"><span>Mulai</span><strong><?php echo e(optional($examSession->starts_at)->format('H:i') ?? '-'); ?></strong></div>
                        <div class="flex items-center justify-between rounded-2xl bg-[#f9f9ff] px-4 py-3"><span>Selesai</span><strong><?php echo e(optional($examSession->ends_at)->format('H:i') ?? '-'); ?></strong></div>
                        <div class="flex items-center justify-between rounded-2xl bg-[#f9f9ff] px-4 py-3"><span>External ID</span><strong><?php echo e($examSession->external_id); ?></strong></div>
                    </div>
                </section>

                <button class="w-full rounded-2xl bg-[#0043c6] px-5 py-4 text-sm font-extrabold text-white shadow-[0_14px_28px_rgba(0,67,198,0.24)] transition hover:-translate-y-0.5 hover:bg-[#003ab1]">Simpan Perubahan</button>
            </aside>
        </div>
    </form>
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

<?php /**PATH /Users/laravel2004/dev/jagobelajar-cms/resources/views/pages/admin/exam-sessions/edit.blade.php ENDPATH**/ ?>