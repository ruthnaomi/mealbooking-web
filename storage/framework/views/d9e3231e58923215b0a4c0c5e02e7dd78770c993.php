<?php $__env->startSection('title','Cashier - Backend'); ?>

<?php $__env->startSection('header','Cashier Dashboard'); ?>

<?php $__env->startSection('body'); ?>
    <div class="ui equal width column grid stackable">
        <div class="column">
            <a href="<?php echo e(route('bookings.index')); ?>">
                <div class="ui segment" style="text-align: center; font-size: 18px; padding: 3rem">
                    <i class="huge icons">
                        <i class="shopping bag red icon"></i>
                        <i class="corner utensils red icon"></i>
                    </i>
                    <div style="margin: 1rem"></div>
                    Manage Order(s)
                </div>
            </a>
        </div>
        <div class="column">
            <a href="<?php echo e(route('meals.index')); ?>">
                <div class="ui segment" style="text-align: center; font-size: 18px; padding: 3rem">
                    <i class="huge icons">
                        <i class="shopping utensils red icon"></i>
                  
                    </i>
                    <div style="margin: 1rem"></div>
                    Manage Meal(s)
                </div>
            </a>
        </div>
        <div class="column">
            <a href="<?php echo e(route('reports.index')); ?>">
                <div class="ui segment" style="text-align: center; font-size: 18px; padding: 3rem">
                    <i class="huge icons">
                        <i class="clipboard red icon"></i>
                    </i>
                    <div style="margin: 1rem"></div>
                    Manage Report(s)
                </div>
            </a>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>