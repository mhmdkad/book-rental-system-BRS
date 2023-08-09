

<?php $__env->startSection('content'); ?>
    
    <style>
        .title {font-weight: bolder;
                color: cadetblue;}
        td:nth-child(2) {padding: 3px 0px 13px 60px;
            font-size: large;}
        .cvr_img {height: 414px;}
    </style>
    
    <div class="container">
        <h1 class="title"> Book Details</h1>
        <br><br>
        <div class="row">
            <div class="col-6">
                <table class="">
            
                    <tbody>
                        <tr>
                            <td><b>Title</b></td>
                            <td><?php echo e($book->title); ?></td>
                        </tr>
                        <tr>
                            <td><b>Author</b></td>
                            <td><?php echo e($book->authors); ?></td>
                        </tr>
                        <tr>
                            <td><b>Genre</b></td>
                            <td><?php echo e($genres_list); ?></td>
                        </tr>
                        <tr>
                            <td><b>Date of Publish</b></td>
                            <td><?php echo e($book->released_at); ?></td>
                        </tr>
                        <tr>
                            <td><b>Number of Pages</b></td>
                            <td><?php echo e($book->pages); ?></td>
                        </tr>
                        <tr>
                            <td><b>Language</b></td>
                            <td><?php echo e($book->language_code); ?></td>
                        </tr>
                        <tr>
                            <td><b>ISBN</b></td>
                            <td><?php echo e($book->isbn); ?></td>
                        </tr>
                        <tr>
                            <td><b>In Stock</b></td>
                            <td><?php echo e($book->in_stock); ?></td>
                        </tr>
                        <tr>
                            <td><b>Available Books</b></td>
                            <td><?php echo e($nb_av_books); ?></td>
                        </tr>
                        <tr>
                            <td><b>Description</b></td>
                            <td><?php echo e($book->description); ?></td>
                        </tr>
                        

                    </tbody>
                </table>
            </div>

            <div class="col-6">
                <img class='cvr_img' src="<?php echo e(asset('images/book-cover.png')); ?>"></img>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-6">
                <?php echo $html; ?>

                <?php if(auth()->guard()->check()): ?>
                    <?php if(Auth::user()->is_librarian == 1): ?>
                    <form action="<?php echo e(route('books.destroy', ['book_id' => $book->id])); ?>" method="POST" class="d-inline">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-warning">Delete</button>
                    </form>
                    <?php endif; ?>
                <?php endif; ?>
            </div>

        </div>
        
        
    </div>

  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\uni_prjcts\web_en\project_1\brs\resources\views/books/book_detail.blade.php ENDPATH**/ ?>