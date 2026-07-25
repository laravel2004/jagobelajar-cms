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
        Kelola Paket Bundle
     <?php $__env->endSlot(); ?>

    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Paket Bundle</h2>
            <p class="text-sm text-gray-500">Kelola dan update data paket bundle dari sistem ujian pusat.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="<?php echo e(route('admin.exam-bundles.create')); ?>" class="inline-flex items-center gap-2 rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" /></svg>
                Tambah Bundle
            </a>
        </div>
    </div>

    <?php if(session('status')): ?>
        <div class="mb-6 rounded-lg bg-green-50 p-4 text-sm text-green-800 border border-green-200 flex items-start gap-3">
            <svg class="h-5 w-5 text-green-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <?php echo e(session('status')); ?>

        </div>
    <?php endif; ?>
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

    <div class="mb-6 grid grid-cols-1 gap-4 sm:grid-cols-4">
        <div class="rounded-xl border border-gray-100 bg-white p-5 shadow-sm">
            <div class="flex items-center gap-4">
                <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-blue-50 text-blue-600">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" /></svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Total Bundle</p>
                    <p class="text-2xl font-bold text-gray-900"><?php echo e(number_format($totalBundles)); ?></p>
                </div>
            </div>
        </div>
        <div class="rounded-xl border border-gray-100 bg-white p-5 shadow-sm">
            <div class="flex items-center gap-4">
                <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-emerald-50 text-emerald-600">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" /></svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Published</p>
                    <p class="text-2xl font-bold text-gray-900"><?php echo e(number_format($publishedCount)); ?></p>
                </div>
            </div>
        </div>
        <div class="rounded-xl border border-gray-100 bg-white p-5 shadow-sm">
            <div class="flex items-center gap-4">
                <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-yellow-50 text-yellow-600">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Draft</p>
                    <p class="text-2xl font-bold text-gray-900"><?php echo e(number_format($draftCount)); ?></p>
                </div>
            </div>
        </div>
        <div class="rounded-xl border border-gray-100 bg-white p-5 shadow-sm">
            <div class="flex items-center gap-4">
                <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-gray-50 text-gray-600">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" /></svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Inactive</p>
                    <p class="text-2xl font-bold text-gray-900"><?php echo e(number_format($inactiveCount)); ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
        <div class="border-b border-gray-200 bg-gray-50 p-4 flex flex-col sm:flex-row justify-between items-center gap-4">
            <h3 class="font-semibold text-gray-800">Daftar Paket Bundle</h3>
            
            <form action="<?php echo e(route('admin.exam-bundles.index')); ?>" method="GET" class="relative w-full sm:w-64">
                <input type="text" name="search" value="<?php echo e($search); ?>" placeholder="Cari bundle..." class="w-full rounded-lg border border-gray-300 pl-10 py-2 pr-4 text-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" /></svg>
            </form>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-600">
                <thead class="bg-gray-50 text-xs uppercase text-gray-700">
                    <tr>
                        <th scope="col" class="px-6 py-4 font-medium">Judul Bundle</th>
                        <th scope="col" class="px-6 py-4 font-medium">Harga</th>
                        <th scope="col" class="px-6 py-4 font-medium text-center">Status</th>
                        <th scope="col" class="px-6 py-4 font-medium">Terakhir Diperbarui</th>
                        <th scope="col" class="px-6 py-4 font-medium text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    <?php $__empty_1 = true; $__currentLoopData = $examBundles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bundle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4">
                                <div class="font-medium text-gray-900"><?php echo e($bundle->title ?? $bundle->name); ?></div>
                                <div class="text-xs text-gray-500 font-mono mt-1"><?php echo e($bundle->slug); ?></div>
                            </td>
                            <td class="px-6 py-4">
                                <?php if($bundle->is_promo_active && $bundle->sale_price !== null && $bundle->sale_price < $bundle->price): ?>
                                    <div class="text-sm font-bold text-emerald-600">Rp<?php echo e(number_format($bundle->sale_price, 0, ',', '.')); ?></div>
                                    <div class="text-xs text-gray-400 line-through">Rp<?php echo e(number_format($bundle->price, 0, ',', '.')); ?></div>
                                <?php else: ?>
                                    <div class="text-sm font-medium text-gray-900">
                                        <?php echo e($bundle->price > 0 ? 'Rp'.number_format($bundle->price, 0, ',', '.') : 'Gratis'); ?>

                                    </div>
                                <?php endif; ?>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <?php if($bundle->status === 'active'): ?>
                                    <span class="inline-flex items-center gap-1 rounded-full bg-emerald-50 px-2 py-1 text-xs font-semibold text-emerald-600 border border-emerald-200">
                                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span> Published
                                    </span>
                                <?php elseif($bundle->status === 'draft'): ?>
                                    <span class="inline-flex items-center gap-1 rounded-full bg-yellow-50 px-2 py-1 text-xs font-semibold text-yellow-600 border border-yellow-200">
                                        <span class="h-1.5 w-1.5 rounded-full bg-yellow-500"></span> Draft
                                    </span>
                                <?php else: ?>
                                    <span class="inline-flex items-center gap-1 rounded-full bg-gray-50 px-2 py-1 text-xs font-semibold text-gray-600 border border-gray-200">
                                        <span class="h-1.5 w-1.5 rounded-full bg-gray-500"></span> Inactive
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td class="px-6 py-4 text-xs whitespace-nowrap">
                                <div class="flex items-center gap-1.5">
                                    <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                    <span><?php echo e($bundle->updated_at?->format('d/m/Y H:i') ?? '-'); ?></span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="<?php echo e(route('admin.exam-bundles.edit', $bundle)); ?>" class="inline-flex items-center gap-1.5 rounded-lg border border-gray-200 bg-white px-3 py-1.5 text-xs font-medium text-gray-700 shadow-sm transition hover:bg-gray-50 hover:text-blue-600">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" /></svg>
                                    Edit
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                                <svg class="mx-auto mb-3 h-12 w-12 text-gray-300" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" /></svg>
                                <p>Belum ada data paket bundle.</p>
                                <p class="mt-1 text-xs">Klik "Tambah Bundle" untuk membuat paket bundle baru.</p>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <?php if($examBundles->hasPages()): ?>
            <div class="border-t border-gray-200 bg-gray-50 px-6 py-4">
                <?php echo e($examBundles->links()); ?>

            </div>
        <?php endif; ?>
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
<?php /**PATH /Users/laravel2004/dev/jagobelajar-cms/resources/views/pages/admin/exam-bundles/index.blade.php ENDPATH**/ ?>