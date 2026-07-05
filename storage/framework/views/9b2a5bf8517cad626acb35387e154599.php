<?php if (isset($component)) { $__componentOriginal8c0e86a062c1c5bb6d0e151b7076f3fd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c0e86a062c1c5bb6d0e151b7076f3fd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.public','data' => ['title' => 'Detail Try Out - '.config('app.name')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.public'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('Detail Try Out - '.config('app.name'))]); ?>
    <section class="relative overflow-hidden bg-[#f9f9ff] py-12 sm:py-16">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_82%_12%,rgba(254,183,0,0.25),transparent_28%),radial-gradient(circle_at_12%_18%,rgba(30,90,240,0.18),transparent_32%)]"></div>
        <div class="jb-container relative">
            <a href="<?php echo e(route('tryout.index')); ?>" class="inline-flex items-center gap-2 text-sm font-bold text-[#0043c6] transition hover:text-[#003ab1]">&larr; Kembali ke daftar try out</a>

            <div class="mt-6 grid gap-8 lg:grid-cols-[1fr_380px]">
                <article class="overflow-hidden rounded-[2rem] bg-white shadow-[0_18px_50px_rgba(20,27,44,0.12)] ring-1 ring-[#e9edff]">
                    <div class="relative overflow-hidden bg-[linear-gradient(135deg,#0043c6,#1e5af0)] px-6 py-10 text-white sm:px-8 sm:py-12">
                        <div class="absolute -right-16 -top-16 h-52 w-52 rounded-full bg-[#feb700]/30 blur-3xl"></div>
                        <div class="absolute bottom-0 left-10 h-40 w-40 rounded-full bg-white/10 blur-3xl"></div>
                        <div class="relative max-w-3xl">
                            <span class="inline-flex rounded-full bg-[#feb700] px-4 py-2 text-xs font-extrabold text-[#271900]">Pendaftaran Dibuka</span>
                            <h1 class="mt-5 text-3xl font-extrabold tracking-tight sm:text-5xl">Try Out Jago Belajar Nasional</h1>
                            <p class="mt-4 max-w-2xl text-sm leading-7 text-[#edf0ff] sm:text-base">Simulasi ujian online untuk mengukur kesiapan belajar, melatih manajemen waktu, dan menemukan materi yang masih perlu diperkuat sebelum ujian sebenarnya.</p>
                        </div>
                    </div>

                    <div class="p-6 sm:p-8">
                        <div class="grid gap-4 md:grid-cols-3">
                            <?php $__currentLoopData = [['Tanggal', 'Juli 2026'], ['Mode', 'Online'], ['Level', 'SD - SMA']]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$label, $value]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="rounded-2xl bg-[#f1f3ff] p-4">
                                    <p class="text-xs font-bold uppercase tracking-[0.16em] text-[#0043c6]"><?php echo e($label); ?></p>
                                    <p class="mt-2 text-lg font-extrabold text-[#141b2c]"><?php echo e($value); ?></p>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <div class="mt-8">
                            <h2 class="text-2xl font-extrabold text-[#141b2c]">Apa yang kamu dapat?</h2>
                            <div class="mt-5 grid gap-4 md:grid-cols-2">
                                <?php $__currentLoopData = [
                                    ['Soal Sesuai Jenjang', 'Paket soal disusun sesuai kebutuhan SD, SMP, dan SMA agar latihan lebih terarah.'],
                                    ['Timer Pengerjaan', 'Latihan terasa seperti ujian asli dengan batas waktu yang jelas.'],
                                    ['Pembahasan Ringkas', 'Setelah selesai, siswa bisa melihat pembahasan untuk memahami kesalahan.'],
                                    ['Rekomendasi Belajar', 'Hasil try out membantu menentukan materi mana yang perlu dipelajari ulang.'],
                                ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$title, $desc]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="rounded-2xl border border-[#e9edff] bg-[#f9f9ff] p-5">
                                        <div class="grid h-10 w-10 place-items-center rounded-xl bg-[#dce1ff] text-sm font-extrabold text-[#0043c6]">?</div>
                                        <h3 class="mt-4 font-extrabold text-[#141b2c]"><?php echo e($title); ?></h3>
                                        <p class="mt-2 text-sm leading-6 text-[#5f667d]"><?php echo e($desc); ?></p>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>

                        <div class="mt-8 rounded-3xl bg-[#fff8df] p-6 ring-1 ring-[#ffdea8]">
                            <h2 class="text-xl font-extrabold text-[#271900]">Alur Mengikuti Try Out</h2>
                            <div class="mt-5 grid gap-3 sm:grid-cols-3">
                                <?php $__currentLoopData = [['1', 'Daftar paket'], ['2', 'Kerjakan online'], ['3', 'Lihat hasil']]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$number, $text]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="flex items-center gap-3 rounded-2xl bg-white/70 p-4">
                                        <span class="grid h-9 w-9 shrink-0 place-items-center rounded-full bg-[#feb700] text-sm font-extrabold text-[#271900]"><?php echo e($number); ?></span>
                                        <span class="text-sm font-bold text-[#271900]"><?php echo e($text); ?></span>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>

                        <div class="mt-8 rounded-[2rem] bg-[#f9f9ff] p-6 ring-1 ring-[#e9edff]">
                            <h2 class="text-2xl font-extrabold text-[#141b2c]">Deskripsi Lengkap Program</h2>
                            <p class="mt-4 text-sm leading-7 text-[#5f667d] sm:text-base">Try out ini dirancang sebagai simulasi yang mendekati ujian sesungguhnya, sehingga siswa dapat mengukur kesiapan belajar dengan lebih jujur dan terstruktur. Di dalamnya, peserta akan menemukan berbagai manfaat yang membantu proses belajar menjadi lebih efektif, mulai dari pemetaan kemampuan awal, latihan mengelola waktu, hingga evaluasi hasil yang mudah dipahami.</p>
                            <p class="mt-4 text-sm leading-7 text-[#5f667d] sm:text-base">Setiap paket dibangun dengan soal yang disusun bertahap agar siswa bisa memahami pola soal, mengenali bagian yang masih lemah, dan memperbaiki strategi pengerjaan. Setelah try out selesai, peserta akan mendapatkan gambaran hasil yang lebih jelas lewat skor, ringkasan pencapaian, serta bahan evaluasi yang bisa langsung dijadikan acuan belajar berikutnya.</p>
                            <p class="mt-4 text-sm leading-7 text-[#5f667d] sm:text-base">Selain itu, format online memberi fleksibilitas penuh untuk mengerjakan dari rumah, sekolah, atau tempat belajar lain tanpa ribet. Hal ini membuat try out cocok dipakai sebagai latihan berkala, bukan hanya menjelang ujian, tetapi juga sebagai alat pantau progres agar perkembangan belajar siswa bisa terlihat dari waktu ke waktu.</p>
                        </div>
                    </div>
                </article>

                <aside class="h-fit rounded-[2rem] bg-white p-6 shadow-[0_18px_50px_rgba(20,27,44,0.12)] ring-1 ring-[#e9edff] lg:sticky lg:top-28">
                    <p class="text-sm font-bold text-[#0043c6]">Ringkasan Paket</p>
                    <h2 class="mt-2 text-2xl font-extrabold text-[#141b2c]">Mulai dari Gratis</h2>
                    <div class="mt-5 grid gap-3 text-sm text-[#434655]">
                        <?php $__currentLoopData = [['Jadwal', 'Juli 2026'], ['Durasi', '90-180 menit'], ['Soal', '60-100 soal'], ['Akses', 'Online 24 jam'], ['Hasil', 'Skor + pembahasan']]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$label, $value]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="flex items-center justify-between rounded-2xl bg-[#f9f9ff] px-4 py-3 ring-1 ring-[#e9edff]"><span><?php echo e($label); ?></span><strong><?php echo e($value); ?></strong></div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <a href="#" class="mt-6 inline-flex w-full justify-center rounded-2xl bg-[#feb700] px-5 py-4 text-sm font-extrabold text-[#271900] shadow-[0_14px_24px_rgba(254,183,0,0.22)] transition hover:-translate-y-0.5 hover:bg-[#ffca35]">Lanjut Daftar</a>
                    <p class="mt-4 text-center text-xs leading-5 text-[#737687]">Dummy page. Form pendaftaran asli bisa ditambahkan nanti.</p>
                </aside>
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
<?php /**PATH C:\dev\jagobelajar-cms\resources\views\pages\public\tryout-detail.blade.php ENDPATH**/ ?>