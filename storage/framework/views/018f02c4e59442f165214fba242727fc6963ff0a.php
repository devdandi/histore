<?php $__env->startSection('content'); ?>
<?php
$data = array();
?>
    <div id="page-content">
        <section class="slice-xs sct-color-2 border-bottom">
            <div class="container container-sm">
                <div class="row cols-delimited justify-content-center">
                    <div class="col">
                        <div class="icon-block icon-block--style-1-v5 text-center ">
                            <div class="block-icon c-gray-light mb-0">
                                <i class="la la-shopping-cart"></i>
                            </div>
                            <div class="block-content d-none d-md-block">
                                <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize"><?php echo e(translate('1. My Cart')); ?></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="icon-block icon-block--style-1-v5 text-center active">
                            <div class="block-icon mb-0">
                                <i class="la la-map-o"></i>
                            </div>
                            <div class="block-content d-none d-md-block">
                                <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize"><?php echo e(translate('2. Shipping info')); ?></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="icon-block icon-block--style-1-v5 text-center">
                            <div class="block-icon mb-0 c-gray-light">
                                <i class="la la-truck"></i>
                            </div>
                            <div class="block-content d-none d-md-block">
                                <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize"><?php echo e(translate('3. Delivery info')); ?></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="icon-block icon-block--style-1-v5 text-center">
                            <div class="block-icon c-gray-light mb-0">
                                <i class="la la-credit-card"></i>
                            </div>
                            <div class="block-content d-none d-md-block">
                                <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize"><?php echo e(translate('4. Payment')); ?></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="icon-block icon-block--style-1-v5 text-center">
                            <div class="block-icon c-gray-light mb-0">
                                <i class="la la-check-circle"></i>
                            </div>
                            <div class="block-content d-none d-md-block">
                                <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize"><?php echo e(translate('5. Confirmation')); ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-4 gry-bg">
            <div class="container">
                <div class="row cols-xs-space cols-sm-space cols-md-space">
                    <div class="col-lg-8">
                        <form class="form-default" data-toggle="validator" action="<?php echo e(route('checkout.store_shipping_infostore')); ?>" role="form" method="POST">
                            <?php echo csrf_field(); ?>
                                <?php if(Auth::check()): ?>
                                    <div class="row gutters-5">
                                        <?php $__currentLoopData = Auth::user()->addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-6">
                                                <label  class="aiz-megabox d-block bg-white">
                                                    <input type="radio" name="address_id" value="<?php echo e($address->id); ?>" <?php if($address->set_default): ?>
                                                        checked
                                                    <?php endif; ?> required>
                                                    <span class="d-flex p-3 aiz-megabox-elem">
                                                        <span class="aiz-rounded-check flex-shrink-0 mt-1"></span>
                                                        <span class="flex-grow-1 pl-3">
                                                        <div>
                                                            <span class="alpha-6"><?php echo e(translate('Name ')); ?>:</span>
                                                                <span class="strong-600 ml-2"><?php echo e($address->name); ?></span>
                                                            </div>
                                                            <div>
                                                                <span class="alpha-6"><?php echo e(translate('Address')); ?>:</span>
                                                                <span class="strong-600 ml-2"><?php echo e($address->address); ?></span>
                                                            </div>
                                                            <div>
                                                                <span class="alpha-6"><?php echo e(translate('Country')); ?>:</span>
                                                                <span class="strong-600 ml-2"><?php echo e($address->country); ?></span>
                                                            </div>
                                                            <div>
                                                            <?php $provinces = explode('|', $address->province); ?>

                                                                <span class="alpha-6"><?php echo e(translate('Province')); ?>:</span>
                                                                <span class="strong-600 ml-2"><?php echo e($provinces[1]); ?></span>
                                                            </div>

                                                            <div>
                                                            <?php $city = explode('|', $address->city); ?>
                                                                <span class="alpha-6"><?php echo e(translate('City')); ?>:</span>
                                                                <span class="strong-600 ml-2"><?php echo e($city[1]); ?> <?php echo e($city[0]); ?></span>
                                                            </div>
                                                            <div>
                                                                <span class="alpha-6"><?php echo e(translate('District')); ?>:</span>
                                                                <span class="strong-600 ml-2"><?php echo e($address->district); ?></span>
                                                            </div>
                                                            <div>
                                                                <span class="alpha-6"><?php echo e(translate('Postal Code')); ?>:</span>
                                                                <span class="strong-600 ml-2"><?php echo e($address->postal_code); ?></span>
                                                            </div>
                                                            <div>
                                                                <span class="alpha-6"><?php echo e(translate('Phone')); ?>:</span>
                                                                <span class="strong-600 ml-2"><?php echo e($address->phone); ?></span>
                                                            </div>
                                                        </span>
                                                        
                                                    </span>
                                                </label>
                                                

                                            
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        
                                        <input type="hidden" name="checkout_type" value="logged">
                                        <div class="col-md-6 mx-auto" onclick="add_new_address()">
                                            <div class="border p-3 rounded mb-3 c-pointer text-center bg-white">
                                                <i class="la la-plus la-2x"></i>
                                                <div class="alpha-7"><?php echo e(translate('Add New Address')); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label"><?php echo e(translate('Name')); ?></label>
                                                    <input type="text" class="form-control" name="name" placeholder="<?php echo e(translate('Name')); ?>" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label"><?php echo e(translate('Email')); ?></label>
                                                    <input type="text" class="form-control" name="email" placeholder="<?php echo e(translate('Email')); ?>" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label"><?php echo e(translate('Address')); ?></label>
                                                    <input type="text" class="form-control" name="address" placeholder="<?php echo e(translate('Address')); ?>" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label"><?php echo e(translate('Select your country')); ?></label>
                                                    <select class="form-control custome-control" data-live-search="true" name="country">
                                                        <?php $__currentLoopData = \App\Country::where('status', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($country->name); ?>"><?php echo e($country->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label"><?php echo e(translate('City')); ?></label>
                                                    <input type="text" class="form-control" placeholder="<?php echo e(translate('City')); ?>" name="city" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label"><?php echo e(translate('Postal code')); ?></label>
                                                    <input type="text" class="form-control" placeholder="<?php echo e(translate('Postal code')); ?>" name="postal_code" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label"><?php echo e(translate('Phone')); ?></label>
                                                    <input type="number" min="0" class="form-control" placeholder="<?php echo e(translate('Phone')); ?>" name="phone" required>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="checkout_type" value="guest">
                                    </div>
                                    </div>
                                <?php endif; ?>
                            <div class="row align-items-center pt-4">
                                <div class="col-md-6">
                                    <a href="<?php echo e(route('home')); ?>" class="link link--style-3">
                                        <i class="ion-android-arrow-back"></i>
                                        <?php echo e(translate('Return to shop')); ?>

                                    </a>
                                </div>
                                <div class="col-md-6 text-right">
                                    <button type="submit" class="btn btn-styled btn-base-1"><?php echo e(translate('Continue to Delivery Info')); ?></a>
                                    
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-lg-4 ml-lg-auto">
                        <?php echo $__env->make('frontend.partials.cart_summary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="modal fade" id="new-address-modal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-zoom" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel"><?php echo e(translate('New Address')); ?></h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-default" role="form" action="<?php echo e(route('addresses.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="p-3">
                        <div class="row">
                            <div class="col-md-2">
                                <label><?php echo e(translate('Recipient name')); ?></label>
                            </div>
                            <div class="col-md-10">
                                <input class="form-control textarea-autogrow mb-3" placeholder="<?php echo e(translate('Recipient name')); ?>" rows="1" name="name" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <label><?php echo e(translate('Address')); ?></label>
                            </div>
                            <div class="col-md-10">
                                <textarea class="form-control textarea-autogrow mb-3" placeholder="<?php echo e(translate('Your Address')); ?>" rows="1" name="address" required></textarea>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-md-2">
                                <label><?php echo e(translate('Country')); ?></label>
                            </div>
                            <div class="col-md-10">
                                <div class="mb-3">
                                    <select class="form-control mb-3 selectpicker" data-placeholder="<?php echo e(translate('Select your country')); ?>" name="country" required>
                                        <?php $__currentLoopData = \App\Country::where('status', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($country->name); ?>"><?php echo e($country->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <label><?php echo e(translate('Province')); ?></label>
                            </div>
                            <div class="col-md-10">
                                <div class="mb-3">
                                    <select class="form-control mb-3 selectpicker" data-placeholder="<?php echo e(translate('Select your province')); ?>" name="province" required>
                                        <?php $__currentLoopData = DB::table('province_ruangapi')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $province): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value=""><?php echo e(translate('Select your province')); ?></option>
                                            <option value="<?php echo e($province->province_id); ?>|<?php echo e($province->name); ?>"><?php echo e($province->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-2">
                                <label><?php echo e(translate('City')); ?></label>
                            </div>
                            <div class="col-md-10">
                            <div class="mb-3">
                                    <select class="form-control mb-3 selectpicker" data-placeholder="<?php echo e(translate('Select your city')); ?>" name="city" id="city" required>
                                        
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <label><?php echo e(translate('District')); ?></label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control textarea-autogrow mb-3" placeholder="<?php echo e(translate('Your District')); ?>" name="district" required>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-2">
                                <label><?php echo e(translate('Postal Code')); ?></label>
                            </div>
                            <div class="col-md-10">
                            <div class="mb-3">
                                <input type="number" min="0" class="form-control mb-3" placeholder="<?php echo e(translate('Postal code')); ?>" name="postal_code" required>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <label><?php echo e(translate('Phone')); ?></label>
                            </div>
                            <div class="col-md-10">
                                <input type="number" min="0" class="form-control mb-3" placeholder="<?php echo e(translate('+880')); ?>" name="phone" value="" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-base-1"><?php echo e(translate('Save')); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript">

    function add_new_address(){
        $('#new-address-modal').modal('show');
    }
    $(document).ready( () => {
        
        $("select[name='country']").on('change', () => {
            $.ajax({
                url: "<?php echo e(route('selecting')); ?>",
                type: "POST",
                data: {
                    _token: "<?php echo e(csrf_token()); ?>",
                    type: "country",
                    data: $("select[name='country']").val(),
                },
                success: function(data)
                {
                    console.log(data)
                }
            })
        })
        $("select[name='province']").on('change', () => {
            
            $.ajax({
                url: "<?php echo e(route('selecting')); ?>",
                type: "POST",
                data: {
                    _token: "<?php echo e(csrf_token()); ?>",
                    type: "province",
                    data: $("select[name='province']").val(),
                },
                success: function(data)
                {
                    $.each(data.data, (i, item) => {
                        $("select[name='city']").append(
                            `<option value="`+item.city_name +'|'+ item.type +`">`+ item.type + ' ' + item.city_name+`</option>`
                        )
                    })
                },
                beforeSend: function()
                {
                    $('#city').html('')

                }
            })
        })
    })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\updatehs\resources\views/frontend/shipping_info.blade.php ENDPATH**/ ?>