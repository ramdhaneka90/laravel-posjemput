<?php $__env->startSection('header','Offices'); ?>

<?php $__env->startSection('breadcumb'); ?>
<ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-truck"></i>Offices</a></li>
      </ol>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">List Offices</h3>

          
        </div>

        <div class="box-body">
          
        <table class="table table-bordered">
                <thead>
                <tr>
                  <th style="width: 10px">No</th>
                  <th>Code Unit</th>
                  <th>Address</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php $__currentLoopData = $office; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr data-id="<?php echo e($value->id); ?>">
                  <td><?php echo e($loop->iteration); ?></td>
                  <td><?php echo e($value->code_unit); ?></td>
                  <td><?php echo e($value->address); ?></td>
                  <td>
                      <button class="btn btn-info ubah"> Update</button>
                      <button class="btn btn-danger">Delete</button>
                  </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
            <?php echo e($office->links()); ?>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        <form role="form" id="form-office">
              <div class="box-body">
                <div class="form-group">
                  <label for="name">Code Unit</label>
                  <input type="text" class="form-control" placeholder="Enter Code Unit">
                </div>

                <div class="form-group">
                  <label>Address</label>
                  <textarea name="address" class="form-control">

                  </textarea>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button class="btn btn-info">Reset</button>
              </div>
            </form>
        </div>
        <!-- /.box-footer-->
      </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master-operator', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/posjemputBaru/resources/views//admin/offices/index.blade.php ENDPATH**/ ?>