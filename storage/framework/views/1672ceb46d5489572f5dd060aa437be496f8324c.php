

<?php $__env->startSection('content'); ?>
    <div clas="container">
        table>
            <thead>
                <!-- <tr>
                    <th>Title</th><th>Author</th><th>Date of Publish</th><th>Description</th>                
                </tr> -->
            </thead>
            <tbody>
                <tr>
                    <td>Title</td>
                    <td> <?php echo e($book->title); ?> </td>               
                </tr>
                <tr>
                    <td>Author</td>
                    <td> <?php echo e($book->authors); ?> </td>               
                </tr>
                <tr>
                    <td>Genre</td>
                    <td> <?php echo e($book->authors); ?> </td>               
                </tr>
                <tr>
                    <td>Date of Publish</td>
                    <td> <?php echo e($book->released_at); ?> </td>               
                </tr>

                <tr>
                    <td>Number of Pages</td>
                    <td> <?php echo e($book->pages); ?> </td>               
                </tr>
                <tr>
                    <td>Language</td>
                    <td> <?php echo e($book->language_code); ?> </td>               
                </tr>
                <tr>
                    <td>ISBN</td>
                    <td> <?php echo e($book->isbn); ?> </td>               
                </tr>
                <tr>
                    <td>In Stock</td>
                    <td> <?php echo e($book->in_stock); ?> </td>               
                </tr>
                <tr>
                    <td>Available Books</td>
                    <td>                 </td>               
                </tr>

                <tr>
                    <td>Description</td>
                    <td> <?php echo e($book->description); ?> </td>               
                </tr>
                <tr>
                    <td>Cover Image</td>
                    <td> <?php echo e($book->cover_image); ?> </td>               
                </tr>
                
            </tbody>
        </table>
    </div>

    
  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\uni_prjcts\web_en\project_1\brs\resources\views/books/show.blade.php ENDPATH**/ ?>