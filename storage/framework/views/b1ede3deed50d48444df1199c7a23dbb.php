<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog Detail</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-between w-full items-center mb-6">
            <h1 class="text-6xl font-bold mb-4">Detail Blog</h1>
            <a href="<?php echo e(route('blogs.index')); ?>" class="text-white bg-gray-500 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center leading-5 transition">Kembali</a>
        </div>

        <div class="bg-white rounded-lg shadow border border-gray-200 p-8">
            <div class="flex justify-between items-start mb-6">
                <h2 class="text-4xl font-bold text-gray-900"><?php echo e($blog->tittle); ?></h2>
                
                <?php if($blog->status == 'Active'): ?>
                <span class="inline-flex items-center px-3 py-1 text-sm font-medium text-green-800 bg-green-100 rounded-full">
                    <?php echo e($blog->status); ?>

                </span>
                <?php else: ?>
                <span class="inline-flex items-center px-3 py-1 text-sm font-medium text-red-800 bg-red-100 rounded-full">
                    <?php echo e($blog->status); ?>

                </span>
                <?php endif; ?>
            </div>

            <div class="text-gray-700 text-lg leading-relaxed mb-8">
                <?php echo e($blog->deskripsi); ?>

            </div>
            
            <hr class="border-gray-200 mb-6">
            
            <div class="flex flex-col sm:flex-row sm:justify-between text-sm text-gray-500">
                <p><strong>Author ID:</strong> <?php echo e($blog->user_id); ?></p>
                <p><strong>Dibuat pada:</strong> <?php echo e($blog->created_at ? \Carbon\Carbon::parse($blog->created_at)->format('d M Y, H:i') : '-'); ?></p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>
</body>

</html>
<?php /**PATH D:\CODING\Laravel\Blogs\resources\views/blogs/detail.blade.php ENDPATH**/ ?>