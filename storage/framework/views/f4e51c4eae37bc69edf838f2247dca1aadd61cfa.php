<?php $__env->startSection('header','Pembayaran Tagihan'); ?>

<?php $__env->startSection('breadcumb'); ?>
<ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      </ol>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					Verifikasi Pembayaran
				</div>

				<div class="card-body">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>Costumer</th>
								<th>Nominal</th>
								<th>Bukti Bayar</th>
								<th>Aksi</th>
							</tr>
						</thead>

						<tbody>
							<?php if($data=='[]'): ?>
								<tr>
									<td colspan="4"><h5 class="text-center">Data Tidak Ada</h5></td>
								</tr>
							<?php else: ?>

							<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($loop->iteration); ?></td>
								<td><?php echo e($value->name); ?></td>
								<td><?php echo e($value->nominal); ?></td>
								<td><a href="<?php echo e(asset('img/bukti-topup/'.$value->bukti_bayar)); ?>" target="_blank">Lihat File</a></td>
								<td>
									<form method="POST" action="<?php echo e(route('verifikasiBayar',$value->id)); ?>">
										<?php echo csrf_field(); ?>
										<?php echo method_field('PUT'); ?>
										<input type="submit" class="btn btn-success" value="Lunas">
									</form>
									<a href="" class="btn btn-warning">Kurang</a>
								</td>
							</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php endif; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master-operator', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/posjemputBaru/resources/views//admin/verif-topup.blade.php ENDPATH**/ ?>