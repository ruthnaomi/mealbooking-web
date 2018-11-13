<?php $__env->startSection('id','/'.$user->id); ?>

<?php $__env->startSection('fName',$user->fName); ?>

<?php $__env->startSection('sName',$user->sName); ?>

<?php $__env->startSection('email',$user->email); ?>

<?php $__env->startSection('phone',$user->phone); ?>

<?php $__env->startSection('username',$user->username); ?>

<?php $__env->startSection('method'); ?>
    <?php echo e(method_field('PUT')); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('registerAdd', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>