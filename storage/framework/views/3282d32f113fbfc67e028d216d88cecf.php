<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e($title ?? 'Admin - '.config('app.name')); ?></title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="bg-slate-100 text-slate-900 antialiased">
    <div class="min-h-screen overflow-x-hidden lg:flex">
        <?php echo $__env->make('components.admin-sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <div class="min-w-0 flex-1 lg:pl-72">
            <?php echo $__env->make('components.admin-topbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <main class="p-4 sm:p-6 lg:p-8">
                <?php echo e($slot); ?>

            </main>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\dev\jagobelajar-cms\resources\views/components/layouts/admin.blade.php ENDPATH**/ ?>