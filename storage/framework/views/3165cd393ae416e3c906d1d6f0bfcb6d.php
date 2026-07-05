<?php if (isset($component)) { $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.admin','data' => ['title' => 'CMS Beranda']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('CMS Beranda')]); ?>
    <div class="mb-6 flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
        <div>
            <h2 class="text-2xl font-bold text-[#141b2c]">CMS Beranda</h2>
            <p class="mt-1 text-sm text-[#64708b]">CRUD copywriting per section sampai footer, layout publik tetap sama.</p>
        </div>
        <a href="<?php echo e(route('home')); ?>" class="inline-flex items-center justify-center rounded-xl border border-[#d9def1] bg-white px-4 py-2.5 text-sm font-semibold text-[#0043c6] transition hover:bg-[#f6f8ff]">Lihat Beranda</a>
    </div>

    <?php if(session('status')): ?>
        <div class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-700"><?php echo e(session('status')); ?></div>
    <?php endif; ?>

    <?php if($errors->any()): ?>
        <div class="mb-6 rounded-2xl border border-rose-200 bg-rose-50 px-4 py-3 text-sm text-rose-700">
            <p class="font-semibold">Ada data yang belum valid.</p>
            <ul class="mt-2 list-disc pl-5">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('admin.cms-beranda.update')); ?>" class="space-y-6" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <section class="rounded-2xl border border-[#e6eaf5] bg-white p-5 shadow-[0_12px_30px_rgba(20,27,44,0.04)]">
            <h3 class="text-lg font-semibold text-[#141b2c]">Section Hero</h3>
            <div class="mt-4 grid gap-4 xl:grid-cols-2">
                <input name="hero_badge" value="<?php echo e(old('hero_badge', $content->hero_badge)); ?>" class="rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="Badge">
                <input name="hero_image_alt" value="<?php echo e(old('hero_image_alt', $content->hero_image_alt)); ?>" class="rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="Alt gambar hero">
                <div class="rounded-2xl border border-[#e6eaf5] bg-[#f9f9ff] p-3">
                    <p class="mb-2 text-xs font-semibold uppercase tracking-[0.16em] text-[#64708b]">Preview Hero</p>
                    <img src="<?php echo e($content->hero_image_path ? asset($content->hero_image_path) : asset('images/no-bg-hero.png')); ?>" alt="Preview hero" class="h-32 w-full rounded-xl bg-white object-contain">
                    <input type="file" name="hero_image" accept="image/*" class="mt-3 w-full rounded-xl border border-dashed border-[#d9def1] px-4 py-3 text-sm">
                </div>
                <div class="xl:col-span-2"><input name="hero_title" value="<?php echo e(old('hero_title', $content->hero_title)); ?>" class="w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="Judul hero"></div>
                <div class="xl:col-span-2"><textarea name="hero_description" rows="4" class="w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="Deskripsi hero"><?php echo e(old('hero_description', $content->hero_description)); ?></textarea></div>
                <?php $__currentLoopData = (old('hero_benefits', $content->hero_benefits ?? ['', '', '', ''])); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $benefit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <input type="text" name="hero_benefits[]" value="<?php echo e($benefit); ?>" class="rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="Benefit <?php echo e($index + 1); ?>">
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <input name="hero_primary_cta_label" value="<?php echo e(old('hero_primary_cta_label', $content->hero_primary_cta_label)); ?>" class="rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="Label CTA utama">
                <input name="hero_primary_cta_url" value="<?php echo e(old('hero_primary_cta_url', $content->hero_primary_cta_url)); ?>" class="rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="URL CTA utama">
                <input name="hero_secondary_cta_label" value="<?php echo e(old('hero_secondary_cta_label', $content->hero_secondary_cta_label)); ?>" class="rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="Label CTA kedua">
                <input name="hero_secondary_cta_url" value="<?php echo e(old('hero_secondary_cta_url', $content->hero_secondary_cta_url)); ?>" class="rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="URL CTA kedua">
            </div>
        </section>

        <section class="rounded-2xl border border-[#e6eaf5] bg-white p-5 shadow-[0_12px_30px_rgba(20,27,44,0.04)]">
            <h3 class="text-lg font-semibold text-[#141b2c]">Section Keunggulan & Program</h3>
            <div class="mt-4 grid gap-4 xl:grid-cols-2">
                <input name="feature_title" value="<?php echo e(old('feature_title', $content->feature_title)); ?>" class="rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="Judul keunggulan">
                <input name="program_title" value="<?php echo e(old('program_title', $content->program_title)); ?>" class="rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="Judul program">
                <div class="xl:col-span-2"><textarea name="program_description" rows="3" class="w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="Deskripsi program"><?php echo e(old('program_description', $content->program_description)); ?></textarea></div>
            </div>
            <div class="mt-4 grid gap-4 lg:grid-cols-3">
                <?php $__currentLoopData = old('feature_items', $content->feature_items ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="rounded-2xl border border-[#e6eaf5] p-4">
                        <div class="mb-3 text-sm font-semibold text-[#64708b]">Item Keunggulan <?php echo e($index + 1); ?></div>
                        <input name="feature_items[<?php echo e($index); ?>][title]" value="<?php echo e($item['title'] ?? ''); ?>" class="mb-3 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="Judul">
                        <input name="feature_items[<?php echo e($index); ?>][description]" value="<?php echo e($item['description'] ?? ''); ?>" class="mb-3 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="Deskripsi">
                        <input name="feature_items[<?php echo e($index); ?>][icon]" value="<?php echo e($item['icon'] ?? ''); ?>" class="mb-3 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="Icon key">
                        <input name="feature_items[<?php echo e($index); ?>][badge]" value="<?php echo e($item['badge'] ?? ''); ?>" class="w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="Class badge">
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="mt-6 grid gap-4 lg:grid-cols-3">
                <?php $__currentLoopData = old('program_items', $content->program_items ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="rounded-2xl border border-[#e6eaf5] p-4">
                        <div class="mb-3 text-sm font-semibold text-[#64708b]">Card Program <?php echo e($index + 1); ?></div>
                        <input name="program_items[<?php echo e($index); ?>][title]" value="<?php echo e($item['title'] ?? ''); ?>" class="mb-3 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="Judul">
                        <input name="program_items[<?php echo e($index); ?>][subtitle]" value="<?php echo e($item['subtitle'] ?? ''); ?>" class="mb-3 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="Subjudul">
                        <input name="program_items[<?php echo e($index); ?>][button]" value="<?php echo e($item['button'] ?? ''); ?>" class="mb-3 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="Label tombol">
                        <input name="program_items[<?php echo e($index); ?>][border]" value="<?php echo e($item['border'] ?? ''); ?>" class="mb-3 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="Class border">
                        <input name="program_items[<?php echo e($index); ?>][color]" value="<?php echo e($item['color'] ?? ''); ?>" class="mb-3 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="Class text">
                        <input name="program_items[<?php echo e($index); ?>][background]" value="<?php echo e($item['background'] ?? ''); ?>" class="w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="Class background">
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </section>

        <section class="rounded-2xl border border-[#e6eaf5] bg-white p-5 shadow-[0_12px_30px_rgba(20,27,44,0.04)]">
            <div class="flex items-center justify-between gap-3">
                <h3 class="text-lg font-semibold text-[#141b2c]">Section Galeri</h3>
                <button type="button" onclick="window.addGalleryItem()" class="rounded-xl bg-[#f1f3ff] px-4 py-2 text-sm font-semibold text-[#0043c6]">+ Tambah Item</button>
            </div>
            <div class="mt-4 grid gap-4 xl:grid-cols-2">
                <input name="gallery_title" value="<?php echo e(old('gallery_title', $content->gallery_title)); ?>" class="rounded-xl border-[#d9def1] px-4 py-3 text-sm xl:col-span-2" placeholder="Judul galeri">
            </div>
            <div id="gallery-items" class="mt-4 grid gap-4 xl:grid-cols-2">
                <?php $__currentLoopData = array_values(old('gallery_items', $content->gallery_items ?? [])); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="rounded-2xl border border-[#e6eaf5] p-4 gallery-item">
                        <div class="mb-3 flex items-center justify-between gap-3 text-sm font-semibold text-[#64708b]">
                            <span>Item Galeri <?php echo e($index + 1); ?></span>
                            <button type="button" onclick="this.closest('.gallery-item').remove(); window.renumberGalleryItems()" class="text-rose-500">Hapus</button>
                        </div>
                        <input name="gallery_items[<?php echo e($index); ?>][label]" value="<?php echo e($item['label'] ?? ''); ?>" class="mb-3 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="Label">
                        <input name="gallery_items[<?php echo e($index); ?>][badge]" value="<?php echo e($item['badge'] ?? ''); ?>" class="mb-3 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="Badge">
                        <img src="<?php echo e(!empty($item['image']) ? asset($item['image']) : asset('images/no-bg-hero.png')); ?>" alt="Preview gallery <?php echo e($index + 1); ?>" class="mb-3 h-32 w-full rounded-xl bg-[#f9f9ff] object-cover">
                        <input type="file" name="gallery_images[<?php echo e($index); ?>]" accept="image/*" class="w-full rounded-xl border border-dashed border-[#d9def1] px-4 py-3 text-sm">
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </section>

        <section class="rounded-2xl border border-[#e6eaf5] bg-white p-5 shadow-[0_12px_30px_rgba(20,27,44,0.04)]">
            <div class="flex items-center justify-between gap-3">
                <h3 class="text-lg font-semibold text-[#141b2c]">Section Testimoni</h3>
                <button type="button" onclick="window.addTestimonialItem()" class="rounded-xl bg-[#f1f3ff] px-4 py-2 text-sm font-semibold text-[#0043c6]">+ Tambah Testimoni</button>
            </div>
            <div class="mt-4 grid gap-4 lg:grid-cols-3">
                <input name="testimonials_title" value="<?php echo e(old('testimonials_title', $content->testimonials_title)); ?>" class="rounded-xl border-[#d9def1] px-4 py-3 text-sm lg:col-span-3" placeholder="Judul testimoni">
            </div>
            <div id="testimonial-items" class="mt-4 grid gap-4 lg:grid-cols-3">
                <?php $__currentLoopData = array_values(old('testimonials', $content->testimonials ?? [])); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="rounded-2xl border border-[#e6eaf5] p-4 testimonial-item">
                        <div class="mb-3 flex items-center justify-between gap-3 text-sm font-semibold text-[#64708b]">
                            <span>Testimoni <?php echo e($index + 1); ?></span>
                            <button type="button" onclick="this.closest('.testimonial-item').remove(); window.renumberTestimonialItems()" class="text-rose-500">Hapus</button>
                        </div>
                        <input name="testimonials[<?php echo e($index); ?>][name]" value="<?php echo e($item['name'] ?? ''); ?>" class="mb-3 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="Nama">
                        <input name="testimonials[<?php echo e($index); ?>][role]" value="<?php echo e($item['role'] ?? ''); ?>" class="mb-3 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="Role">
                        <textarea name="testimonials[<?php echo e($index); ?>][quote]" rows="4" class="mb-3 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="Quote"><?php echo e($item['quote'] ?? ''); ?></textarea>
                        <img src="<?php echo e(!empty($item['image']) ? asset($item['image']) : asset('images/logo.png')); ?>" alt="Preview testimoni <?php echo e($index + 1); ?>" class="mb-3 h-32 w-full rounded-xl bg-[#f9f9ff] object-cover">
                        <input type="file" name="testimonial_images[<?php echo e($index); ?>]" accept="image/*" class="w-full rounded-xl border border-dashed border-[#d9def1] px-4 py-3 text-sm">
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </section>

        <section class="rounded-2xl border border-[#e6eaf5] bg-white p-5 shadow-[0_12px_30px_rgba(20,27,44,0.04)]">
            <h3 class="text-lg font-semibold text-[#141b2c]">Section CTA Bawah</h3>
            <div class="mt-4 grid gap-4 xl:grid-cols-2">
                <input name="cta_title" value="<?php echo e(old('cta_title', $content->cta_title)); ?>" class="rounded-xl border-[#d9def1] px-4 py-3 text-sm xl:col-span-2" placeholder="Judul CTA">
                <textarea name="cta_description" rows="3" class="rounded-xl border-[#d9def1] px-4 py-3 text-sm xl:col-span-2" placeholder="Deskripsi CTA"><?php echo e(old('cta_description', $content->cta_description)); ?></textarea>
                <input name="cta_primary_label" value="<?php echo e(old('cta_primary_label', $content->cta_primary_label)); ?>" class="rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="Label CTA utama">
                <input name="cta_primary_url" value="<?php echo e(old('cta_primary_url', $content->cta_primary_url)); ?>" class="rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="URL CTA utama">
                <input name="cta_secondary_label" value="<?php echo e(old('cta_secondary_label', $content->cta_secondary_label)); ?>" class="rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="Label CTA kedua">
                <input name="cta_secondary_url" value="<?php echo e(old('cta_secondary_url', $content->cta_secondary_url)); ?>" class="rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="URL CTA kedua">
            </div>
        </section>

        <section class="rounded-2xl border border-[#e6eaf5] bg-white p-5 shadow-[0_12px_30px_rgba(20,27,44,0.04)]">
            <h3 class="text-lg font-semibold text-[#141b2c]">Footer</h3>
            <div class="mt-4 grid gap-4 xl:grid-cols-2">
                <textarea name="footer_description" rows="4" class="rounded-xl border-[#d9def1] px-4 py-3 text-sm xl:col-span-2" placeholder="Deskripsi footer"><?php echo e(old('footer_description', $content->footer_description)); ?></textarea>
                <div class="rounded-2xl border border-[#e6eaf5] bg-[#f9f9ff] p-3 xl:col-span-2">
                    <p class="mb-2 text-xs font-semibold uppercase tracking-[0.16em] text-[#64708b]">Preview Logo Footer</p>
                    <img src="<?php echo e($content->footer_logo_path ? asset($content->footer_logo_path) : asset('images/logo.png')); ?>" alt="Preview logo footer" class="h-24 rounded-xl bg-white object-contain p-2">
                    <input type="file" name="footer_logo" accept="image/*" class="mt-3 w-full rounded-xl border border-dashed border-[#d9def1] px-4 py-3 text-sm">
                </div>
                <input name="footer_primary_label" value="<?php echo e(old('footer_primary_label', $content->footer_primary_label)); ?>" class="rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="Label tombol utama footer">
                <input name="footer_primary_url" value="<?php echo e(old('footer_primary_url', $content->footer_primary_url)); ?>" class="rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="URL tombol utama footer">
                <input name="footer_secondary_label" value="<?php echo e(old('footer_secondary_label', $content->footer_secondary_label)); ?>" class="rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="Label tombol kedua footer">
                <input name="footer_secondary_url" value="<?php echo e(old('footer_secondary_url', $content->footer_secondary_url)); ?>" class="rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="URL tombol kedua footer">
                <input name="footer_menu_title" value="<?php echo e(old('footer_menu_title', $content->footer_menu_title)); ?>" class="rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="Judul menu footer">
                <input name="footer_contact_title" value="<?php echo e(old('footer_contact_title', $content->footer_contact_title)); ?>" class="rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="Judul kontak footer">
                <?php $__currentLoopData = old('footer_menu_items', $content->footer_menu_items ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="rounded-2xl border border-[#e6eaf5] p-4">
                        <div class="mb-3 text-sm font-semibold text-[#64708b]">Menu Footer <?php echo e($index + 1); ?></div>
                        <input name="footer_menu_items[<?php echo e($index); ?>][label]" value="<?php echo e($item['label'] ?? ''); ?>" class="mb-3 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="Label menu">
                        <input name="footer_menu_items[<?php echo e($index); ?>][url]" value="<?php echo e($item['url'] ?? ''); ?>" class="w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="URL menu">
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="xl:col-span-2 grid gap-4 md:grid-cols-3">
                    <?php $__currentLoopData = old('footer_contact_items', $content->footer_contact_items ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <input name="footer_contact_items[]" value="<?php echo e($item); ?>" class="rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="Kontak <?php echo e($index + 1); ?>">
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <input name="footer_copyright" value="<?php echo e(old('footer_copyright', $content->footer_copyright)); ?>" class="rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="Copyright, pakai :year untuk tahun">
                <input name="footer_tagline" value="<?php echo e(old('footer_tagline', $content->footer_tagline)); ?>" class="rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="Tagline footer">
            </div>
        </section>

        <button class="rounded-xl bg-[#0043c6] px-5 py-3 text-sm font-semibold text-white transition hover:bg-[#003ab1]">Simpan CMS Beranda</button>
    </form>

    <script>
        window.renumberGalleryItems = function () {
            document.querySelectorAll('#gallery-items .gallery-item').forEach((item, index) => {
                item.querySelector('span').textContent = `Item Galeri ${index + 1}`;
                item.querySelectorAll('input').forEach((input) => {
                    if (input.name.startsWith('gallery_items[')) {
                        input.name = input.name.replace(/gallery_items\[\d+\]/, `gallery_items[${index}]`);
                    }
                    if (input.name.startsWith('gallery_images[')) {
                        input.name = `gallery_images[${index}]`;
                    }
                });
            });
        };
        window.addGalleryItem = function () {
            const container = document.getElementById('gallery-items');
            const index = container.querySelectorAll('.gallery-item').length;
            const div = document.createElement('div');
            div.className = 'rounded-2xl border border-[#e6eaf5] p-4 gallery-item';
            div.innerHTML = `<div class="mb-3 flex items-center justify-between gap-3 text-sm font-semibold text-[#64708b]"><span>Item Galeri ${index + 1}</span><button type="button" onclick="this.closest('.gallery-item').remove(); window.renumberGalleryItems()" class="text-rose-500">Hapus</button></div><input name="gallery_items[${index}][label]" class="mb-3 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="Label"><input name="gallery_items[${index}][badge]" class="mb-3 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="Badge"><img src="<?php echo e(asset('images/no-bg-hero.png')); ?>" alt="Preview gallery baru" class="mb-3 h-32 w-full rounded-xl bg-[#f9f9ff] object-cover"><input type="file" name="gallery_images[${index}]" accept="image/*" class="w-full rounded-xl border border-dashed border-[#d9def1] px-4 py-3 text-sm">`;
            container.appendChild(div);
        };
        window.renumberTestimonialItems = function () {
            document.querySelectorAll('#testimonial-items .testimonial-item').forEach((item, index) => {
                item.querySelector('span').textContent = `Testimoni ${index + 1}`;
                item.querySelectorAll('input, textarea').forEach((input) => {
                    if (input.name.startsWith('testimonials[')) {
                        input.name = input.name.replace(/testimonials\[\d+\]/, `testimonials[${index}]`);
                    }
                    if (input.name.startsWith('testimonial_images[')) {
                        input.name = `testimonial_images[${index}]`;
                    }
                });
            });
        };
        window.addTestimonialItem = function () {
            const container = document.getElementById('testimonial-items');
            const index = container.querySelectorAll('.testimonial-item').length;
            const div = document.createElement('div');
            div.className = 'rounded-2xl border border-[#e6eaf5] p-4 testimonial-item';
            div.innerHTML = `<div class="mb-3 flex items-center justify-between gap-3 text-sm font-semibold text-[#64708b]"><span>Testimoni ${index + 1}</span><button type="button" onclick="this.closest('.testimonial-item').remove(); window.renumberTestimonialItems()" class="text-rose-500">Hapus</button></div><input name="testimonials[${index}][name]" class="mb-3 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="Nama"><input name="testimonials[${index}][role]" class="mb-3 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="Role"><textarea name="testimonials[${index}][quote]" rows="4" class="mb-3 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="Quote"></textarea><img src="<?php echo e(asset('images/logo.png')); ?>" alt="Preview testimoni baru" class="mb-3 h-32 w-full rounded-xl bg-[#f9f9ff] object-cover"><input type="file" name="testimonial_images[${index}]" accept="image/*" class="w-full rounded-xl border border-dashed border-[#d9def1] px-4 py-3 text-sm">`;
            container.appendChild(div);
        };
    </script>
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

<?php /**PATH C:\dev\jagobelajar-cms\resources\views\pages\admin\home-content.blade.php ENDPATH**/ ?>