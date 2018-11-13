<?php $__env->startSection('title','Meal(s) List'); ?>

<?php $__env->startSection('header','Cashier Dashboard'); ?>

<?php $__env->startSection('body'); ?>
    <?php echo $__env->make('shared.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('shared.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <table class="ui large table" id="myTable">
        <thead>
        <tr>
            <th colspan="7">
                <a href="<?php echo e(route('home')); ?>" class="ui large button">
                    <i class="caret left icon"></i>
                    Go Back - Home
                </a>
                <!--<a href="<?php echo e(route('meals.create')); ?>" class="ui large red button">
                    <i class="utensils icon"></i>
                    Add New Meal(s)
                </a>-->
            </th>
        </tr>
        <tr>
            <th>#</th>
            <th>Image:</th>
            <th>Dish Name:</th>
            <th>Price:</th>
            <th>Qty:</th>
            <th></th>
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
                    <td>Ksh.<?php echo e(number_format($meal->price)); ?>/=</td>
                    <td>Dish Rem. for: <b><?php echo e($meal->qty); ?></b> People</td>
                    <td>
                        <form id="form<?php echo e($meal->id); ?>" action="<?php echo e(route('meals.destroy',['id'=>$meal->id])); ?>" method="post">
                            <a href="#" onclick="openModal<?php echo e($meal->id); ?>()" id=""><i class="cart plus large icon"></i></a>
                            <a href="<?php echo e(route('meals.edit',['id'=>$meal->id])); ?>"><i class="edit large icon"></i></a>
                            <?php echo e(method_field('DELETE')); ?>

                            <?php echo e(csrf_field()); ?>

                            <a href="#" onclick="function submit() {
                                        document.getElementById('form<?php echo e($meal->id); ?>').submit();
                                    }
                                    submit()">
                                <i class="trash large icon"></i>
                            </a>
                        </form>
                        
                        <div class="ui modal example<?php echo e($meal->id); ?>">
                            <i class="close icon"></i>
                            <div class="header">
                                Meal Details
                            </div>
                            <div class="image content">
                                <div class="ui medium image">
                                    <img src="<?php echo e(asset('image/meals/'.$meal->image)); ?>" class="middle image">
                                </div>
                                <div class="description">
                                    <div class="ui header"><?php echo e($meal->name); ?></div>
                                    <p>Price: Ksh.<?php echo e(number_format($meal->price)); ?>/=</p>
                                    <p>Qty&nbsp;&nbsp;: Dish Rem. for: <b><?php echo e($meal->qty); ?></b> People</p>
                                    <form id="orderForm" action="<?php echo e(route('cart.store')); ?>" method="post" class="ui large form">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="meal_id" value="<?php echo e($meal->id); ?>">
                                        <input type="hidden" name="qty" value="<?php echo e($meal->qty); ?>">
                                        <input type="hidden" name="price" value="<?php echo e($meal->price); ?>">
                                        <div class="field required">
                                            <label for="qty">Qty Ordered</label>
                                            <div class="ui left input icon">
                                                <input required type="number" id="qty" name="qty" min="1" value="1" placeholder="Qty Ordered...">
                                                <i class="utensils icon"></i>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="actions">
                                <div class="ui black deny button">
                                    Cancel
                                </div>
                                <button type="submit" onclick="document.getElementById('orderForm').submit();" class="ui positive right labeled icon button">
                                    Add to Orders
                                    <i class="cart plus icon"></i>
                                </button>
                            </div>
                        </div>
                        
                        <script>
                            function openModal<?php echo e($meal->id); ?>() {
                                $('.ui.modal.example<?php echo e($meal->id); ?>')
                                    .modal('show')
                                ;
                            }
                        </script>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <tr>
                <td colspan="6" style="text-align: center;font-weight: bold">
                    <img src="<?php echo e(asset('image/dish.png')); ?>" alt="<?php echo e(config('app.name')); ?>" class="ui tiny centered image">
                    <div style="margin: 5px 5px 5px 5px">No meal(s) added yet!</div>
                </td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>

    
    <div class="ui fullscreen modal orders">
        <i class="close icon"></i>
        <div class="header">
            Customer Orders
        </div>
        <div class="content">
            <table class="ui table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Meal</th>
                    <th>Qty Ordered</th>
                    <th>Net Price</th>
                    <th>Gross Price</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($order->id); ?></td>
                        <td>
                            <img src="<?php echo e(asset('image/meals/'.$order->meal->image)); ?>" alt="<?php echo e($order->meal->image); ?>" class="ui avatar image"> 
                        </td>
                        <td><?php echo e($order->meal->name); ?></td>
                        <td><?php echo e($order->qty); ?></td>
                        <td><?php echo e($order->net_price); ?></td>
                        <td><?php echo e($order->gross_price); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <tfoot>
                <tr>
                    <th colspan="5" style="text-align: right;font-weight:bold;">Grand Total:</th>
                    <th style="font-weight:bold;">Ksh. <?php echo e(number_format($orders->sum('gross_price'))); ?>.00 KES</th>
                </tr>
                </tfoot>
            </table>
            <form class="ui big form" method="post" id="paymentForm" action="<?php echo e(route('payment.store')); ?>">
                <?php echo csrf_field(); ?>
                <input type="number" hidden id="grand_total" value="<?php echo e($orders->sum('gross_price')); ?>">
                <input type="number" hidden name="user_id" value="<?php echo e(Auth::user()->id); ?>">
                <div class="field required">
                    <label for="cash">Cash</label>
                    <input type="number" id="cash" name="payment" placeholder="Enter Cash Here...">
                </div>
                <div class="field">
                    <label for="change">Change</label>
                    <input type="text" id="change" name="change" readonly>
                </div>
            </form>
        </div>
        <div class="actions">
            <div class="ui black deny button">
                Cancel
            </div>
            <button type="submit" onclick="const cash=document.getElementById('cash').value; if (cash === null || cash === ''){alert('Cash Field Required'); e.preventDefault();}else{document.getElementById('paymentForm').submit();}" class="ui positive right labeled icon button">
                Checkout & Print
                <i class="checkmark icon"></i>
            </button>
        </div>
    </div>
    <script>
        $(document).ready( function () {
            $("#cash").on('keyup',function () {
                $("#change").val($(this).val() - $("#grand_total").val());
            });
        });
        function openModalOrders() {
            $('.fullscreen.modal.orders')
                .modal('show')
            ;
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>