<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e($title ?? 'Admin - '.config('app.name')); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="bg-[#f9f9ff] text-[#141b2c] antialiased" style="font-family: 'Manrope', ui-sans-serif, system-ui, sans-serif;">
    <div class="min-h-screen lg:flex">
        <?php echo $__env->make('components.admin-sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <div class="min-w-0 flex-1">
            <?php echo $__env->make('components.admin-topbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <main class="p-4 sm:p-6 lg:p-8">
                <?php echo e($slot); ?>

            </main>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\dev\jagobelajar-cms\resources\views\layouts\admin.blade.php ENDPATH**/ ?>