

<?php $__env->startSection('title','Daily Food Ordered Report(s) List'); ?>

<?php $__env->startSection('header','Daily Food Ordered Report List'); ?>

<?php $__env->startSection('body'); ?>
    <?php echo $__env->make('shared.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('shared.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <table class="ui large red table" id="myTable">
        <thead>
        <tr>
            <th>#</th>
            <th>Image:</th>
            <th>Meal Name:</th>
            <th>Qty Served:</th>
        </tr>
        </thead>
        <tbody>
        <?php if(count($meals) > 0): ?>
            <?php $__currentLoopData = $meals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $meal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($meal->id); ?></td>
                    <td>
                        <img src="<?php echo e(asset('image/meals/'.$meal->image)); ?>" alt="<?php echo e($meal->image); ?>" class="ui avatar image"> 
                    </td>
                    <td><?php echo e($meal->name); ?></td>
                    <td><?php echo e(number_format(\App\BookingDetail::where('meal_id',$meal->id)->get()->count())); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <tr>
                <td colspan="4" style="text-align: center;font-weight: bold">
                    <img src="<?php echo e(asset('image/dish.png')); ?>" alt="<?php echo e(config('app.name')); ?>" class="ui tiny centered image">
                    <div style="margin: 5px 5px 5px 5px">No Food report list(s) done yet!</div>
                </td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>