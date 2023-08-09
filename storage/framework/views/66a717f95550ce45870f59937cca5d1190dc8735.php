

<?php $__env->startSection('content'); ?>
    <style>
        .title {font-weight: bolder;
                color: cadetblue;}
    </style>
    
    <div class="container">
        <h1 class="title"> <?php echo e(ucwords($genre_name)); ?> </h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th><th>Author</th>
                    <th>Date of Publish</th><th>Description</th>
                </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><a href="/books/<?php echo e($book->id); ?>/show"><?php echo e($book->title); ?></a>  </td>               
                    <td> <?php echo e($book->authors); ?> </td>
                    <td> <?php echo e($book->description); ?> </td>
                    <td> <?php echo e($book->released_at); ?> </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\uni_prjcts\web_en\project_1\brs\resources\views/books/books_by_genre.blade.php ENDPATH**/ ?>