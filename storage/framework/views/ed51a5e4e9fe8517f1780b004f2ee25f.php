<?php if (isset($component)) { $__componentOriginal8c0e86a062c1c5bb6d0e151b7076f3fd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c0e86a062c1c5bb6d0e151b7076f3fd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.public','data' => ['title' => 'Register - '.config('app.name')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.public'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('Register - '.config('app.name'))]); ?>
    <section class="relative overflow-hidden bg-[#f9f9ff] py-12 sm:py-16">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_80%_12%,rgba(254,183,0,0.24),transparent_30%),radial-gradient(circle_at_12%_20%,rgba(30,90,240,0.18),transparent_34%)]"></div>
        <div class="jb-container relative grid items-center gap-6 sm:p-8 lg:grid-cols-[1fr_460px]">
            <div class="max-w-2xl">
                <span class="inline-flex rounded-full bg-[#fff2c7] px-4 py-2 text-xs font-extrabold text-[#7c5800]">Akun user gratis</span>
                <h1 class="mt-5 text-4xl font-extrabold tracking-tight text-[#141b2c] sm:text-4xl sm:text-5xl">Daftar dan mulai perjalanan belajarmu</h1>
                <p class="mt-4 text-sm leading-7 text-[#5f667d] sm:text-base">Akun baru otomatis menjadi role user biasa. Setelah daftar, kamu langsung masuk ke dashboard user untuk melihat progres dan fitur belajar.</p>
                <div class="mt-8 grid gap-4 sm:grid-cols-3">
                    <?php $__currentLoopData = [['Try Out', 'Simulasi ujian'], ['Bimbel', 'Paket belajar'], ['Progress', 'Pantau hasil']]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$title, $desc]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="rounded-2xl bg-white p-4 shadow-sm ring-1 ring-[#e9edff]"><p class="font-extrabold text-[#0043c6]"><?php echo e($title); ?></p><p class="mt-1 text-xs text-[#5f667d]"><?php echo e($desc); ?></p></div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            <div class="rounded-[2rem] bg-white p-6 shadow-[0_18px_50px_rgba(20,27,44,0.14)] ring-1 ring-[#e9edff] sm:p-6 sm:p-8">
                <h2 class="text-2xl font-extrabold text-[#141b2c]">Register</h2>
                <p class="mt-2 text-sm leading-6 text-[#5f667d]">Buat akun baru untuk role <strong>user</strong>.</p>

                <?php if($errors->any()): ?>
                    <div class="mt-4 rounded-2xl bg-red-50 p-4 text-sm font-semibold text-red-700"><?php echo e($errors->first()); ?></div>
                <?php endif; ?>

                <form class="mt-6 space-y-4" method="POST" action="<?php echo e(route('register.store')); ?>">
                    <?php echo csrf_field(); ?>
                    <div>
                        <label class="mb-2 block text-sm font-bold text-[#141b2c]">Nama</label>
                        <input name="name" type="text" value="<?php echo e(old('name')); ?>" class="w-full rounded-2xl border border-[#d9def1] bg-[#f9f9ff] px-4 py-3 outline-none transition focus:border-[#0043c6] focus:bg-white" placeholder="Nama lengkap" required>
                    </div>
                    <div>
                        <label class="mb-2 block text-sm font-bold text-[#141b2c]">Email</label>
                        <input name="email" type="email" value="<?php echo e(old('email')); ?>" class="w-full rounded-2xl border border-[#d9def1] bg-[#f9f9ff] px-4 py-3 outline-none transition focus:border-[#0043c6] focus:bg-white" placeholder="nama@email.com" required>
                    </div>
                    <div>
                        <label class="mb-2 block text-sm font-bold text-[#141b2c]">No Whatsapp</label>
                        <input name="whatsapp" value="<?php echo e(old('whatsapp')); ?>" class="w-full rounded-2xl border border-[#d9def1] bg-[#f9f9ff] px-4 py-3 outline-none transition focus:border-[#0043c6] focus:bg-white" placeholder="08xxxxxxxxxx" required>
                    </div>
                    <div>
                        <label class="mb-2 block text-sm font-bold text-[#141b2c]">Alamat</label>
                        <textarea name="address" rows="3" class="w-full rounded-2xl border border-[#d9def1] bg-[#f9f9ff] px-4 py-3 outline-none transition focus:border-[#0043c6] focus:bg-white" placeholder="Alamat lengkap" required><?php echo e(old('address')); ?></textarea>
                    </div>
                    <div>
                        <label class="mb-2 block text-sm font-bold text-[#141b2c]">Password</label>
                        <input name="password" type="password" class="w-full rounded-2xl border border-[#d9def1] bg-[#f9f9ff] px-4 py-3 outline-none transition focus:border-[#0043c6] focus:bg-white" placeholder="Minimal 8 karakter" required>
                    </div>
                    <div>
                        <label class="mb-2 block text-sm font-bold text-[#141b2c]">Konfirmasi Password</label>
                        <input name="password_confirmation" type="password" class="w-full rounded-2xl border border-[#d9def1] bg-[#f9f9ff] px-4 py-3 outline-none transition focus:border-[#0043c6] focus:bg-white" placeholder="Ulangi password" required>
                    </div>
                    <button class="w-full rounded-2xl bg-[#feb700] px-5 py-4 text-sm font-extrabold text-[#271900] shadow-[0_14px_24px_rgba(254,183,0,0.24)] transition hover:bg-[#ffca35]">Daftar Sekarang</button>
                </form>
                <p class="mt-5 text-center text-sm text-[#5f667d]">Sudah punya akun? <a class="font-extrabold text-[#0043c6]" href="<?php echo e(route('login')); ?>">Login</a></p>
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
<?php /**PATH C:\dev\jagobelajar-cms\resources\views/auth/register.blade.php ENDPATH**/ ?>