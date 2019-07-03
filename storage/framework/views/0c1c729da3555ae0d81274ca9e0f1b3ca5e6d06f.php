<?php $__env->startSection('header','Order'); ?>

<?php $__env->startSection('breadcumb'); ?>
<ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Order</a></li>
      </ol>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Order</h3>
        </div>

        <div class="box-body">
          
        <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">No</th>
                    <th>Barang</th>
                    <th>Kateogri</th>
                    <th>Berat</th>
                    <th>Status</th>
                    <th>Jumlah</th>
                    <th>Penerima</th>
                    <th>Alamat Pengiriman</th>
                    <th>Alamat Pickup</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>

                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr data-id="<?php echo e($order->id); ?>">
                    <td><?php echo e($loop->iteration); ?></td>
                    <td><?php echo e($order->name_order); ?></td>
                    <td><?php echo e($order->category); ?></td>
                    <td><?php echo e($order->weight); ?></td>
                    <td><?php echo e($order->status); ?></td>
                    <td><?php echo e($order->quantity); ?></td>
                    <td><?php echo e($order->name_receiver); ?></td>
                    <td><?php echo e($order->address_receiver); ?></td>
                    <?php if(!is_null($order->customer()->first()->customerAddress()->first())): ?>
	                    <td><?php echo e($order->customer()->first()->customerAddress()->first()->address); ?></td>
	                <?php else: ?>
	                	<td>-</td>
	                <?php endif; ?>
                    <?php if($order->status == "PENDING"): ?>
                      <td>Approved
                        <button class="btn btn-default" id="id_order" data-toggle="modal" data-target="#modal-default" value="<?php echo e($order->id); ?>">Jemput</button>
                      </td>
                    <?php elseif($order->status == "off"): ?> 
                      <td>
                              <form action="<?php echo e(url('order', $order)); ?>" method="post">
                                      <?php echo e(csrf_field()); ?>

                                      <?php echo e(method_field('PUT')); ?>

                              <input type="hidden" name="id" value="<?php echo e($order->customer_id); ?>">
                                      <input class="btn btn-info" type="submit" value="Approve">
                              </form>   
                      </td>
                      <?php elseif($order->status == "JEMPUT"): ?>
                      <td>
                        Cour to Office
                        <button class="btn btn-primary">
                          Send Resi
                        </button>
                      </td>
                    <?php endif; ?>
                </tr>
                
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <center>
          <?php echo e($orders->links()); ?>

          </center>
        </div>
        <!-- /.box-footer-->
      </div>

<!-- Modal -->
<div class="modal fade" id="modal-default" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Set Courier</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" id="form-setCour">
          <?php echo csrf_field(); ?>
          <?php echo method_field('PUT'); ?>
        <div class="row">
          <div class="col-lg-6">
            <div class="form-group">  
              <label>Courier</label>
              <select name="courier" class="form-control add-cour">
                <?php $__currentLoopData = $dataCour; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>

            <div class="form-group">
                <label>Tanggal Jemput:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="tgl_jemput" class="form-control pull-right" id="datepicker">
                </div>
                <!-- /.input group -->
              </div>

              
          </div>
        </div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary jemput">Set Jemput</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
  <script type="text/javascript">
    console.log('hai guyss');

    $('#datepicker').datepicker({
      autoclose: true
    })


    // $('.timepicker').timepicker({
    //   showInput:false,
    // })

    $('#modal-default').on('show.bs.modal', function (e) {
      var id_order = $("#id_order").val();
      console.log(id_order);
      var url = "<?php echo e(url('set_courier/')); ?>"
      console.log(url);
      $('#form-setCour').attr("action",url+"/"+id_order);
    })

    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });

    // $('.jemput').click(function (e) {
    //   const cour = $('.add-cour').val();
    //   const tgl_jemput = $('#datepicker').val();

    //     $.ajax({
    //       type:'POST',
    //       url:'/setCour',
    //       data:{
    //         courier_id:cour,
    //         waktu_jemput:tgl_jemput
    //       },
    //       success:function (data) {
    //         console.log('success');
    //       }
    //     })
    // })

  </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master-operator', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/posjemputBaru/resources/views/admin/order/aproval.blade.php ENDPATH**/ ?>