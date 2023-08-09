

<?php $__env->startSection('content'); ?>
    
    <div class="container">
        <h1> User Profile </h1>
        <br>
        <div class="form-group">
          <label for="name">User Name</label>
          <input name="name" type="text" class="form-control" id="name" placeholder="" maxlength="255" value="<?php echo e($user->name); ?>" readonly>
        </div>
        <br>
        <div class="form-group">
          <label for="email">E-mail</label>
          <input name="email" type="text" class="form-control" id="email" placeholder="" maxlength="255" value="<?php echo e($user->email); ?>" readonly>
        </div>
        <br>
        <div class="form-group">
          <label for="role">Role</label>
          <input name="role" type="text" class="form-control" id="role" placeholder="" maxlength="255" value="<?php echo e($role); ?>" readonly>
        </div>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\uni_prjcts\web_en\project_1\brs\resources\views/auth/profile.blade.php ENDPATH**/ ?>