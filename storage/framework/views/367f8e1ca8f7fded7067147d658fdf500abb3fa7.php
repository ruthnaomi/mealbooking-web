

<?php $__env->startSection('title','Booking(s) List'); ?>

<?php $__env->startSection('header','Cashier Dashboard'); ?>

<?php $__env->startSection('body'); ?>
    <?php echo $__env->make('shared.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('shared.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <table class="ui large red table" id="myTable">
        <thead>
        <tr>
            <th>Image:</th>
            <th>Booking No:</th>
            <th>Customer Name:</th>
            <th>Status:</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php if(count($meals) > 0): ?>
            <?php $__currentLoopData = $meals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $meal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                        <img src="<?php echo e(asset('image/avater.png')); ?>" alt="<?php echo e($meal->image); ?>" class="ui avatar image"> 
                    </td>
                    <td><?php echo e($meal->id); ?></td>
                    <td><?php echo e($meal->user->fName ." ". $meal->user->sName); ?></td>
                    <td>
                        <?php if($meal->status == 0): ?>
                            <label for="" class="ui label">Pending to be served...</label>
                        <?php else: ?>
                            <label for="" class="ui blue label">Served!</label>
                        <?php endif; ?>
                    </td>
                    <td>

                        <div class="ui small buttons">
                            <a href="<?php echo e(route('bookings.show',$meal->id)); ?>" class="ui button"><i class="utensils icon"></i></a>
                            <div class="or"></div>
                            <a href="<?php echo e(route('print.show',$meal->id)); ?>" class="ui positive button"><i class="print icon"></i></a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <tr>
                <td colspan="5" style="text-align: center;font-weight: bold">
                    <img src="<?php echo e(asset('image/dish.png')); ?>" alt="<?php echo e(config('app.name')); ?>" class="ui tiny centered image">
                    <div style="margin: 5px 5px 5px 5px">No Booking(s) done yet!</div>
                </td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>