<?php $__env->startSection('header'); ?>
  <?php echo $__env->make('customer-views.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<br>
<br>
<br>
<br>
<br>
	<div class="bungkus" style="margin:0 70px;">
            <div class="row mt-4">
               <div class="col-lg-12">
               	<a href="/home"><i class="fas fa-long-arrow-alt-left fa-2x" style="color: black;"></i></a>
                    <br>
               	<div class="card">
               		<div class="card-header">
               			TopUp
               		</div>
				  <div class="card-body">
				  	<?php if($message = Session::get('success')): ?>
				      <div class="alert alert-success alert-block">
				        <button type="button" class="close" data-dismiss="alert">×</button> 
				          <strong><?php echo e($message); ?></strong>
				      </div>
				    <?php endif; ?>
				    <div class="row">
				    	<form method="POST" action="<?php echo e(url('/topup')); ?>" enctype="multipart/form-data">
				    		<?php echo csrf_field(); ?>
					    	<div class="col-lg-12">
					    		<div class="form-group">
					    			<?php if(is_null($tgl_lunas) && is_null($bulan_collect[0])): ?>
					    				<label>Anda Belum Menggunakan Fitur Ini</label>
					    			<?php elseif(is_null($tgl_lunas) && is_null($bukti_bayar)): ?>
					    				<label>Tagihan Bulan <?php echo e($bulan_collect[0]); ?> : Rp. <?php echo e($tagihan); ?></label>
					    				<br>
					    				<label>Nominal</label>
					    				<input type="number" class="form-control" name="nominal">
					    			<?php elseif(is_null($tgl_lunas) && !is_null($bukti_bayar)): ?>
					    				<label>Tagihan Telah Dibayarkan</label>
					    				<br>
					    				<label>Tunggu Verifikasi Kantor</label>
					    				
					    			<?php elseif($bulan_collect[0] == \Carbon::parse($tgl_lunas)->month): ?>
					    				<label>Tagihan Bulan Ini Sudah Dibayarkan</label>
					    				<label>Coba</label>
					    			<?php endif; ?>
					    		</div>	

					    		<div class="form-group">
					    			<label>Bukti Pembayaran</label>
					    			<input type="file" class="form-control" required="" id="buktiBayar" onchange="loadFile(event)" name="buktiBayar">
					    		</div>

					    		<div class="form-group">
					    			<button class="btn btn-primary">
							    		Top Up
							    	</button>
					    		</div>
					    	</div>

					    	
				    	</form>

				    	<div class="row">
				    		<div class="col-lg-12">
				    			<img src="" id="prevImage" alt="Image" width="400px" height="250px">
				    		</div>
				    	</div>
				    </div>
				  </div>
				</div>
               </div>
            </div>
        </div>

        <br>
        <br>
        <br>
        <br>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master-costumer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/posjemputBaru/resources/views//customer-views/order-topup.blade.php ENDPATH**/ ?>