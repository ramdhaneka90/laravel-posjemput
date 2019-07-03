<?php $__env->startSection('header'); ?>
  <?php echo $__env->make('layouts.header-costumer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="site-blocks-cover overlay" style="background-image: url(/img/manwithbox.jpg);" data-aos="fade" id="home-section">
      <div class="container">
        <div class="row align-items-center justify-content-center">
              <div class="col-md-6 mt-lg-5 text-center">
                <h1>PostJemput</h1>
                <p class="mb-5">The Best Experience for Pickup and Delivery!</p>
              </div>
        </div>
      </div>
    </div>  

    

    <section class="site-section border-bottom">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center">
            <h1 class="section-title mb-3">What We Do</h1>
          </div>
        </div>
        <div class="row align-items-stretch">
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><img src="https://img.icons8.com/color/48/000000/shopping-cart-loaded.png"></div>
              <div>
                <h3>Order Pickup</h3>
                <p>Berisi Deskripsi Singkat</p>
                <p><a href="/costumer-order"><button class="btn btn-primary">Learn More</button></a></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><img src="https://img.icons8.com/color/48/000000/order-history.png"></div>
              <div>
                <h3>Order History</h3>
                <p>Berisi Deskripsi Singkat</p>
                <p><a href="/costumer-history"><button class="btn btn-primary">Learn More</button></a></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><img src="https://img.icons8.com/color/48/000000/track-order.png"></div>
              <div>
                <h3>Track Order</h3>
                <p>Berisi Deskripsi Singkat</p>
                <a href="/customer-track"><button class="btn btn-primary">Learn More</button></a>
              </div>
            </div>
          </div>


          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="300">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><img src="https://img.icons8.com/color/48/000000/shopping-cart-loaded.png"></div>
              <div>
                <h3>Top Up Order</h3>
                <p>Berisi Deskripsi Singkat</p>
               <a href="/costumer-topup"><button class="btn btn-primary">Learn More</button></a>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="400">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><img src="https://img.icons8.com/color/48/000000/add-shopping-cart.png"></div>
              <div>
                <h3>Renew Order</h3>
                <p>Berisi Deskripsi Singkat</p>
                <p><a href="#">Learn More</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="500">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><img src="https://img.icons8.com/color/48/000000/purchase-order.png"></div>
              <div>
                <h3>List Order</h3>
                <p>Berisi Deskripsi Singkat</p>
                <p><a href="#">Learn More</a></p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master-costumer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/posjemputBaru/resources/views//customer-views/index.blade.php ENDPATH**/ ?>