<?php if (isset($component)) { $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.admin','data' => ['title' => 'CMS Keunggulan - '.config('app.name')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('CMS Keunggulan - '.config('app.name'))]); ?>
    <form method="POST" action="<?php echo e(route('admin.features.update')); ?>" class="space-y-6" x-data="{ items: <?php echo \Illuminate\Support\Js::from(old('feature_items', $content->feature_items ?? []))->toHtml() ?> }">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <section class="overflow-hidden rounded-[2rem] bg-white shadow-[0_18px_55px_rgba(20,27,44,0.08)] ring-1 ring-[#e6eaf5]">
            <div class="relative bg-[radial-gradient(circle_at_85%_10%,rgba(254,183,0,0.35),transparent_28%),linear-gradient(135deg,#0b2f8f,#0043c6_48%,#1e5af0)] p-6 text-white sm:p-8">
                <span class="rounded-full bg-white/15 px-3 py-1 text-xs font-bold uppercase tracking-[0.2em] ring-1 ring-white/20">CMS Module</span>
                <h1 class="mt-4 text-3xl font-extrabold tracking-tight sm:text-4xl">CMS Keunggulan</h1>
                <p class="mt-3 max-w-2xl text-sm leading-7 text-white/80">Atur judul dan card keunggulan yang tampil di halaman `/keunggulan` dan section beranda.</p>
            </div>
        </section>

        <?php if(session('status')): ?>
            <div class="rounded-2xl bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-700 ring-1 ring-emerald-100"><?php echo e(session('status')); ?></div>
        <?php endif; ?>

        <section class="rounded-[2rem] bg-white p-6 shadow-[0_18px_55px_rgba(20,27,44,0.08)] ring-1 ring-[#e6eaf5] sm:p-8">
            <div>
                <label class="text-sm font-bold text-[#141b2c]">Judul Section</label>
                <input name="feature_title" value="<?php echo e(old('feature_title', $content->feature_title)); ?>" class="mt-2 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="Judul keunggulan">
                <?php $__errorArgs = ['feature_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-2 text-sm text-rose-500"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="mt-6 grid gap-4 xl:grid-cols-2">
                <template x-for="(item, index) in items" :key="index">
                    <div class="rounded-3xl border border-[#e6eaf5] bg-[#f9f9ff] p-5">
                        <div class="mb-3 flex items-center justify-between gap-3">
                            <span class="text-sm font-bold text-[#0043c6]" x-text="`Item ${index + 1}`"></span>
                            <button type="button" @click="items.splice(index, 1)" class="rounded-xl bg-rose-50 px-3 py-2 text-xs font-bold text-rose-600 ring-1 ring-rose-100 transition hover:bg-rose-100">Hapus</button>
                        </div>
                        <input :name="`feature_items[${index}][title]`" x-model="item.title" class="mb-3 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="Judul">
                        <textarea :name="`feature_items[${index}][description]`" x-model="item.description" class="mb-3 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm" rows="3" placeholder="Deskripsi"></textarea>
                        <input :name="`feature_items[${index}][icon]`" x-model="item.icon" class="mb-3 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="Icon key: teacher/book/clipboard/device/chart/users">
                        <input :name="`feature_items[${index}][badge]`" x-model="item.badge" class="w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="Class warna badge">
                    </div>
                </template>
            </div>

            <div class="mt-6 flex flex-wrap justify-end gap-3">
                <button type="button" @click="items.push({ title: '', description: '', icon: 'users', badge: 'bg-[#dce1ff] text-[#0043c6]' })" class="inline-flex items-center justify-center rounded-2xl bg-[#f1f3ff] px-6 py-3 text-sm font-extrabold text-[#0043c6] transition hover:bg-[#e6eaff]">Tambah Item</button>
                <button class="inline-flex items-center justify-center rounded-2xl bg-[#0043c6] px-6 py-3 text-sm font-extrabold text-white transition hover:bg-[#003ab1]">Simpan Perubahan</button>
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
<?php /**PATH C:\dev\jagobelajar-cms\resources\views/pages/admin/features/index.blade.php ENDPATH**/ ?>