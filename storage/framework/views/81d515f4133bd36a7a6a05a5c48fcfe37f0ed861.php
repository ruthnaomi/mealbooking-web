

<?php $__env->startSection('title','Booking(s) List'); ?>

<?php $__env->startSection('header','Cashier Dashboard'); ?>

<?php $__env->startSection('body'); ?>
    <?php echo $__env->make('shared.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('shared.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<a href="<?php echo e(route('bookings.index')); ?>" class="ui large button">
		<i class="caret left icon"></i>
		Go Back - Booking(s) List
	</a>
    <table class="ui large red table">
        <thead>
        <tr>
            <th colspan="4">
                <table class="ui red inverted table">
                    <thead>
                    <tr>
                        <th>Booking For:</th>
                        <th><?php echo e($meals->user->fName." ".$meals->user->sName); ?></th>
                    </tr>
                    <tr>
                        <th>Booking No:</th>
                        <th><?php echo e($meals->id); ?></th>
                    </tr>
                    <tr>
                        <th>Status:</th>
                        <th>
                            <?php if($meals->status == 0): ?>
                                <label for="" class="ui label">Pending to be served...</label>
                            <?php else: ?>
                                <label for="" class="ui blue label">Served!</label>
                            <?php endif; ?>
                        </th>
                    </tr>
                    </thead>
                </table>
            </th>
        </tr>
        <tr>
            <th>Image:</th>
            <th>Dish Name:</th>
            <th>Booked Qty:</th>
            <th>Booked At:</th>
            
        </tr>
        </thead>
        <tbody>
        <?php if(count($meals) > 0): ?>
            <?php $__currentLoopData = $meals->bookingDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $meal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                        <img src="<?php echo e(asset('image/avater.png')); ?>" alt="" class="ui avatar image"> 
                    </td>
                    <td><?php echo e($meal->name); ?></td>
                    <td><?php echo e($meal->qty); ?></td>
                    <td><?php echo e($meal->created_at); ?></td>
                    
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <tr>
                <td colspan="5" style="text-align: center;font-weight: bold">
                    <img src="<?php echo e(asset('image/dish.png')); ?>" alt="<?php echo e(config('app.name')); ?>" class="ui tiny centered image">
                    <div style="margin: 5px 5px 5px 5px">No Booking meal(s) found yet!</div>
                </td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>