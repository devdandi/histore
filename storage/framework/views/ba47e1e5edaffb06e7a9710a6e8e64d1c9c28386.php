

<?php $__env->startSection('content'); ?>

<div class="panel">
    <div class="panel-heading bord-btm clearfix pad-all h-100">
        <h3 class="panel-title pull-left pad-no"><?php echo e(__('Offline Wallet Recharge Requests')); ?></h3>
    </div>
    <div class="panel-body">
        <table class="table table-striped res-table mar-no" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>#</th>
					<th><?php echo e(__('Transaction ID')); ?></th>
                    <th><?php echo e(__('Name')); ?></th>
                    <th><?php echo e(__('Amount')); ?></th>
                    <th><?php echo e(__('Bank')); ?></th>                    
					<th><?php echo e(__('Transaction Code')); ?></th>
					<th><?php echo e(__('Total Transfer')); ?></th>
                    <th><?php echo e(__('Photo')); ?></th>
                    <th><?php echo e(__('Approval')); ?></th>
                    <th><?php echo e(__('Date')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $wallets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $wallet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e(($key+1)); ?></td>
						<td><?php echo e($wallet->payment_details); ?></td>
                        <td><?php echo e($wallet->user->name); ?></td>
						<td><?php echo e($wallet->amount); ?></td>
						<td><?php echo e($wallet->payment_method); ?></td>
						<td><?php echo e($wallet->transaction_code); ?></td>
						<td><?php echo e($wallet->total_transfer); ?></td>                    
                        <td>
                            <?php if($wallet->reciept != null): ?>
                                <a href="<?php echo e(my_asset($wallet->reciept)); ?>" target="_blank"><?php echo e(__('Open Reciept')); ?></a>
                            <?php endif; ?>
                        </td>
                        <td>
                            <label class="switch">
                                <input onchange="update_approved(this)" value="<?php echo e($wallet->id); ?>" type="checkbox" <?php if($wallet->approval == 1): ?> checked <?php endif; ?> >
                                <span class="slider round"></span>
                            </label>
                        </td>
                        <td><?php echo e($wallet->created_at); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
            <?php echo e($wallets->links()); ?>

        </table>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        function update_approved(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('<?php echo e(route('offline_recharge_request.approved')); ?>', {_token:'<?php echo e(csrf_token()); ?>', id:el.value, status:status}, function(data){
                if(data == 1){
                    showAlert('success', 'Money has been added successfully');
                }
                else{
                    showAlert('danger', 'Something went wrong');
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u9037400/public_html/hs/resources/views/manual_payment_methods/wallet_request.blade.php ENDPATH**/ ?>