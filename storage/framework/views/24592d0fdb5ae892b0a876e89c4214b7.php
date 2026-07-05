<?php if (isset($component)) { $__componentOriginal8c0e86a062c1c5bb6d0e151b7076f3fd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c0e86a062c1c5bb6d0e151b7076f3fd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.public','data' => ['title' => 'Pembayaran Tryout - '.config('app.name')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.public'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('Pembayaran Tryout - '.config('app.name'))]); ?>
    <section class="bg-[#f9f9ff] py-12 sm:py-16">
        <div class="jb-container mx-auto max-w-3xl">
            <div class="rounded-[2rem] bg-white p-6 shadow-[0_18px_50px_rgba(20,27,44,0.12)] ring-1 ring-[#e9edff] sm:p-8">
                <div class="flex items-start gap-4">
                    <div class="grid h-12 w-12 place-items-center rounded-2xl bg-emerald-500 text-xl font-extrabold text-white">?</div>
                    <div>
                        <p class="text-xs font-bold uppercase tracking-[0.16em] text-emerald-600">Pembayaran Berhasil</p>
                        <h1 class="mt-2 text-3xl font-extrabold text-[#141b2c]"><?php echo e($examSession?->title ?? $examSession?->name ?? 'Tryout'); ?></h1>
                        <p class="mt-3 text-sm leading-7 text-[#5f667d]"><?php echo e($isPending ? 'Pembayaran masih diproses. Silakan tunggu konfirmasi pembayaran.' : 'Pembayaran kamu berhasil dan sesi akan didaftarkan otomatis.'); ?></p>
                    </div>
                </div>
                <div class="mt-6 grid gap-3 text-sm text-[#434655] sm:grid-cols-2">
                    <div class="rounded-2xl bg-[#f9f9ff] px-4 py-3 ring-1 ring-[#e9edff]"><span class="block text-xs font-bold uppercase tracking-[0.14em] text-[#8a93a8]">Order ID</span><strong><?php echo e($payment->order_id); ?></strong></div>
                    <div class="rounded-2xl bg-[#f9f9ff] px-4 py-3 ring-1 ring-[#e9edff]"><span class="block text-xs font-bold uppercase tracking-[0.14em] text-[#8a93a8]">Total</span><strong>Rp<?php echo e(number_format($payment->gross_amount, 0, ',', '.')); ?></strong></div>
                </div>
                <div class="mt-6 flex flex-wrap gap-3">
                    <a href="<?php echo e(route('user.dashboard')); ?>" class="inline-flex items-center justify-center rounded-2xl bg-[#0043c6] px-5 py-3 text-sm font-bold text-white">Ke Dashboard</a>
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
<?php /**PATH C:\dev\jagobelajar-cms\resources\views/pages/public/tryout-payment-success.blade.php ENDPATH**/ ?>