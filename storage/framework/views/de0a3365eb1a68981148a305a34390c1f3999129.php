

<?php $__env->startSection('content'); ?>
<?php $req = \Request::server('HTTP_USER_AGENT');
 ?>
<div class="container">
    <style>
        .drawingBuffer {
  position: absolute;
  top: 0;
  left: 0;
}
    </style>
<div class="card">
    <div class="card-body">
        <h2><?php echo e(translate('Transaction No #').$orderid); ?></h2>
    <table class="table">
  <caption>
  <div class="float-right">
    <h5>Tax: <?php echo e(single_price($tax)); ?></h5>
    <h5>Shipping: <?php echo e(single_price($shipping)); ?></h5>
    <h5>Subtotal: <?php echo e(single_price($subtotal+$shipping)); ?></h5>

  </div>
  <br>
    
  </caption>
  <thead>
    <?php if($orderDetail->first()->delivery_status == "pending" && $orderDetail->first()->receipt == null): ?>
    <div class="alert alert-warning" role="alert">
        <?php echo e(translate('You have to change the status on the details order for update the receipt !')); ?>

    </div>
    <?php elseif($orderDetail->first()->delivery_status == "on_delivery" && $orderDetail->first()->receipt == null): ?>
    <div class="alert alert-warning" role="alert">
        <?php echo e(translate('You have to put the receipt when your status is on delivery !')); ?>

    </div>
    <?php elseif($orderDetail->first()->delivery_status == "delivered" && $orderDetail->first()->receipt != null): ?>
    <div class="alert alert-success" role="alert">
        <?php echo e(translate('You have been put the receipt for this transaction !')); ?>

    </div>
    <?php endif; ?>
    

    <tr>
      <th scope="col">#</th>
      <th scope="col"><?php echo e(translate('Products')); ?></th>
      <th scope="col"><?php echo e(translate('Variation')); ?></th>
      <th scope="col"><?php echo e(translate('Price')); ?></th>
      <th scope="col"><?php echo e(translate('Quantity')); ?></th>
      <th scope="col"><?php echo e(translate('Date')); ?></th>

    </tr>
  </thead>
  <tbody>
        <?php for($i = 0; $i < count($orderDetail); $i++): ?>
        <?php $data = $product->where('id', $orderDetail[$i]->product_id)->first(); ?>
            <tr>
                <td><?php echo e($i+1); ?></td>
                <td><?php echo e($data->name); ?></td>
                <td><?php echo e($orderDetail[$i]->variation); ?></td>
                <td><?php echo e(single_price($orderDetail[$i]->price)); ?></td>
                <td><?php echo e($orderDetail[$i]->quantity); ?></td>
                <td><?php echo e($orderDetail[$i]->created_at); ?></td>
            </tr>
        <?php endfor; ?>
  </tbody>
    </table>
    <!-- Button trigger modal -->
    <button  <?php if($orderDetail->first()->receipt == null && $orderDetail->first()->delivery_status != 'on_delivery') { echo 'disabled'; } ?> type="button" onclick="run('qrcode')" class="btn bg-orange" data-toggle="modal" data-target="#exampleModal">
      <?php echo e(translate('Scan QR Code')); ?>

    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Receipt QR Code</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <video id="preview"></video>
              <input type="text" id="qr">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

        <!-- Button trigger modal -->
    <button <?php if($orderDetail->first()->receipt == null && $orderDetail->first()->delivery_status != 'on_delivery') { echo 'disabled'; } ?> type="button" class="btn bg-orange" onclick="run('barcode')" data-toggle="modal" data-target="#exampleModal2">
      <?php echo e(translate('Scan Barcode')); ?>

    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel2">Receipt Scan Barcode</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <!--<div class="col-md-12" id="stream"></div>-->
          <div id="interactive" class="viewport">
              <canvas class="drawingBuffer"></canvas>
          </div>
            <!-- <input type="file" accept="image/*" capture="camera" id="camera" name="camera" class="form-control"> -->
            <select class="form-control" name="selects" id="selects">
            </select>

          </div>
          <div class="modal-footer">
            <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

        <!-- Button trigger modal -->
    <button <?php if($orderDetail->first()->receipt == null && $orderDetail->first()->delivery_status != 'on_delivery') { echo 'disabled'; } ?> type="button" class="btn bg-orange" onclick="run('manual')" data-toggle="modal" data-target="#exampleModal1">
      <?php echo e(translate('Input Manual')); ?>

    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Receipt Manual</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <label for="Receipt">Receipt</label>
          <small id="text-receipt" hidden></small>
            <input type="text" name="receipt" required id="receipt" class="form-control">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" id="save" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>


    </div>
    
</div>

</div>
<script src="<?php echo e(my_asset(mix('dist/js/app.js'))); ?>"></script>
<script>

function run(type)
{
  if(type == 'qrcode'){
    let opts = {
  // Whether to scan continuously for QR codes. If false, use scanner.scan() to manually scan.
  // If true, the scanner emits the "scan" event when a QR code is scanned. Default true.
  continuous: true,
  
  // The HTML element to use for the camera's video preview. Must be a <video> element.
  // When the camera is active, this element will have the "active" CSS class, otherwise,
  // it will have the "inactive" class. By default, an invisible element will be created to
  // host the video.
  video: document.getElementById('preview'),
  
  // Whether to horizontally mirror the video preview. This is helpful when trying to
  // scan a QR code with a user-facing camera. Default true.
  mirror: false,
  
  // Whether to include the scanned image data as part of the scan result. See the "scan" event
  // for image format details. Default false.
  captureImage: false,
  
  // Only applies to continuous mode. Whether to actively scan when the tab is not active.
  // When false, this reduces CPU usage when the tab is not active. Default true.
  backgroundScan: true,
  
  // Only applies to continuous mode. The period, in milliseconds, before the same QR code
  // will be recognized in succession. Default 5000 (5 seconds).
  refractoryPeriod: 5000,
  
  // Only applies to continuous mode. The period, in rendered frames, between scans. A lower scan period
  // increases CPU usage but makes scan response faster. Default 1 (i.e. analyze every frame).
  scanPeriod: 1
};
  let scanner = new Instascan.Scanner(opts);
      scanner.addListener('scan', function (content) {
        if(content)
        {
          $.ajax({
            url: "<?php echo e(url('/qr-code')); ?>",
            type: "POST",
            data:{
              _token: "<?php echo e(csrf_token()); ?>",
              order_id: "<?php echo e($orderid); ?>",
              seller_id: "<?php echo e(Auth::id()); ?>",
              receipt: content
            },
            success: function(data)
            {
            if(data == 'ok'){
              $('#qr').val(content)
              scanner.stop()
              location.reload(true)
            }
            }
          })
        }else{
          alert('error')
        }
      });
      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
          <?php if(strpos($req, 'Android')){ ?>
            scanner.start(cameras[1]);
          <?php }elseif(strpos($req, 'win')) {?>
            scanner.start(cameras[0]);
          <?php }else{ ?>
            scanner.start(cameras[0]);
          <?php } ?>
        } else {
          alert('No cameras found.');
        }
      }).catch(function (e) {
        alert(e);
      });
  }else if(type == 'manual') {
    
    $('#save').on('click', function() {
      var value = $('#receipt').val()


      if(value == null) {
        alert('not null')
      }else{
        $.ajax({
            url: "<?php echo e(url('/qr-code')); ?>",
            type: "POST",
            data:{
              _token: "<?php echo e(csrf_token()); ?>",
              order_id: "<?php echo e($orderid); ?>",
              seller_id: "<?php echo e(Auth::id()); ?>",
              receipt: value
            },
            success: function(data)
            {
              if(data == 'ok')
              {
                $('#text-receipt').removeAttr('hidden','').text('You receipt has been saved')
                $('#receipt').attr('readonly','')
                location.reload(true)
              }
            }
        })
      }
    })
  }else if(type == 'barcode')
  {
  
    if (!navigator.mediaDevices || !navigator.mediaDevices.enumerateDevices) {
      console.log("enumerateDevices() not supported.");
      return;
    }

    // List cameras and microphones.

    navigator.mediaDevices.enumerateDevices()
      .then(function(devices) {
        devices.forEach(function(device) {
          // alert(device.kind + ": " + device.label +
          //   " id = " + device.deviceId);
          if(device.kind != null || device.label != null || device.deviceId != null)
          {
            $('#selects').append('<option value='+device.deviceId+' >' + device.label + '</option')
          }
        });
      })
      .catch(function(e) {
        console.log(e.name + ": " + e.message);
  });

    $('#selects').on('change', function(){
      var id = $('#selects').val()

      Quagga.init({
          inputStream : {
            name : "Live",
            type : "LiveStream",
            target: document.querySelector('#interactive'),    // Or '#yourElement' (optional)
            constraints: {
              width: 640,
              height: 480,
              facingMode: "environment",
              deviceId: id
              
            },
          },
          numOrWorkers: navigator.hardwareConcurrency,
          locate: true,
        frequency: 1,
        debug: {
            drawBoundingBox: true,
            showFrequency: true,
            drawScanline: true,
            showPattern: true
        },
        multiple:false,
        locator: {
        	halfSample: true,
	      	  patchSize: "large", // x-small, small, medium, large, x-large
	      	  debug: {
	      	    showCanvas: true,
	      	    showPatches: true,
	      	    showFoundPatches: true,
	      	    showSkeleton: true,
	      	    showLabels: true,
	      	    showPatchLabels: true,
	      	    showRemainingPatchLabels: true,
	      	    boxFromPatches: {
	      	      showTransformed: true,
	      	      showTransformedBox: true,
	      	      showBB: true
	      	    }
	      	  }
        },
          decoder : {
            readers : ["code_128_reader"],
            debug: {
                  drawBoundingBox: true,
                  showFrequency: true,
                  drawScanline: true,
                  showPattern: true
              },
              multiple: false,
          },
        }, function(err) {
            if (err) {
                console.log(err);
                return
            }
            console.log("Initialization finished. Ready to start");
            Quagga.start();
        });

    })
    	Quagga.onProcessed(function (result) {
        var drawingCtx = Quagga.canvas.ctx.overlay,
        drawingCanvas = Quagga.canvas.dom.overlay;

        if (result) {
            if (result.boxes) {
                drawingCtx.clearRect(0, 0, parseInt(drawingCanvas.getAttribute("width")), parseInt(drawingCanvas.getAttribute("height")));
                result.boxes.filter(function (box) {
                    return box !== result.box;
                }).forEach(function (box) {
                    Quagga.ImageDebug.drawPath(box, { x: 0, y: 1 }, drawingCtx, { color: "green", lineWidth: 2 });
                });
            }

            if (result.box) {
                Quagga.ImageDebug.drawPath(result.box, { x: 0, y: 1 }, drawingCtx, { color: "#00F", lineWidth: 2 });
            }

            if (result.codeResult && result.codeResult.code) {
                Quagga.ImageDebug.drawPath(result.line, { x: 'x', y: 'y' }, drawingCtx, { color: 'red', lineWidth: 3 });
            }
        }
    });
        Quagga.onDetected(function(result){
          var last_code = result.codeResult.code
          $('#interactive').attr('hidden','')
          Quagga.stop()
            $.ajax({
              url: "<?php echo e(url('/qr-code')); ?>",
              type: "POST",
              data:{
                _token: "<?php echo e(csrf_token()); ?>",
                order_id: "<?php echo e($orderid); ?>",
                seller_id: "<?php echo e(Auth::id()); ?>",
                receipt: last_code
              },
              success: function(data)
              {
                if(data == 'ok')
                {
                  location.reload(true)
                }
              }
          })
        })
        
  }
}

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u9037400/public_html/hs/resources/views/frontend/seller/qr.blade.php ENDPATH**/ ?>