

<?php $__env->startSection('content'); ?>
    <style>
        th {width: 25%;}
        .title {font-weight: bolder;
                color: cadetblue;}
    </style>
    <br><br>
    <div class="container">

        <h3 class='title'> Rental requests with PENDING status </h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th><th>Author</th>
                    <th>Date of Rental</th><th>Deadline</th>
                </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $rentals_pending; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rental): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><a href="<?php echo e(route('rental.show', ['rental_id' => $rental->id])); ?>"><?php echo e($rental->title); ?></a>  </td>               
                    <td> <?php echo e($rental->authors); ?> </td>
                    <td> <?php echo e($rental->rental_time); ?> </td>
                    <td> <?php echo e($rental->deadline); ?> </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <br><br>


        <h3 class='title'> Accepted and in-time rentals </h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th><th>Author</th>
                    <th>Date of Rental</th><th>Deadline</th>
                </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $rentals_accepted_intime; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rental): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><a href="<?php echo e(route('rental.show', ['rental_id' => $rental->id])); ?>"><?php echo e($rental->title); ?></a>  </td>               
                    <td> <?php echo e($rental->authors); ?> </td>
                    <td> <?php echo e($rental->rental_time); ?> </td>
                    <td> <?php echo e($rental->deadline); ?> </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <br><br>


        <h3 class='title'> Accepted late rentals </h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th><th>Author</th>
                    <th>Date of Rental</th><th>Deadline</th>
                </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $rentals_accepted_late; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rental): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><a href="<?php echo e(route('rental.show', ['rental_id' => $rental->id])); ?>"><?php echo e($rental->title); ?></a>  </td>               
                    <td> <?php echo e($rental->authors); ?> </td>
                    <td> <?php echo e($rental->rental_time); ?> </td>
                    <td> <?php echo e($rental->deadline); ?> </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <br><br>


        <h3 class='title'> Rejected rental requests </h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th><th>Author</th>
                    <th>Date of Rental</th><th>Deadline</th>
                </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $rentals_rejected; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rental): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><a href="<?php echo e(route('rental.show', ['rental_id' => $rental->id])); ?>"><?php echo e($rental->title); ?></a>  </td>               
                    <td> <?php echo e($rental->authors); ?> </td>
                    <td> <?php echo e($rental->rental_time); ?> </td>
                    <td> <?php echo e($rental->deadline); ?> </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <br><br>


        <h3 class='title'> Returned rentals </h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th><th>Author</th>
                    <th>Date of Rental</th><th>Deadline</th>
                </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $rentals_returned; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rental): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><a href="<?php echo e(route('rental.show', ['rental_id' => $rental->id])); ?>"><?php echo e($rental->title); ?></a>  </td>               
                    <td> <?php echo e($rental->authors); ?> </td>
                    <td> <?php echo e($rental->rental_time); ?> </td>
                    <td> <?php echo e($rental->deadline); ?> </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <br><br>

    </div>

  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\uni_prjcts\web_en\project_1\brs\resources\views/rentals/show.blade.php ENDPATH**/ ?>