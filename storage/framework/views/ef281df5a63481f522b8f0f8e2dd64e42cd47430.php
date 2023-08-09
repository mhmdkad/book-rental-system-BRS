

<?php $__env->startSection('content'); ?>
    <style>
        .title {font-weight: bolder;
                color: cadetblue;}
        td:nth-child(2) {padding: 3px 0px 13px 60px;
            font-size: large;}
        .inner_titles {color: cadetblue;
                       padding-top: 24px;}
        .status {  color: palevioletred;}
    </style>

    <div class="container">
        <h1 class="title"> Book Rental Details</h1>
        <br>
        <div class="row">
            <div class="col-6">
                <table class="">
            
                    <tbody>
                        <tr>
                            <td olspan="2" class="inner_titles"><h2>Book</h2></td>
                        </tr>
                        <tr>
                            <td><b>Title</b></td>
                            <td><?php echo e($rental_details[0]->title); ?></td>
                        </tr>
                        <tr>
                            <td><b>Author</b></td>
                            <td><?php echo e($rental_details[0]->authors); ?></td>
                        </tr>
                        <tr>
                            <td><b>Date</b></td>
                            <td><?php echo e($rental_details[0]->deadline); ?></td>
                        </tr>
                        <tr>                            
                            <td olspan="2" class="inner_titles"><h2>Rental Info</h2></td>
                        </tr>
                        <tr>
                            <td><b>Name of Reader</b></td>
                            <td><?php echo e($rental_details[0]->r_name); ?></td>
                        </tr>
                        <tr>
                            <td><b>Request Date</b></td>
                            <td><?php echo e($rental_details[0]->request_processed_at); ?></td>
                        </tr>
                        <tr>
                            <td><b>status</b></td>
                            <td class="status"><?php echo e($rental_details[0]->status); ?></td>
                        </tr>
                        <?php echo $html; ?>


                    </tbody>
                </table>

                <br>

                <?php if(auth()->guard()->check()): ?> 
                    <?php if(Auth::user()->is_librarian == 1): ?>

                        <form action="<?php echo e(route('rentals.update', ['rental_id' => $rental_details[0]->id])); ?>" method="POST">
                            
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>

                            <div class="form-group">
                                <label for="status" >Status</label>
                                <select name="status" class="form-control <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="status">
                                    <?php $__currentLoopData = $status_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($status == old('status', $rental_details[0]->status)): ?>
                                            <option value="<?php echo e($status); ?>" selected="selected"><?php echo e($status); ?></option>
                                        <?php else: ?>
                                            <option value="<?php echo e($status); ?>"><?php echo e($status); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                         
                            <div class="form-group">
                                <label for="deadline">Deadline</label>
                                <input type="datetime-local" name="deadline" class="form-control <?php $__errorArgs = ['deadline'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="deadline" 
                                    value="<?php echo e(old('deadline', $rental_details[0]->deadline)); ?>">
                                <?php $__errorArgs = ['deadline'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback">
                                    <?php echo e($message); ?>

                                    </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <br>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Set Status</button>
                            </div>

                        </form>

                    <?php endif; ?>
                <?php endif; ?>
            </div>

        </div>
        <br>
        
        
        
    </div>
    
  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\uni_prjcts\web_en\project_1\brs\resources\views/rentals/rental_detail.blade.php ENDPATH**/ ?>