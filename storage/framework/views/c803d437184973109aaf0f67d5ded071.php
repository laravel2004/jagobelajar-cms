<?php if (isset($component)) { $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.admin','data' => ['title' => ($bimbel->exists ? 'Edit Bimbel' : 'Tambah Bimbel').' - '.config('app.name')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(($bimbel->exists ? 'Edit Bimbel' : 'Tambah Bimbel').' - '.config('app.name'))]); ?>
    <form method="POST" enctype="multipart/form-data" action="<?php echo e($bimbel->exists ? route('admin.bimbel.update', $bimbel) : route('admin.bimbel.store')); ?>" class="space-y-6">
        <?php echo csrf_field(); ?>
        <?php if($bimbel->exists): ?>
            <?php echo method_field('PUT'); ?>
        <?php endif; ?>

        <section class="rounded-[2rem] bg-white p-6 shadow-[0_18px_55px_rgba(20,27,44,0.08)] ring-1 ring-[#e6eaf5] sm:p-8 space-y-5">
            <div class="grid gap-5 lg:grid-cols-[1fr_320px]">
                <div class="space-y-5">
                    <div>
                        <label class="text-sm font-bold text-[#141b2c]">Nama Bimbel</label>
                        <input name="name" value="<?php echo e(old('name', $bimbel->name)); ?>" class="mt-2 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm">
                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-2 text-sm text-rose-500"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div>
                        <label class="text-sm font-bold text-[#141b2c]">Slug</label>
                        <input name="slug" value="<?php echo e(old('slug', $bimbel->slug)); ?>" class="mt-2 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="kosongkan untuk auto">
                        <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-2 text-sm text-rose-500"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div>
                        <label class="text-sm font-bold text-[#141b2c]">Deskripsi</label>
                        <textarea name="description" rows="5" class="mt-2 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm"><?php echo e(old('description', $bimbel->description)); ?></textarea>
                        <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-2 text-sm text-rose-500"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                <div class="space-y-5 rounded-3xl bg-[#f9f9ff] p-5 ring-1 ring-[#e6eaf5]">
                    <div>
                        <label class="text-sm font-bold text-[#141b2c]">Upload Gambar</label>
                        <?php if($bimbel->image_path): ?>
                            <img src="<?php echo e(asset('storage/'.$bimbel->image_path)); ?>" alt="<?php echo e($bimbel->name); ?>" class="mt-3 aspect-video w-full rounded-2xl object-cover">
                        <?php endif; ?>
                        <input type="file" name="image" accept="image/*" class="mt-3 w-full rounded-xl border border-[#d9def1] bg-white px-4 py-3 text-sm">
                        <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-2 text-sm text-rose-500"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div>
                        <label class="text-sm font-bold text-[#141b2c]">Label Singkat</label>
                        <input name="short_label" value="<?php echo e(old('short_label', $bimbel->short_label)); ?>" class="mt-2 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="Live Zoom">
                    </div>
                    <div>
                        <label class="text-sm font-bold text-[#141b2c]">Level</label>
                        <input name="level" value="<?php echo e(old('level', $bimbel->level)); ?>" class="mt-2 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="SD - SMP">
                    </div>
                    <div>
                        <label class="text-sm font-bold text-[#141b2c]">Jadwal</label>
                        <input name="schedule" value="<?php echo e(old('schedule', $bimbel->schedule)); ?>" class="mt-2 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="2x per minggu">
                    </div>
                    <div>
                        <label class="text-sm font-bold text-[#141b2c]">Metode</label>
                        <input name="method" value="<?php echo e(old('method', $bimbel->method)); ?>" class="mt-2 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="Live Zoom">
                    </div>
                    <div>
                        <label class="text-sm font-bold text-[#141b2c]">Jumlah Sesi</label>
                        <input type="number" name="sessions_count" value="<?php echo e(old('sessions_count', $bimbel->sessions_count)); ?>" class="mt-2 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm" min="1">
                    </div>
                </div>
            </div>

            <div class="grid gap-4 md:grid-cols-3">
                <div>
                    <label class="text-sm font-bold text-[#141b2c]">Harga Normal</label>
                    <input type="number" name="price" value="<?php echo e(old('price', $bimbel->price ?: 0)); ?>" class="mt-2 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm" min="0">
                </div>
                <div>
                    <label class="text-sm font-bold text-[#141b2c]">Harga Promo</label>
                    <input type="number" name="sale_price" value="<?php echo e(old('sale_price', $bimbel->sale_price)); ?>" class="mt-2 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm" min="0">
                </div>
                <div>
                    <label class="text-sm font-bold text-[#141b2c]">Link Grup WA</label>
                    <input name="grup_wa" value="<?php echo e(old('grup_wa', $bimbel->grup_wa)); ?>" class="mt-2 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="https://chat.whatsapp.com/...">
                </div>
            </div>

            <div class="grid gap-4 md:grid-cols-3">
                <label class="flex items-center gap-3 text-sm font-bold text-[#141b2c]"><input type="checkbox" name="is_promo_active" value="1" <?php if(old('is_promo_active', $bimbel->is_promo_active ?? false)): echo 'checked'; endif; ?>> Aktifkan Promo</label>
                <div>
                    <label class="text-sm font-bold text-[#141b2c]">Status</label>
                    <select name="status" class="mt-2 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm">
                        <?php $__currentLoopData = ['draft' => 'Draft', 'active' => 'Active', 'inactive' => 'Inactive']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($value); ?>" <?php if(old('status', $bimbel->status ?: 'draft') === $value): echo 'selected'; endif; ?>><?php echo e($label); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div>
                    <label class="text-sm font-bold text-[#141b2c]">Urutan</label>
                    <input type="number" name="sort_order" value="<?php echo e(old('sort_order', $bimbel->sort_order ?: 0)); ?>" class="mt-2 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm">
                </div>
            </div>

            <div class="flex justify-end gap-3">
                <a href="<?php echo e(route('admin.bimbel.index')); ?>" class="rounded-2xl bg-[#f1f3ff] px-6 py-3 text-sm font-extrabold text-[#0043c6]">Batal</a>
                <button class="rounded-2xl bg-[#0043c6] px-6 py-3 text-sm font-extrabold text-white">Simpan</button>
            </div>
        </section>
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
<?php /**PATH C:\dev\jagobelajar-cms\resources\views/pages/admin/bimbels/form.blade.php ENDPATH**/ ?>