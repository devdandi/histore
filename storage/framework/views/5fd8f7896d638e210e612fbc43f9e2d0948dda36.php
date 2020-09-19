

<?php $__env->startSection('content'); ?>

    <section class="gry-bg py-4 profile">
        <div class="container">
            <div class="row cols-xs-space cols-sm-space cols-md-space">
                <div class="col-lg-3 d-none d-lg-block">
                    <?php echo $__env->make('frontend.inc.seller_side_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>

                <div class="col-lg-9">
                    <div class="main-content">
                        <!-- Page title -->
                        <div class="page-title">
                            <div class="row align-items-center">
                                <div class="col-md-6 col-12 d-flex align-items-center">
                                    <h2 class="heading heading-6 text-capitalize strong-600 mb-0">
                                        <?php echo e(translate('Money Withdraw')); ?>

                                    </h2>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="float-md-right">
                                        <ul class="breadcrumb">
                                            <li><a href="<?php echo e(route('home')); ?>"><?php echo e(translate('Home')); ?></a></li>
                                            <li><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(translate('Dashboard')); ?></a></li>
                                            <li class="active"><a href="<?php echo e(route('withdraw_requests.index')); ?>"><?php echo e(translate('Money Withdraw')); ?></a></li>
                                        </ul>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 offset-md-2">
                                <div class="dashboard-widget text-center green-widget text-white mt-4 c-pointer">
                                    <i class="fa fa-dollar"></i>
                                    <span class="d-block title heading-3 strong-400"><?php echo e(single_price(Auth::user()->seller->admin_to_pay)); ?></span>
                                    <span class="d-block sub-title"><?php echo e(translate('Pending Balance')); ?></span>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="dashboard-widget text-center plus-widget mt-4 c-pointer" onclick="show_request_modal()">
                                    <i class="la la-plus"></i>
                                    <span class="d-block title heading-6 strong-400 c-base-1"><?php echo e(translate('Send Withdraw Request')); ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="card no-border mt-5">
                            <div class="card-header py-3">
                                <h4 class="mb-0 h6"><?php echo e(translate('Withdraw Request history')); ?></h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-sm table-responsive-md mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th><?php echo e(translate('Date')); ?></th>
                                            <th><?php echo e(translate('Amount')); ?></th>
                                            <th><?php echo e(translate('Status')); ?></th>
                                            <th><?php echo e(translate('Message')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(count($seller_withdraw_requests) > 0): ?>
                                            <?php $__currentLoopData = $seller_withdraw_requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $seller_withdraw_request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($key+1); ?></td>
                                                    <td><?php echo e(date('d-m-Y', strtotime($seller_withdraw_request->created_at))); ?></td>
                                                    <td><?php echo e(single_price($seller_withdraw_request->amount)); ?></td>
                                                    <td>
                                                        <?php if($seller_withdraw_request->status == 1): ?>
                                                            <span class="ml-2" style="color:green"><strong><?php echo e(translate('SENT')); ?></strong></span>
                                                        <?php else: ?>
                                                            <span class="ml-2" style="color:red"><strong><?php echo e(translate('PENDING')); ?></strong></span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo e($seller_withdraw_request->message); ?>

                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <tr>
                                                <td class="text-center pt-5 h4" colspan="100%">
                                                    <i class="la la-meh-o d-block heading-1 alpha-5"></i>
                                                <span class="d-block"><?php echo e(translate('No history found.')); ?></span>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="pagination-wrapper py-4">
                            <ul class="pagination justify-content-end">
                                <?php echo e($seller_withdraw_requests->links()); ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="request_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size" role="document">
            <div class="modal-content position-relative">
                <div class="modal-header">
                    <h5 class="modal-title strong-600 heading-5"><?php echo e(translate('Send A Withdraw Request')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php if(Auth::user()->seller->admin_to_pay > 5): ?>
                    <form class="" action="<?php echo e(route('withdraw_requests.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="modal-body gry-bg px-3 pt-3">
                            <div class="row">
                                <div class="col-md-3">
                                    <label><?php echo e(translate('Amount')); ?> <span class="required-star">*</span></label>
                                </div>
                                <div class="col-md-9">
                                    <input type="number" class="form-control mb-3" name="amount" min="1" max="<?php echo e(Auth::user()->seller->admin_to_pay); ?>" placeholder="<?php echo e(translate('Amount')); ?>" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label><?php echo e(translate('Message')); ?></label>
                                </div>
                                <div class="col-md-9">
                                    <textarea name="message" rows="8" class="form-control mb-3"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-base-1"><?php echo e(translate('Send')); ?></button>
                        </div>
                    </form>
                <?php else: ?>
                    <div class="modal-body gry-bg px-3 pt-3">
                        <div class="p-5 heading-3">
                            <?php echo e(translate('You do not have enough balance to send withdraw request')); ?>

                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        function show_request_modal(){
            $('#request_modal').modal('show');
        }

        function show_message_modal(id){
            $.post('<?php echo e(route('withdraw_request.message_modal')); ?>',{_token:'<?php echo e(@csrf_token()); ?>', id:id}, function(data){
                $('#message_modal .modal-content').html(data);
                $('#message_modal').modal('show', {backdrop: 'static'});
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u9037400/public_html/hs/resources/views/frontend/seller/seller_withdraw_requests/index.blade.php ENDPATH**/ ?>