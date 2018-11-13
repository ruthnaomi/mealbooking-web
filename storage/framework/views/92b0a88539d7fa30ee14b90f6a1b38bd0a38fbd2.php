

<?php $__env->startSection('title','Booking(s) List'); ?>

<?php $__env->startSection('header','Cashier Dashboard'); ?>

<?php $__env->startSection('body'); ?>

    <?php
    $print=0;
        if (isset($_GET["submit"]))
        {
            $print=1;
            \App\Booking::where('id',$meals->id)->update([
                'status'=>1
            ]);
            echo "<script>window.print();</script>";
        }
    ?>
    <?php if($print==0): ?>
        <form id="dontPrintMe" action="" method="get">
            <button class="ui blue button" name="submit">Submit and Print</button>
        </form>
    <?php else: ?>
        <a href="<?php echo e(route('bookings.index')); ?>" class="ui red button" id="dontPrintMe">Go Back to Booking Orders</a>
    <?php endif; ?>

    <table class="ui large red table">
        <thead>
        <tr>
            <th colspan="4" style="text-align: center">
                <h3><?php echo e(config('app.name')); ?></h3>
                <p>Meal Booking Receipt</p>
                <?php if($meals->user->role == "cashier"): ?>
                    <p>Cashier: <?php echo e($meals->user->fName . " " . $meals->user->sName); ?></p>
                    <p>Order No: <?php echo e($meals->id); ?></p>
                <?php else: ?>
                    <p>Customer: <?php echo e($meals->user->fName . " " . $meals->user->sName); ?></p>
                    <p>Booking No: <?php echo e($meals->id); ?></p>
                <?php endif; ?>
                <p><?php echo e($meals->created_at); ?></p>
            </th>
        </tr>
        <tr>
            <th>Dish Name:</th>
            <th>Booked Qty:</th>
            <th>Net Price:</th>
            <th>Gross Price:</th>
        </tr>
        </thead>
        <tbody>
        <?php $total=0; ?>
        <?php if(count($meals) > 0): ?>
            <?php $__currentLoopData = $meals->bookingDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $meal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($meal->name); ?></td>
                    <td><?php echo e($meal->qty); ?></td>
                    <td style="text-align: left">Ksh.<?php echo e(number_format($meal->net_price)); ?>.00 KES</td>
                    <td style="text-align: left">Ksh.<?php echo e(number_format($meal->gross_price)); ?>.00 KES</td>
                </tr>
                <?php $total += $meal->gross_price; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <tr>
                <td colspan="4" style="text-align: center;font-weight: bold">
                    <img src="<?php echo e(asset('image/dish.png')); ?>" alt="<?php echo e(config('app.name')); ?>" class="ui tiny centered image">
                    <div style="margin: 5px 5px 5px 5px">No Booking meal(s) found yet!</div>
                </td>
            </tr>
        <?php endif; ?>
        <tr>
            <td colspan="3" style="text-align: right;font-weight: bold">Grand Total:</td>
            <td style="text-align: left;font-weight: bold">Ksh.<?php echo e(number_format($total)); ?>.00 KES</td>
        </tr>
        <?php if($meals->user->role == "cashier"): ?>
            <tr>
                <td colspan="3" style="text-align: right;font-weight: bold">Cash Paid:</td>
                <td style="text-align: left;font-weight: bold">Ksh. <?php echo e(number_format($meals->payment)); ?>.00 KES</td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: right;font-weight: bold">Change:</td>
                <td style="text-align: left;font-weight: bold">Ksh.<?php echo e(number_format($meals->customer_change)); ?>.00 KES</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>