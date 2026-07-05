<?php if (isset($component)) { $__componentOriginal8c0e86a062c1c5bb6d0e151b7076f3fd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c0e86a062c1c5bb6d0e151b7076f3fd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.public','data' => ['title' => 'Keunggulan - '.config('app.name')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.public'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('Keunggulan - '.config('app.name'))]); ?>
    <section class="relative overflow-hidden bg-[#f9f9ff] py-12 sm:py-16">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_80%_10%,rgba(254,183,0,0.25),transparent_30%),radial-gradient(circle_at_10%_20%,rgba(30,90,240,0.18),transparent_34%)]"></div>
        <div class="jb-container relative">
            <div class="mx-auto max-w-3xl text-center">
                <span class="inline-flex rounded-full bg-[#dce1ff] px-4 py-2 text-xs font-extrabold text-[#0043c6]">Kenapa Jago Belajar?</span>
                <h1 class="mt-5 text-3xl font-extrabold tracking-tight text-[#141b2c] sm:text-5xl">Belajar lebih terarah, progres lebih kelihatan</h1>
                <p class="mx-auto mt-4 max-w-2xl text-sm leading-7 text-[#5f667d] sm:text-base">Jago Belajar membantu siswa belajar dengan alur yang jelas: materi, latihan, try out, dan evaluasi dalam satu tempat.</p>
            </div>

            <div class="mt-10 grid gap-5 md:grid-cols-3">
                <?php $__currentLoopData = [
                    ['Tutor Berpengalaman', 'Dibimbing tutor yang memahami kebutuhan belajar siswa dari SD sampai SMA.', 'bg-[#dce1ff] text-[#0043c6]', 'teacher'],
                    ['Materi Bertahap', 'Materi disusun dari dasar, latihan, sampai evaluasi agar siswa tidak lompat konsep.', 'bg-[#fff2c7] text-[#7c5800]', 'book'],
                    ['Try Out Berkala', 'Simulasi ujian membantu siswa melatih strategi pengerjaan dan manajemen waktu.', 'bg-[#e8f7ef] text-[#1c9b5e]', 'clipboard'],
                    ['Belajar Fleksibel', 'Akses materi dan latihan bisa dilakukan dari rumah dengan perangkat yang tersedia.', 'bg-[#eef0ff] text-[#4a36c4]', 'device'],
                    ['Pantau Perkembangan', 'Hasil belajar bisa dipakai untuk melihat bagian yang sudah kuat dan perlu diperbaiki.', 'bg-[#ffe8ef] text-[#d84a7c]', 'chart'],
                    ['Komunitas Belajar', 'Siswa punya ruang untuk bertanya, berdiskusi, dan saling mendukung proses belajar.', 'bg-[#ecfbff] text-[#1f90a6]', 'users'],
                ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$title, $desc, $color, $icon]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <article class="group rounded-3xl bg-white p-6 shadow-[0_14px_34px_rgba(20,27,44,0.08)] ring-1 ring-[#e9edff] transition hover:-translate-y-1 hover:shadow-[0_18px_44px_rgba(20,27,44,0.14)]">
                        <div class="grid h-12 w-12 place-items-center rounded-2xl <?php echo e($color); ?>">
                            <?php switch($icon):
                                case ('teacher'): ?>
                                    <svg viewBox="0 0 24 24" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 7l9-4 9 4-9 4-9-4z" /><path d="M7 10v4c0 2 2.2 4 5 4s5-2 5-4v-4" /><path d="M21 8v6" /></svg>
                                    <?php break; ?>
                                <?php case ('book'): ?>
                                    <svg viewBox="0 0 24 24" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20" /><path d="M4 4.5A2.5 2.5 0 0 1 6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5z" /><path d="M8 7h8" /><path d="M8 11h6" /></svg>
                                    <?php break; ?>
                                <?php case ('clipboard'): ?>
                                    <svg viewBox="0 0 24 24" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 3h6l1 2h3v16H5V5h3l1-2z" /><path d="M9 12l2 2 4-4" /><path d="M8 18h8" /></svg>
                                    <?php break; ?>
                                <?php case ('device'): ?>
                                    <svg viewBox="0 0 24 24" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="5" y="3" width="14" height="18" rx="2" /><path d="M9 18h6" /><path d="M8 7h8" /></svg>
                                    <?php break; ?>
                                <?php case ('chart'): ?>
                                    <svg viewBox="0 0 24 24" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 19V5" /><path d="M4 19h16" /><path d="M8 16v-5" /><path d="M12 16V8" /><path d="M16 16v-9" /></svg>
                                    <?php break; ?>
                                <?php default: ?>
                                    <svg viewBox="0 0 24 24" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M16 21v-2a4 4 0 0 0-8 0v2" /><circle cx="12" cy="7" r="4" /><path d="M22 21v-2a4 4 0 0 0-3-3.87" /><path d="M16 3.13a4 4 0 0 1 0 7.75" /></svg>
                            <?php endswitch; ?>
                        </div>
                        <h2 class="mt-5 text-xl font-extrabold text-[#141b2c]"><?php echo e($title); ?></h2>
                        <p class="mt-3 text-sm leading-7 text-[#5f667d]"><?php echo e($desc); ?></p>
                    </article>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="mt-10 overflow-hidden rounded-[2rem] bg-[linear-gradient(135deg,#0043c6,#1e5af0)] p-6 text-white shadow-[0_18px_50px_rgba(0,67,198,0.22)] sm:p-8">
                <div class="grid gap-6 lg:grid-cols-[1fr_auto] lg:items-center">
                    <div>
                        <h2 class="text-2xl font-extrabold sm:text-3xl">Mulai belajar dengan sistem yang lebih rapi</h2>
                        <p class="mt-3 max-w-2xl text-sm leading-7 text-[#edf0ff]">Gabungkan bimbel, latihan soal, dan try out agar proses belajar tidak sekadar banyak, tapi juga terarah.</p>
                    </div>
                    <a href="<?php echo e(route('bimbel.index')); ?>" class="inline-flex justify-center rounded-2xl bg-[#feb700] px-6 py-4 text-sm font-extrabold text-[#271900] transition hover:bg-[#ffca35]">Lihat Paket Bimbel</a>
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
<?php /**PATH C:\dev\jagobelajar-cms\resources\views\pages\public\keunggulan.blade.php ENDPATH**/ ?>