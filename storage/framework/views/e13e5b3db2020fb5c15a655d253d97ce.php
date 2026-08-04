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
     <?php $__env->slot('title', null, []); ?> Payment Gateway Settings <?php $__env->endSlot(); ?>

    <div class="px-5 py-6">
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-[#141b2c]">Payment Gateway Settings</h1>
                <p class="mt-1 text-sm text-[#8a93a8]">Pilih payment gateway yang akan aktif digunakan untuk transaksi.</p>
            </div>
        </div>

        <?php if(session('success')): ?>
            <div class="mb-4 rounded-xl bg-green-50 p-4 text-green-800">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <div class="rounded-2xl border border-[#e6eaf5] bg-white p-6 shadow-sm">
            <form action="<?php echo e(route('admin.settings.payment.update')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                
                <div class="mb-6">
                    <label class="mb-3 block text-sm font-semibold text-[#141b2c]">Active Payment Gateway</label>
                    <div class="space-y-3">
                        <label class="flex cursor-pointer items-center gap-3 rounded-xl border border-[#e6eaf5] p-4 transition hover:bg-[#f9f9ff]">
                            <input type="radio" name="active_payment_gateway" value="midtrans" class="h-5 w-5 text-[#0043c6]" <?php echo e($activeGateway === 'midtrans' ? 'checked' : ''); ?>>
                            <div>
                                <p class="font-bold text-[#141b2c]">Midtrans</p>
                                <p class="text-sm text-[#8a93a8]">Payment gateway Midtrans (Default).</p>
                            </div>
                        </label>
                        <label class="flex cursor-pointer items-center gap-3 rounded-xl border border-[#e6eaf5] p-4 transition hover:bg-[#f9f9ff]">
                            <input type="radio" name="active_payment_gateway" value="doku" class="h-5 w-5 text-[#0043c6]" <?php echo e($activeGateway === 'doku' ? 'checked' : ''); ?>>
                            <div>
                                <p class="font-bold text-[#141b2c]">Doku</p>
                                <p class="text-sm text-[#8a93a8]">Payment gateway Doku (Alternative / Fallback).</p>
                            </div>
                        </label>
                    </div>
                    <?php $__errorArgs = ['active_payment_gateway'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-2 text-sm text-red-600"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <button type="submit" class="rounded-xl bg-[#0043c6] px-6 py-3 text-sm font-semibold text-white transition hover:bg-[#0038a8]">
                    Simpan Pengaturan
                </button>
            </form>
        </div>
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
<?php /**PATH /Users/laravel2004/dev/jagobelajar-cms/resources/views/pages/admin/settings/payment.blade.php ENDPATH**/ ?>