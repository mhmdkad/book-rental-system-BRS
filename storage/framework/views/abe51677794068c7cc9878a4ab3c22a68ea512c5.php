

<?php $__env->startSection('content'); ?>
    <style>
        .float_left {float: right;}
    </style>

    <div class="container">
        <h1> List of Genres </h1>
        <a href="<?php echo e(route('genres.create')); ?>" class="btn btn-primary float_left">Add</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th><th>Style</th><th></th>
                </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td> <?php echo e($genre->name); ?> </td>
                    <td> <?php echo e($genre->style); ?> </td>
                    <td style="width: 12%;">
                        <a href="<?php echo e(route('genres.edit', ['genre_id' => $genre->id])); ?>" class="btn btn-secondary">Edit</a>                    
                        <form action="<?php echo e(route('genres.destroy', ['genre_id' => $genre->id])); ?>" method="POST" class="d-inline">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-warning">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\uni_prjcts\web_en\project_1\brs\resources\views/genres/show.blade.php ENDPATH**/ ?>