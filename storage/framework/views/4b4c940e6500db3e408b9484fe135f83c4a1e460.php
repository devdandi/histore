

<?php $__env->startSection('content'); ?>

    <section class="gry-bg py-4 profile">
        <div class="container">
            <div class="row cols-xs-space cols-sm-space cols-md-space">
                <div class="col-lg-12 mx-auto">
                    <div class="main-content">
                        <!-- Page title -->
                        <div class="page-title">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h2 class="heading heading-6 text-capitalize strong-600 mb-0">
                                        <?php echo e(translate('Track Resi')); ?>

                                    </h2>
                                </div>
                            </div>
                        </div>
                        <form class="" action="<?php echo e(route('resi.track')); ?>" method="GET" enctype="multipart/form-data">
                            <div class="form-box mt-4">
                                <div id="cekresicom_id"></div>
									<script type="text/javascript" src="https://cekresi.com/widget/widgetcekresicom_v1.js"></script>
									<script type="text/javascript">
									init_widget_cekresicom('w2',370,100)
									</script>
							</div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u9037400/public_html/hs/resources/views/frontend/track_resi.blade.php ENDPATH**/ ?>