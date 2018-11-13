<?php $__env->startSection('title','Management Account Registration'); ?>

<?php $__env->startSection('header','Super Administrator Dashboard'); ?>

<?php $__env->startSection('body'); ?>
    <?php echo $__env->make('shared.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <table class="ui large table">
        <thead>
        <tr>
            <th colspan="6">
                <a href="<?php echo e(route('super')); ?>" class="ui large button">
                    <i class="caret left icon"></i>
                    Go Back - Home
                </a>
                <a href="<?php echo e(route('register.create')); ?>" class="ui large blue button">
                    <i class="user plus icon"></i>
                    Add New Account
                </a>
            </th>
        </tr>
        <tr>
            <th>#</th>
            <th>Name:</th>
            <th>Email:</th>
            <th>Phone:</th>
            <th>Role:</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php if(count($users) > 0): ?>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($loop->index + 1); ?></td>
                    <td><?php echo e($user->fName ." ". $user->sName); ?></td>
                    <td><a href="mailto:<?php echo e($user->email); ?>"><?php echo e($user->email); ?></a></td>
                    <td><?php echo e($user->phone); ?></td>
                    <td><?php echo e($user->role); ?></td>
                    <td>
                        <form id="form<?php echo e($user->id); ?>" action="<?php echo e(route('register.destroy',['register'=>$user->id])); ?>" method="post">
                            <a href="<?php echo e(route('register.edit',['register'=>$user->id])); ?>"><i class="edit large icon"></i></a>
                            <?php echo e(method_field('DELETE')); ?>

                            <?php echo e(csrf_field()); ?>

                            <a href="#" onclick="function submit() {
                                        document.getElementById('form<?php echo e($user->id); ?>').submit();
                                    }
                                    submit()">
                                <i class="trash large icon"></i>
                            </a>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <tr>
                <td colspan="6">No account(s) record found!</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
    <?php echo e($users->links('vendor.pagination.semantic-ui')); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>