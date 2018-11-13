<?php if(session()->has("success")): ?>
    <div class="ui success message">
        <i class="checkmark box icon"></i><?php echo e(session()->get("success")); ?>

    </div>
<?php elseif(session()->has("warning")): ?>
    <div class="ui warning message">
        <i class="exclamation icon"></i><?php echo e(session()->get("warning")); ?>

    </div>
<?php elseif(session()->has("error")): ?>
    <div class="ui error message">
        <i class="exclamation triangle icon"></i><?php echo e(session()->get("error")); ?>

    </div>
<?php elseif(session()->has("info")): ?>
    <div class="ui info message">
        <i class="exclamation circle icon"></i><?php echo e(session()->get("info")); ?>

    </div>
<?php else: ?>
<?php endif; ?>