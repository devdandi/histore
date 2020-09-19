

<?php $__env->startSection('content'); ?>

    <div class="bord-btm mar-btm">
        <div class="row ">
            <div class="col-sm-6">
                <ul class="nav nav-tabs addon-tab ">
                    <li class="active"><a data-toggle="tab" href="#installed"><?php echo e(translate('Installed Addon')); ?></a></li>
                    <li><a data-toggle="tab" href="#available"><?php echo e(translate('Available Addon')); ?></a></li>
                </ul>
            </div>
            <div class="col-sm-6 text-right">
                <a href="<?php echo e(route('addons.create')); ?>" class="btn btn-rounded btn-info"><?php echo e(translate('Install New Addon')); ?></a>
            </div>
        </div>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade active in" id="installed">
            <div class="row">
                <?php $__empty_1 = true; $__currentLoopData = \App\Addon::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $addon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="panel addon-panel">
                            <div class="panel-header">
                                <img class="img-responsive" src="<?php echo e(my_asset($addon->image)); ?>" alt="Image">
                                <div class="overlay" data-toggle="modal" data-target="#myModal-<?php echo e($key); ?>">
                                    <i class="fa fa-info"></i>
                                </div>
                                <div class="modal fade" tabindex="-1" role="dialog" id="myModal-<?php echo e($key); ?>">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bord-btm">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title"><?php echo e(ucfirst($addon->name)); ?></h4>
                                            </div>
                                            <div class="modal-body blog">
                                                <div class="panel clearfix pad-no mar-no">
                                                    <div class="blog-header">
                                                        <img class="img-responsive" src="<?php echo e(my_asset($addon->image)); ?>" alt="Image">
                                                    </div>
                                                    <div class="blog-content text-center">
                                                        <div class="pad-lft">
                                                            <div class="blog-title">
                                                                <h3><?php echo e(ucfirst($addon->name)); ?></h3>
                                                            </div>
                                                            <div class="blog-body">
                                                                <p><small><?php echo e(translate('Version')); ?>: </small><?php echo e($addon->version); ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body pad-no">
                                <label class="activated-switch">
                                    <input type="checkbox" onchange="updateStatus(this, <?php echo e($addon->id); ?>)" <?php if($addon->activated) echo "checked";?>>
                                    <span class="bg-success active"><?php echo e(translate('Activated')); ?></span>
                                    <span class="bg-gray-dark deactive"><?php echo e(translate('Deactivated')); ?></span>
                                </label>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-lg-4 col-md-6 col-lg-offset-4">
                        <div class="panel addon-panel">
                            <div class="panel-header">
                                <img class="img-responsive" src="<?php echo e(my_asset('img/nothing-found.jpg')); ?>" alt="Image">
                            </div>
                            <div class="panel-body text-center">
                                <div class="media-block mar-btm">
                                    <h2 class="h3"><?php echo e(translate('No Addon Installed')); ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="tab-pane fade" id="available">
            <div class="row" id="available-addons-content">

            </div>
        </div>
    </div>




<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        function updateStatus(el, id){
            if($(el).is(':checked')){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('<?php echo e(route('addons.activation')); ?>', {_token:'<?php echo e(csrf_token()); ?>', id:id, status:status}, function(data){
                if(data == 1){
                    showAlert('success', 'Status updated successfully');
                }
                else{
                    showAlert('danger', 'Something went wrong');
                }
            });
        }

        $(document).ready(function(){
            $.post('https://activeitzone.com/addons/public/addons', {item: 'ecommerce'}, function(data){
                //console.log(data);
                html = '';
                data.forEach((item, i) => {
                    if(item.link != null){
                        html += `<div class="col-lg-4 col-md-6 ">
                                    <div class="panel addon-panel">
                                        <div class="panel-header">
                                            <a href="${item.link}" target="_blank"><img class="img-responsive" src="${item.image}" alt="Image"></a>
                                        </div>
                                        <div class="panel-body">
                                            <div class="media-block mar-btm"><a class="h4 mar-top d-flex" href="${item.link}" target="_blank">${item.name}</a>
                                                <div class="rating rating-lg mar-btm"><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i></div>
                                                <p class="mar-no text-truncate-3">${item.short_description}</p>
                                            </div>
                                            <div class="blog-footer pad-top">
                                                <div class="media-left text-success text-2x">$${item.price}</div>
                                                <div class="media-body text-right"><a href="${item.link}" target="_blank" class="btn btn-outline btn-default">Preview</a><a href="${item.purchase}" target="_blank" class="btn btn-outline btn-primary">Purchase</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
                    }
                    else {
                        html += `<div class="col-lg-4 col-md-6 ">
                                    <div class="panel addon-panel">
                                        <div class="panel-header">
                                            <a><img class="img-responsive" src="${item.image}" alt="Image"></a>
                                        </div>
                                        <div class="panel-body">
                                            <div class="media-block mar-btm"><a class="h4 mar-top d-flex" >${item.name}</a>
                                                <div class="rating rating-lg mar-btm"><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i></div>
                                                <p class="mar-no text-truncate-3">${item.short_description}</p>
                                            </div>
                                            <div class="blog-footer pad-top ">
                                                <div class="media-body text-center"><div class="btn btn-outline btn-primary">Coming Soon</div></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
                    }

                });
                $('#available-addons-content').html(html);
            });
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u9037400/public_html/hs/resources/views/addons/index.blade.php ENDPATH**/ ?>