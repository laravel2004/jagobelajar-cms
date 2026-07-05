<?php if (isset($component)) { $__componentOriginal8c0e86a062c1c5bb6d0e151b7076f3fd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c0e86a062c1c5bb6d0e151b7076f3fd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.public','data' => ['title' => 'Login - '.config('app.name')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.public'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('Login - '.config('app.name'))]); ?>
    <section class="relative overflow-hidden bg-[#f9f9ff] py-12 sm:py-16">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_80%_12%,rgba(254,183,0,0.24),transparent_30%),radial-gradient(circle_at_12%_20%,rgba(30,90,240,0.18),transparent_34%)]"></div>
        <div class="jb-container relative grid items-center gap-8 lg:grid-cols-[1fr_440px]">
            <div class="max-w-2xl">
                <span class="inline-flex rounded-full bg-[#dce1ff] px-4 py-2 text-xs font-extrabold text-[#0043c6]">Selamat datang kembali</span>
                <h1 class="mt-5 text-4xl font-extrabold tracking-tight text-[#141b2c] sm:text-5xl">Masuk dan lanjutkan belajar</h1>
                <p class="mt-4 text-sm leading-7 text-[#5f667d] sm:text-base">Gunakan satu akun untuk mengakses dashboard, try out, bimbel, dan progres belajar Jago Belajar.</p>
            </div>

            <div class="rounded-[2rem] bg-white p-6 shadow-[0_18px_50px_rgba(20,27,44,0.14)] ring-1 ring-[#e9edff] sm:p-8">
                <h2 class="text-2xl font-extrabold text-[#141b2c]">Login</h2>
                <p class="mt-2 text-sm leading-6 text-[#5f667d]">Admin masuk ke dashboard admin, user biasa masuk ke dashboard user.</p>

                <?php if($errors->any()): ?>
                    <div class="mt-4 rounded-2xl bg-red-50 p-4 text-sm font-semibold text-red-700"><?php echo e($errors->first()); ?></div>
                <?php endif; ?>

                <form class="mt-6 space-y-4" method="POST" action="<?php echo e(route('login.store')); ?>">
                    <?php echo csrf_field(); ?>
                    <div>
                        <label class="mb-2 block text-sm font-bold text-[#141b2c]">Email</label>
                        <input name="email" type="email" value="<?php echo e(old('email')); ?>" class="w-full rounded-2xl border border-[#d9def1] bg-[#f9f9ff] px-4 py-3 outline-none transition focus:border-[#0043c6] focus:bg-white" placeholder="nama@email.com" required>
                    </div>
                    <div>
                        <label class="mb-2 block text-sm font-bold text-[#141b2c]">Password</label>
                        <input name="password" type="password" class="w-full rounded-2xl border border-[#d9def1] bg-[#f9f9ff] px-4 py-3 outline-none transition focus:border-[#0043c6] focus:bg-white" placeholder="Masukkan password" required>
                    </div>
                    <label class="flex items-center gap-2 text-sm text-[#5f667d]"><input type="checkbox" name="remember" class="rounded border-[#d9def1]"> Ingat saya</label>
                    <button class="w-full rounded-2xl bg-[#0043c6] px-5 py-4 text-sm font-extrabold text-white shadow-[0_14px_24px_rgba(0,67,198,0.22)] transition hover:bg-[#003ab1]">Masuk</button>
                </form>
                <p class="mt-5 text-center text-sm text-[#5f667d]">Belum punya akun? <a class="font-extrabold text-[#0043c6]" href="<?php echo e(route('register')); ?>">Daftar sekarang</a></p>
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
<?php /**PATH C:\dev\jagobelajar-cms\resources\views/auth/login.blade.php ENDPATH**/ ?>