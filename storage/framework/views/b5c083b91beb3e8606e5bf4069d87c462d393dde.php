<?php $__env->startSection('header'); ?>
  <?php echo $__env->make('customer-views.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

        <br>
        <br>
        <br>


<div class="bungkus" style="margin:0 70px;">
    
    <hr>
    <div class="row mt-4">
        <div class="col-lg-12">
            <a href="/home"><i class="fas fa-long-arrow-alt-left fa-2x" style="color: black;"></i></a>
            <br>
            <br>
            <div class="card">
                <div class="card-header">
                    Order List
                </div>

                <div class="card-body">
                    <form action="<?php echo e(route('order')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        		<div class="col-lg-6">
                        			<button type="submit" disabled="" class="mt-4"  id="kirim">Mulai pengiriman</button><br>
                        		</div>
                        <table class="table table-striped" id="tabel_order" style="table-layout:fixed;">
                            <tr style="overflow:auto;">
                                <td>No</td>
                                <td>Nama Pengirim</td>
                                <td>Nama Barang</td>
                                <td>Kategori</td>
                                <td>Jumlah Barang</td>
                                <td>Berat Barang</td>
                                <td>Alamat Pengiriman</td>
                                <td>Alamat PickUp</td>
                                <td>Aksi</td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-header">Order</div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo e(session('status')); ?>

                    </div>
                    <?php endif; ?>

                    <div style="padding: 20px;">
                        <form id="form_order">
                            <div class="row">
                                <div class="col-lg-4">
                                    <label>Nama Penerima</label>
                                    <input type="text" class="form-control" name="namaPenerima" placeholder="Nama Penerima">
                                </div>

                                <div class="col-lg-4">
                                    <label>Nama Barang</label>
                                    <input type="text" class="form-control" name="barang" placeholder="Nama Barang">
                                    <br>
                                </div>

                                <div class="col-lg-4">
                                    <label>Kategori Barang</label>
                                    <input type="text" class="form-control" name="kategori" placeholder="Kategori">
                                    <br>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <label>Jumlah Barang</label>
                                    <input type="number" class="form-control" name="jumlah" placeholder="Jumlah Barang"><br>
                                </div>

                                <div class="col-lg-4">
                                    <label>Berat Barang</label>
                                    <input type="number" class="form-control" name="berat" placeholder="Berat Barang"><br>
                                </div>

                                
                            </div>

                            <div class="row">
                                <div class="col-lg-6  mt-4">
                                    <label>Alamat Pickup</label><br>
                                    <!-- <input type="radio" name="almPck" value="1" checked="" style="position:absolute;left:0;top:40px;bottom:0;"> 
                                    <select class="form-control" id="alamatLamaPck" name="alamatPck">
                                        <option selected="" value="">Pilih alamat pickup</option>
                                        <?php $__currentLoopData = $add2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option><?php echo e($value2); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select><br> -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                      Pilih Alamat
                                    </button>

                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal Pickup</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                                Pilih Alamat
                                                <div class="">
                                                    <?php if(count($add2) == 0): ?>
                                                        <p>Alamat Tidak Ada</p>
                                                    <?php else: ?>
                                                        <?php $__currentLoopData = $add2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <input type="radio" name="alamatPickUp" value="<?php echo e($value->id); ?>">
                                                        <p><?php echo e($value->address); ?></p>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                    <button type="button" id="add-address-pickup">Tambah Alamat Baru</button>

                                                    <div id="add-alamat" style="display: none">
                                                        <div class="form-group">
                                                            <label>Provinsi</label>
                                                            <select class="form-control" name="provinsi" id="province-select">
                                                                <?php $__currentLoopData = $provinsi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($value['province_id']); ?>"><?php echo e($value['province']); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Kota</label>
                                                            <select class="form-control" id="kota">
                                                                
                                                            </select>

                                                            <button class="btn btn-info">Cancel</button>
                                                        </div>    
                                                    </div>
                                                </div>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- end modal -->
                                </div>

                                <div class="col-lg-6 mt-4">
                                    <label>Alamat Penerima</label> <br>
                                   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                      Launch demo modal
                                    </button>
                                </div>
                            </div>

                           <!--  <div class="row">

                                <div class="col-lg-6">
                                    <label>Alamat Penerima</label>
                                    <input style="position:absolute;left:0;top:40px;bottom:0;" type="radio" name="alm" value="1" checked="">


                                    <select class="form-control" id="alamatLama" name="alamat">
                                        <?php $__currentLoopData = $add; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($value1 != null): ?>
                                                <option><?php echo e($value1); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <div class="col-lg-6 mt-2">
                                    <input type="radio" name="alm" value="2" style="position:absolute;left:0;top:20px;bottom:0;">
                                    <textarea id="alamatBaru" style="margin-top:10px;" name="alamat" class="form-control" placeholder="Tambah alamat pengiriman baru"></textarea><br>
                                </div>
                            </div> -->

                            <button type="reset" class="btn btn-warning mt-3">Reset</button>
                        </form>
                        <button id="tambah_form" class="btn btn-info"> + Tambah pengiriman</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

        <br>
        <br>


<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script>
        $(document).ready(function () {
             $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

             $("#add-address-pickup").on('click',function () {
                 $("#add-alamat").show();
                 console.log('asdasd');
             })

            $('#province-select').on('change',function () {
                var province_id = $('#province-select option:selected').val();
                //console.log(a);
                $.ajax({
                    type:'GET',
                    url:"<?php echo e(url('getCity')); ?>"+'/'+province_id,
                    success:function (data) {
                        var listKota = data.kota.results;
                        var optkota = "<option> --Pilih Kota-- </option>";
                        $.each(listKota, function (key, value) {
                            optkota += "<option value="+listKota[key]['city_id']+">"+listKota[key]['city_name']+"</option>";
                        });
                            $("#kota").html(optkota);

                    }
                })
            }) // end onchange


        })
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master-costumer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/posjemputBaru/resources/views//customer-views/order-pickup.blade.php ENDPATH**/ ?>