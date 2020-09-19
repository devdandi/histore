<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo e(translate('Banner Information')); ?></h3>
    </div>

    <!--Horizontal Form-->
    <!--===================================================-->
    <form class="form-horizontal" action="<?php echo e(route('home_banners.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="panel-body">
            <div class="form-group">
                <label class="col-sm-3" for="url"><?php echo e(translate('URL')); ?></label>
                <div class="col-sm-9">
                    <input type="text" placeholder="<?php echo e(translate('URL')); ?>" id="url" name="url" class="form-control" required>
                </div>
            </div>
            <input type="hidden" name="position" value="<?php echo e($position); ?>">
            
            <div class="form-group">
                <div class="col-sm-3">
                    <label class="control-label"><?php echo e(translate('Banner Images')); ?></label>
                    <strong>(<?php echo e(translate('850px*420px')); ?>)</strong>
                </div>
                <div class="col-sm-9">
                    <div id="photo">

                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer text-right">
            <button class="btn btn-purple" type="submit"><?php echo e(translate('Save')); ?></button>
        </div>
    </form>
    <!--===================================================-->
    <!--End Horizontal Form-->

</div>

<script type="text/javascript">

    $(document).ready(function(){

        $('.demo-select2').select2();

        $("#photo").spartanMultiImagePicker({
            fieldName:        'photo',
            maxCount:         1,
            rowHeight:        '200px',
            groupClassName:   'col-md-4 col-sm-9 col-xs-6',
            maxFileSize:      '',
            dropFileLabel : "Drop Here",
            onExtensionErr : function(index, file){
                console.log(index, file,  'extension err');
                alert('Please only input png or jpg type file')
            },
            onSizeErr : function(index, file){
                console.log(index, file,  'file size too big');
                alert('File size too big');
            }
        });
    });

</script>
<?php /**PATH /home/u9037400/public_html/hs/resources/views/banners/create.blade.php ENDPATH**/ ?>