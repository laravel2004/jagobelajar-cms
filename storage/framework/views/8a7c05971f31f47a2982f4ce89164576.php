<?php if (isset($component)) { $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.admin','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('title', null, []); ?> 
        Edit Paket Bundle: <?php echo e($examBundle->name); ?>

     <?php $__env->endSlot(); ?>

    <div class="mb-6 flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Edit Paket Bundle</h2>
            <p class="text-sm text-gray-500">Atur tampilan dan informasi bundle untuk landing page.</p>
        </div>
        <a href="<?php echo e(route('admin.exam-bundles.index')); ?>" class="inline-flex items-center gap-2 text-sm font-medium text-gray-600 hover:text-gray-900">
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
            Kembali
        </a>
    </div>

    <?php if($errors->any()): ?>
        <div class="mb-6 rounded-lg bg-red-50 p-4 text-sm text-red-800 border border-red-200 flex items-start gap-3">
            <svg class="h-5 w-5 text-red-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <ul class="list-disc pl-5 space-y-1">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('admin.exam-bundles.update', $examBundle)); ?>" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="lg:col-span-2 space-y-6">
            <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2 border-gray-100">Informasi Dasar</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="md:col-span-2">
                        <label class="mb-1 block text-sm font-medium text-gray-700">Nama/Judul Bundle Internal</label>
                        <input type="text" name="name" value="<?php echo e(old('name', $examBundle->name)); ?>" class="w-full rounded-lg border border-gray-300 p-2.5 text-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500" required>
                    </div>

                    <div class="md:col-span-2">
                        <label class="mb-1 block text-sm font-medium text-gray-700">Nama Tampil (Landing Page)</label>
                        <input type="text" name="title" value="<?php echo e(old('title', $examBundle->title)); ?>" class="w-full rounded-lg border border-gray-300 p-2.5 text-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500" required>
                    </div>

                    <div class="md:col-span-2">
                        <label class="mb-1 block text-sm font-medium text-gray-700">Slug URL</label>
                        <div class="flex items-center rounded-lg border border-gray-300 bg-gray-50 px-3 text-gray-500 text-sm">
                            <span>/tryout/bundle/</span>
                            <input type="text" name="slug" value="<?php echo e(old('slug', $examBundle->slug)); ?>" class="w-full bg-transparent p-2.5 outline-none font-mono" required>
                        </div>
                    </div>

                    <div class="md:col-span-2">
                        <label class="mb-1 block text-sm font-medium text-gray-700">Deskripsi Lengkap</label>
                        <textarea name="description" rows="5" class="w-full rounded-lg border border-gray-300 p-2.5 text-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500"><?php echo e(old('description', $examBundle->description)); ?></textarea>
                    </div>
                </div>
            </div>

            <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
                <div class="flex items-center justify-between mb-4 border-b pb-2 border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-800">Sesi Ujian yang Termasuk</h3>
                    <span class="text-xs bg-blue-50 text-blue-700 px-2 py-1 rounded border border-blue-100 font-medium"><?php echo e($examBundle->sessions->count()); ?> Terpilih</span>
                </div>
                <p class="text-sm text-gray-500 mb-4">Pilih sesi ujian apa saja yang akan didapatkan user ketika membeli bundle ini.</p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 max-h-[400px] overflow-y-auto p-2 border border-gray-200 rounded-lg bg-gray-50">
                    <?php $__currentLoopData = $allSessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <label class="flex items-start gap-3 p-3 bg-white border border-gray-200 rounded-lg cursor-pointer hover:bg-blue-50 transition">
                            <input type="checkbox" name="session_ids[]" value="<?php echo e($session->id); ?>" class="mt-1 w-4 h-4 text-blue-600 rounded border-gray-300 focus:ring-blue-500" <?php echo e((collect(old('session_ids', $examBundle->sessions->pluck('id')))->contains($session->id)) ? 'checked' : ''); ?>>
                            <div>
                                <p class="text-sm font-medium text-gray-900 leading-tight"><?php echo e($session->title ?? $session->name); ?></p>
                                <p class="text-xs text-gray-500 mt-1"><?php echo e($session->slug); ?></p>
                            </div>
                        </label>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>

        <div class="space-y-6">
            <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2 border-gray-100">Pengaturan Publikasi</h3>

                <div class="space-y-4">
                    <div>
                        <label class="mb-1 block text-sm font-medium text-gray-700">Status Publikasi</label>
                        <select name="status" class="w-full rounded-lg border border-gray-300 p-2.5 text-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">
                            <option value="draft" <?php echo e(old('status', $examBundle->status) === 'draft' ? 'selected' : ''); ?>>Draft (Disembunyikan)</option>
                            <option value="active" <?php echo e(old('status', $examBundle->status) === 'active' ? 'selected' : ''); ?>>Active (Bisa Dibeli)</option>
                            <option value="inactive" <?php echo e(old('status', $examBundle->status) === 'inactive' ? 'selected' : ''); ?>>Inactive (Ditutup)</option>
                        </select>
                        <p class="text-xs text-gray-500 mt-1.5">Untuk status Active, Anda wajib mengisi deskripsi dan cover banner.</p>
                    </div>

                    <div>
                        <label class="mb-1 block text-sm font-medium text-gray-700">Urutan Tampil (Sort Order)</label>
                        <input type="number" name="sort_order" value="<?php echo e(old('sort_order', $examBundle->sort_order)); ?>" min="0" class="w-full rounded-lg border border-gray-300 p-2.5 text-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <p class="text-xs text-gray-500 mt-1">Makin kecil nilainya, makin awal tampil (0 paling atas).</p>
                    </div>

                    <div>
                        <label class="mb-1 block text-sm font-medium text-gray-700">Banner / Cover Bundle</label>
                        <?php if($examBundle->image_path): ?>
                            <div class="mb-2 overflow-hidden rounded-lg border border-gray-200">
                                <img src="<?php echo e(Storage::url($examBundle->image_path)); ?>" alt="<?php echo e($examBundle->title); ?>" class="w-full h-auto object-cover max-h-48">
                            </div>
                        <?php endif; ?>
                        <input type="file" name="image" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:rounded-full file:border-0 file:bg-blue-50 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-blue-700 hover:file:bg-blue-100">
                        <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG. Rekomendasi: 1200x630px.</p>
                    </div>
                </div>
            </div>

            <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2 border-gray-100">Harga & Promo</h3>

                <div class="space-y-4">
                    <div>
                        <label class="mb-1 block text-sm font-medium text-gray-700">Harga Normal (Rp)</label>
                        <input type="number" name="price" value="<?php echo e(old('price', $examBundle->price)); ?>" min="0" class="w-full rounded-lg border border-gray-300 p-2.5 text-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500" required>
                    </div>

                    <label class="flex items-center gap-2 cursor-pointer mt-4 p-3 bg-gray-50 border border-gray-200 rounded-lg">
                        <input type="checkbox" name="is_promo_active" value="1" <?php echo e(old('is_promo_active', $examBundle->is_promo_active) ? 'checked' : ''); ?> class="w-4 h-4 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                        <span class="text-sm font-medium text-gray-700">Aktifkan Harga Promo</span>
                    </label>

                    <label class="flex items-center gap-2 cursor-pointer mt-4 p-3 bg-emerald-50 border border-emerald-200 rounded-lg">
                        <input type="checkbox" name="is_free_package_active" value="1" <?php echo e(old('is_free_package_active', $examBundle->is_free_package_active) ? 'checked' : ''); ?> class="w-4 h-4 text-emerald-600 rounded border-emerald-300 focus:ring-emerald-500">
                        <span class="text-sm font-medium text-emerald-700">Aktifkan Paket Gratis</span>
                    </label>

                    <div>
                        <label class="mb-1 block text-sm font-medium text-gray-700">Harga Promo (Rp)</label>
                        <input type="number" name="sale_price" value="<?php echo e(old('sale_price', $examBundle->sale_price)); ?>" min="0" class="w-full rounded-lg border border-gray-300 p-2.5 text-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">
                    </div>
                </div>
            </div>



            <button type="submit" class="w-full inline-flex items-center justify-center gap-2 rounded-lg bg-blue-600 px-6 py-3 text-sm font-bold text-white shadow-md hover:bg-blue-700 transition">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" /></svg>
                Simpan Perubahan
            </button>
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
<?php /**PATH /Users/laravel2004/dev/jagobelajar-cms/resources/views/pages/admin/exam-bundles/edit.blade.php ENDPATH**/ ?>