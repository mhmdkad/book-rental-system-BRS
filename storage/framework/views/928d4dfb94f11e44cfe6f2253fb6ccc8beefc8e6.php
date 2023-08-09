

<?php $__env->startSection('content'); ?>
  <style>
    .badge{background-color: white; color: black;}
  </style>
  
  <div class="container" >
    <h1>Welcome to <b> BRS </b> </h1>
    <br>
   
    <button type="button" class="btn btn-warning">
      Users Count <span class="badge badge-light"><?php echo e($nb_users); ?></span>
    </button>

    <button type="button" class="btn btn-success">
      Genres Count <span class="badge badge-light"><?php echo e($nb_genres); ?></span>
    </button>

    <button type="button" class="btn btn-danger">
      Books Count <span class="badge badge-light"><?php echo e($nb_books); ?></span>
    </button>

    <button type="button" class="btn btn-primary">
      Active Rentals <span class="badge badge-light"><?php echo e($nb_act_books); ?></span>
    </button>
    <br><br>

    <div class="row">
    <?php $__currentLoopData = $genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-sm-3 my-3">
        <div class="card h-100">
          <img src="<?php echo e(asset('images/genres.png')); ?>" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title"></h5>
            <p class="card-text"></p>
            <p class="card-text"><h3><?php echo e(ucfirst($genre->name)); ?></h3></p>
            <a href="/genre/<?php echo e($genre->id); ?>/show" class="btn btn-primary">Browse</a>
          </div>
        </div>
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
      
      
    
  </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\uni_prjcts\web_en\project_1\brs\resources\views/main.blade.php ENDPATH**/ ?>