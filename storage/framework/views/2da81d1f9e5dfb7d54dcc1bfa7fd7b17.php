<?php if (isset($component)) { $__componentOriginal8c0e86a062c1c5bb6d0e151b7076f3fd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c0e86a062c1c5bb6d0e151b7076f3fd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.public','data' => ['title' => 'Detail Bimbel - '.config('app.name')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.public'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('Detail Bimbel - '.config('app.name'))]); ?>
    <section class="relative overflow-hidden bg-[#f9f9ff] py-12 sm:py-16">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_82%_12%,rgba(254,183,0,0.22),transparent_28%),radial-gradient(circle_at_12%_18%,rgba(30,90,240,0.16),transparent_32%)]"></div>
        <div class="jb-container relative">
            <a href="<?php echo e(route('bimbel.index')); ?>" class="inline-flex items-center gap-2 text-sm font-bold text-[#0043c6] transition hover:text-[#003ab1]">&larr; Kembali ke daftar bimbel</a>

            <div class="mt-6 grid gap-8 lg:grid-cols-[1fr_380px]">
                <article class="overflow-hidden rounded-[2rem] bg-white shadow-[0_18px_50px_rgba(20,27,44,0.12)] ring-1 ring-[#e9edff]">
                    <div class="relative overflow-hidden px-6 py-10 text-white sm:px-8 sm:py-12" style="background: radial-gradient(circle at 75% 25%, rgba(255,255,255,0.18), transparent 28%), linear-gradient(135deg, #0043c6, #1e5af0);">
                        <div class="absolute -right-16 -top-16 h-52 w-52 rounded-full bg-[#feb700]/30 blur-3xl"></div>
                        <div class="absolute bottom-0 left-10 h-40 w-40 rounded-full bg-white/10 blur-3xl"></div>
                        <div class="relative max-w-3xl">
                            <span class="inline-flex rounded-full bg-[#feb700] px-4 py-2 text-xs font-extrabold text-[#271900]">Paket Favorit</span>
                            <h1 class="mt-5 text-3xl font-extrabold tracking-tight sm:text-5xl">Kelas Reguler SD - SMP</h1>
                            <p class="mt-4 max-w-2xl text-sm leading-7 text-[#edf0ff] sm:text-base">Paket belajar mingguan yang membantu siswa membangun kebiasaan belajar konsisten melalui materi terstruktur, latihan soal rutin, dan sesi tutor yang mudah diikuti.</p>
                        </div>
                    </div>

                    <div class="p-6 sm:p-8">
                        <div class="grid gap-4 md:grid-cols-3">
                            <?php $__currentLoopData = [['Jadwal', '2x per minggu'], ['Metode', 'Live Zoom'], ['Harga', 'Mulai Rp149.000/bulan']]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$label, $value]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="rounded-2xl bg-[#f1f3ff] p-4">
                                    <p class="text-xs font-bold uppercase tracking-[0.16em] text-[#0043c6]"><?php echo e($label); ?></p>
                                    <p class="mt-2 text-lg font-extrabold text-[#141b2c]"><?php echo e($value); ?></p>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <div class="mt-8">
                            <h2 class="text-2xl font-extrabold text-[#141b2c]">Apa yang didapat?</h2>
                            <div class="mt-5 grid gap-4 md:grid-cols-2">
                                <?php $__currentLoopData = [
                                    ['Materi Bertahap', 'Pembelajaran disusun dari konsep dasar ke latihan yang lebih menantang agar siswa tidak tertinggal.'],
                                    ['Latihan Rutin', 'Ada soal dan tugas terarah supaya materi yang dipelajari langsung terpakai.'],
                                    ['Bimbingan Tutor', 'Tutor membantu menjelaskan bagian yang sulit dengan bahasa yang lebih mudah dipahami.'],
                                    ['Monitoring Progress', 'Orang tua dan siswa dapat melihat perkembangan belajar dari waktu ke waktu.'],
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
                            <h2 class="text-xl font-extrabold text-[#271900]">Alur Belajar</h2>
                            <div class="mt-5 grid gap-3 sm:grid-cols-3">
                                <?php $__currentLoopData = [['1', 'Pilih paket'], ['2', 'Ikuti kelas'], ['3', 'Evaluasi hasil']]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$number, $text]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="flex items-center gap-3 rounded-2xl bg-white/70 p-4">
                                        <span class="grid h-9 w-9 shrink-0 place-items-center rounded-full bg-[#feb700] text-sm font-extrabold text-[#271900]"><?php echo e($number); ?></span>
                                        <span class="text-sm font-bold text-[#271900]"><?php echo e($text); ?></span>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>

                        <div class="mt-8 rounded-[2rem] bg-[#f9f9ff] p-6 ring-1 ring-[#e9edff]">
                            <h2 class="text-2xl font-extrabold text-[#141b2c]">Deskripsi Lengkap Program</h2>
                            <p class="mt-4 text-sm leading-7 text-[#5f667d] sm:text-base">Kelas reguler ini dirancang untuk membantu siswa belajar dengan ritme yang stabil dan tidak membebani. Setiap sesi berfokus pada pemahaman materi inti, latihan soal bertahap, dan pengulangan konsep yang paling sering keluar di sekolah. Dengan alur yang konsisten, siswa lebih mudah membangun kebiasaan belajar yang sehat dan tidak mudah lupa terhadap materi yang sudah dipelajari.</p>
                            <p class="mt-4 text-sm leading-7 text-[#5f667d] sm:text-base">Selain materi, program ini juga memberikan benefit berupa pendampingan tutor yang responsif, ringkasan materi yang ringkas, serta latihan yang dibuat supaya siswa lebih percaya diri saat menghadapi tugas atau ujian. Untuk orang tua, program ini membantu memantau progres belajar tanpa harus repot menyusun kurikulum sendiri dari nol.</p>
                            <p class="mt-4 text-sm leading-7 text-[#5f667d] sm:text-base">Karena formatnya fleksibel dan bisa diikuti dari rumah, kelas ini cocok untuk siswa yang butuh pendampingan rutin tetapi tetap ingin belajar dengan suasana yang nyaman. Program ini juga bisa menjadi dasar untuk naik ke paket intensif ketika siswa sudah siap mengejar target yang lebih tinggi.</p>
                        </div>
                    </div>
                </article>

                <aside class="h-fit rounded-[2rem] bg-white p-6 shadow-[0_18px_50px_rgba(20,27,44,0.12)] ring-1 ring-[#e9edff] lg:sticky lg:top-28">
                    <p class="text-sm font-bold text-[#0043c6]">Ringkasan Paket</p>
                    <h2 class="mt-2 text-2xl font-extrabold text-[#141b2c]">Kelas Reguler</h2>
                    <div class="mt-5 grid gap-3 text-sm text-[#434655]">
                        <?php $__currentLoopData = [['Level', 'SD - SMP'], ['Sesi', '8x/bulan'], ['Tugas', 'Rutin'], ['Format', 'Online'], ['Support', 'Tutor + evaluasi']]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$label, $value]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
<?php /**PATH C:\dev\jagobelajar-cms\resources\views\pages\public\bimbel-detail.blade.php ENDPATH**/ ?>