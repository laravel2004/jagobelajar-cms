<?php if (isset($component)) { $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.admin','data' => ['title' => ($post->exists ? 'Edit Blog' : 'Tambah Blog').' - '.config('app.name')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(($post->exists ? 'Edit Blog' : 'Tambah Blog').' - '.config('app.name'))]); ?>
    <form method="POST" enctype="multipart/form-data" action="<?php echo e($post->exists ? route('admin.blogs.update', $post) : route('admin.blogs.store')); ?>" class="space-y-6">
        <?php echo csrf_field(); ?>
        <?php if($post->exists): ?>
            <?php echo method_field('PUT'); ?>
        <?php endif; ?>

        <section class="rounded-[2rem] bg-white p-6 shadow-[0_18px_55px_rgba(20,27,44,0.08)] ring-1 ring-[#e6eaf5] sm:p-8 space-y-5">
            <div class="grid gap-5 lg:grid-cols-[1fr_320px]">
                <div class="space-y-5">
                    <div>
                        <label class="text-sm font-bold text-[#141b2c]">Judul</label>
                        <input name="title" value="<?php echo e(old('title', $post->title)); ?>" class="mt-2 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm">
                        <?php $__errorArgs = ['title'];
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
                        <input name="slug" value="<?php echo e(old('slug', $post->slug)); ?>" class="mt-2 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="kosongkan jika mau auto generate">
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
                        <label class="text-sm font-bold text-[#141b2c]">Ringkasan</label>
                        <textarea name="excerpt" rows="3" class="mt-2 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm"><?php echo e(old('excerpt', $post->excerpt)); ?></textarea>
                        <?php $__errorArgs = ['excerpt'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-2 text-sm text-rose-500"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div>
                        <label class="text-sm font-bold text-[#141b2c]">Konten Artikel</label>
                        <textarea id="blog-content" name="content" class="hidden"><?php echo e(old('content', $post->content)); ?></textarea>
                        <div class="mt-2 overflow-hidden rounded-2xl border border-[#d9def1] bg-white">
                            <div class="flex flex-wrap gap-2 border-b border-[#e9edff] bg-[#f9f9ff] px-3 py-2 text-sm">
                                <button type="button" data-command="formatBlock" data-value="h2" class="rounded-lg px-3 py-1.5 font-bold hover:bg-white">H2</button>
                                <button type="button" data-command="formatBlock" data-value="p" class="rounded-lg px-3 py-1.5 hover:bg-white">Paragraf</button>
                                <button type="button" data-command="bold" class="rounded-lg px-3 py-1.5 font-bold hover:bg-white">B</button>
                                <button type="button" data-command="italic" class="rounded-lg px-3 py-1.5 italic hover:bg-white">I</button>
                                <button type="button" data-command="insertUnorderedList" class="rounded-lg px-3 py-1.5 hover:bg-white">List</button>
                                <button type="button" data-command="createLink" class="rounded-lg px-3 py-1.5 hover:bg-white">Link</button>
                            </div>
                            <div id="blog-editor" contenteditable="true" class="prose prose-slate min-h-80 max-w-none p-5 text-sm leading-7 outline-none"><?php echo old('content', $post->content); ?></div>
                        </div>
                        <?php $__errorArgs = ['content'];
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
                        <?php if($post->featured_image_path): ?>
                            <img src="<?php echo e(asset('storage/'.$post->featured_image_path)); ?>" alt="<?php echo e($post->title); ?>" class="mt-3 aspect-video w-full rounded-2xl object-cover">
                        <?php endif; ?>
                        <input type="file" name="featured_image" accept="image/*" class="mt-3 w-full rounded-xl border border-[#d9def1] bg-white px-4 py-3 text-sm">
                        <?php $__errorArgs = ['featured_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-2 text-sm text-rose-500"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div>
                        <label class="text-sm font-bold text-[#141b2c]">Tanggal Terbit</label>
                        <input type="datetime-local" name="published_at" value="<?php echo e(old('published_at', optional($post->published_at)->format('Y-m-d\\TH:i'))); ?>" class="mt-2 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm">
                    </div>
                    <div>
                        <label class="text-sm font-bold text-[#141b2c]">Durasi Baca</label>
                        <input type="number" name="reading_minutes" value="<?php echo e(old('reading_minutes', $post->reading_minutes ?: 5)); ?>" class="mt-2 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm" min="1">
                    </div>
                    <label class="flex items-center gap-3 text-sm font-bold text-[#141b2c]"><input type="checkbox" name="is_published" value="1" <?php if(old('is_published', $post->is_published ?? true)): echo 'checked'; endif; ?>> Published</label>
                </div>
            </div>

            <div class="flex justify-end gap-3">
                <a href="<?php echo e(route('admin.blogs.index')); ?>" class="rounded-2xl bg-[#f1f3ff] px-6 py-3 text-sm font-extrabold text-[#0043c6]">Batal</a>
                <button class="rounded-2xl bg-[#0043c6] px-6 py-3 text-sm font-extrabold text-white">Simpan</button>
            </div>
        </section>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const editor = document.getElementById('blog-editor');
            const input = document.getElementById('blog-content');
            const form = editor?.closest('form');
            if (!editor || !input || !form) return;

            const sync = () => input.value = editor.innerHTML.trim();
            editor.addEventListener('input', sync);
            form.addEventListener('submit', sync);

            form.querySelectorAll('[data-command]').forEach((button) => {
                button.addEventListener('click', () => {
                    editor.focus();
                    const command = button.dataset.command;
                    const value = command === 'createLink' ? prompt('Masukkan URL') : button.dataset.value || null;
                    if (command !== 'createLink' || value) document.execCommand(command, false, value);
                    sync();
                });
            });
        });
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
<?php /**PATH C:\dev\jagobelajar-cms\resources\views/pages/admin/blogs/form.blade.php ENDPATH**/ ?>