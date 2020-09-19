

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-sm-12">
            <a href="<?php echo e(route('sellers.create')); ?>" class="btn btn-rounded btn-info pull-right"><?php echo e(translate('Add New Seller')); ?></a>
        </div>
    </div>

    <br>

    <!-- Basic Data Tables -->
    <!--===================================================-->
    <div class="panel">
        <div class="panel-heading bord-btm clearfix pad-all h-100">
            <h3 class="panel-title pull-left pad-no"><?php echo e(translate('Sellers')); ?></h3>
            <div class="pull-right clearfix">
                <form class="" id="sort_sellers" action="" method="GET">
                    <div class="box-inline pad-rgt pull-left">
                        <div class="select" style="min-width: 300px;">
                            <select class="form-control demo-select2" name="approved_status" id="approved_status" onchange="sort_sellers()">
                                <option value=""><?php echo e(translate('Filter by Approval')); ?></option>
                                <option value="1"  <?php if(isset($approved)): ?> <?php if($approved == 'paid'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(translate('Approved')); ?></option>
                                <option value="0"  <?php if(isset($approved)): ?> <?php if($approved == 'unpaid'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(translate('Non-Approved')); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="box-inline pad-rgt pull-left">
                        <div class="" style="min-width: 200px;">
                            <input type="text" class="form-control" id="search" name="search"<?php if(isset($sort_search)): ?> value="<?php echo e($sort_search); ?>" <?php endif; ?> placeholder="<?php echo e(translate('Type name or email & Enter')); ?>">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-striped res-table mar-no" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo e(translate('Name')); ?></th>
                    <th><?php echo e(translate('Phone')); ?></th>
                    <th><?php echo e(translate('Email Address')); ?></th>
                    <th><?php echo e(translate('Verification Info')); ?></th>
                    <th><?php echo e(translate('Approval')); ?></th>
                    <th><?php echo e(translate('Num. of Products')); ?></th>
                    <th><?php echo e(translate('Due to seller')); ?></th>
                    <th width="10%"><?php echo e(translate('Options')); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $sellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($seller->user != null): ?>
                        <tr>
                            <td><?php echo e(($key+1) + ($sellers->currentPage() - 1)*$sellers->perPage()); ?></td>
                            <td><?php echo e($seller->user->name); ?></td>
                            <td><?php echo e($seller->user->phone); ?></td>
                            <td><?php echo e($seller->user->email); ?></td>
                            <td>
                                <?php if($seller->verification_info != null): ?>
                                    <a href="<?php echo e(route('sellers.show_verification_request', $seller->id)); ?>">
                                        <div class="label label-table label-info">
                                            <?php echo e(translate('Show')); ?>

                                        </div>
                                    </a>
                                <?php endif; ?>
                            </td>
                            <td>
                                <label class="switch">
                                    <input onchange="update_approved(this)" value="<?php echo e($seller->id); ?>" type="checkbox" <?php if($seller->verification_status == 1) echo "checked";?> >
                                    <span class="slider round"></span>
                                </label>
                            </td>
                            <td><?php echo e(\App\Product::where('user_id', $seller->user->id)->count()); ?></td>
                            <td>
                                <?php if($seller->admin_to_pay >= 0): ?>
                                    <?php echo e(single_price($seller->admin_to_pay)); ?>

                                <?php else: ?>
                                    <?php echo e(single_price(abs($seller->admin_to_pay))); ?> (Due to Admin)
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="btn-group dropdown">
                                    <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button">
                                        <?php echo e(translate('Actions')); ?> <i class="dropdown-caret"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a onclick="show_seller_profile('<?php echo e($seller->id); ?>');"><?php echo e(translate('Profile')); ?></a></li>
                                        <li><a href="<?php echo e(route('sellers.login', encrypt($seller->id))); ?>"><?php echo e(translate('Log in as this Seller')); ?></a></li>
                                        <li><a onclick="show_seller_payment_modal('<?php echo e($seller->id); ?>');"><?php echo e(translate('Pay Now')); ?></a></li>
                                        <li><a href="<?php echo e(route('sellers.payment_history', encrypt($seller->id))); ?>"><?php echo e(translate('Payment History')); ?></a></li>
                                        <li><a href="<?php echo e(route('sellers.edit', encrypt($seller->id))); ?>"><?php echo e(translate('Edit')); ?></a></li>
                                        <li><a onclick="confirm_modal('<?php echo e(route('sellers.destroy', $seller->id)); ?>');"><?php echo e(translate('Delete')); ?></a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div class="clearfix">
                <div class="pull-right">
                    <?php echo e($sellers->appends(request()->input())->links()); ?>

                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="payment_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="modal-content">

            </div>
        </div>
    </div>

    <div class="modal fade" id="profile_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="modal-content">

            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        function show_seller_payment_modal(id){
            $.post('<?php echo e(route('sellers.payment_modal')); ?>',{_token:'<?php echo e(@csrf_token()); ?>', id:id}, function(data){
                $('#payment_modal #modal-content').html(data);
                $('#payment_modal').modal('show', {backdrop: 'static'});
                $('.demo-select2-placeholder').select2();
            });
        }

        function show_seller_profile(id){
            $.post('<?php echo e(route('sellers.profile_modal')); ?>',{_token:'<?php echo e(@csrf_token()); ?>', id:id}, function(data){
                $('#profile_modal #modal-content').html(data);
                $('#profile_modal').modal('show', {backdrop: 'static'});
            });
        }

        function update_approved(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('<?php echo e(route('sellers.approved')); ?>', {_token:'<?php echo e(csrf_token()); ?>', id:el.value, status:status}, function(data){
                if(data == 1){
                    showAlert('success', 'Approved sellers updated successfully');
                }
                else{
                    showAlert('danger', 'Something went wrong');
                }
            });
        }

        function sort_sellers(el){
            $('#sort_sellers').submit();
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u9037400/public_html/hs/resources/views/sellers/index.blade.php ENDPATH**/ ?>