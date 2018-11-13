<?php $__env->startSection('title','Register Users - New Accounts'); ?>

<?php $__env->startSection('header','Super Administrator Dashboard'); ?>

<?php $__env->startSection('body'); ?>
    <div class="ui stackable grid">
        <div class="row">
            <div class="three wide column"></div>
            <div class="ten wide column">
                <div class="ui segments">
                    <div class="ui inverted blue segment">
                        <a href="<?php echo e(route('register.index')); ?>" class="ui button"><i class="caret left icon"></i> Go Back</a>
                        <i class="user icon"></i><?php echo e(ucwords(substr(Route::currentRouteName(),9))); ?> Account
                    </div>
                    <div class="ui segment">
                        <?php echo $__env->make('shared.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <form action="<?php echo e(route('register.store')); ?><?php echo $__env->yieldContent('id'); ?>" class="ui big form" method="post">
                            <?php echo e(csrf_field()); ?>

                            <?php $__env->startSection('method'); ?>
                            <?php echo $__env->yieldSection(); ?>
                            <div class="two fields">
                                <div class="field required">
                                    <div class="ui left icon input">
                                        <input type="text" name="fName" placeholder="First Name" value="<?php echo $__env->yieldContent('fName'); ?><?php echo e(old('fName')); ?>" autofocus>
                                        <i class="user icon"></i>
                                    </div>
                                </div>
                                <div class="field required">
                                    <div class="ui left icon input">
                                        <input type="text" name="sName" placeholder="Second Name" value="<?php echo $__env->yieldContent('sName'); ?><?php echo e(old('sName')); ?>" autofocus>
                                        <i class="user icon"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="field required">
                                <div class="ui left icon input">
                                    <input type="text" name="email" placeholder="Email" value="<?php echo $__env->yieldContent('email'); ?><?php echo e(old('email')); ?>">
                                    <i class="mail icon"></i>
                                </div>
                            </div>
                            <div class="field required">
                                <div class="ui left icon input">
                                    <input type="text" name="phone" placeholder="Mobile No" value="<?php echo $__env->yieldContent('phone'); ?><?php echo e(old('phone')); ?>">
                                    <i class="call icon"></i>
                                </div>
                            </div>
                            <div class="field required">
                                <div class="ui left icon input">
                                    <input type="text" name="username" placeholder="Username" value="<?php echo $__env->yieldContent('username'); ?><?php echo e(old('username')); ?>">
                                    <i class="user icon"></i>
                                </div>
                            </div>
                            <div class="two fields">
                                <div class="field required">
                                    <div class="ui left icon input">
                                        <input type="password" name="password" placeholder="Password" value="<?php echo e(old('password')); ?>">
                                        <i class="lock icon"></i>
                                    </div>
                                </div>
                                <div class="field required">
                                    <div class="ui left icon input">
                                        <input type="password" name="password_confirmation" placeholder="Confirm Password" value="<?php echo e(old('password')); ?>">
                                        <i class="lock icon"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="field">
                                <select name="role" id="user" class="ui select dropdown">
                                    <option value="">Choose Role:</option>
                                    <option value="admin">Admin</option>
                                    <option value="cashier">Cashier</option>
                                    <option value="student">Student</option>
                                    <option value="chef">Chef</option>
                                </select>
                            </div>
                            <div class="field">
                                <button type="submit" class="ui big blue  button"><?php echo e(ucwords(substr(Route::currentRouteName(),9))); ?> Account</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="three wide column"></div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>