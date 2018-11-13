

<?php $__env->startSection('title','Super Administrator'); ?>

<?php $__env->startSection('header','Super Administrator Dashboard'); ?>

<?php $__env->startSection('body'); ?>
    <div class="ui stackable segments">
        <div class="ui header blue inverted segment">
            <i class="linkify icon"></i>
            Manage Account(s)
        </div>
        <div class="ui horizontal segments" style="background: #fff">
            <div class="ui segment">
                <a href="<?php echo e(route('register.create')); ?>" style="font-size: 18px">
                    <i class="user plus big icon"></i>
                    Create Account(s)
                </a>
            </div>
            <div class="ui segment">
                <a href="<?php echo e(route('register.index')); ?>" style="font-size: 18px">
                    <i class="users big icon"></i>
                    Registered Account(s)
                </a>
            </div>
        </div>
    </div>
    
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>