<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/navigation'); ?>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <?php $this->load->view('includes/categories'); ?>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">
        <?php if(isset($product)): ?>
        <div class="card mt-4">
          <!-- CAROUSEL -->
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <?php if (!empty($product->product_images)): ?>
              <?php
                $images = explode(',', $product->product_images);
                $i = 0;
                foreach ($images as $image):
                  $file_path = base_url() . 'Assets/images/products/' . $image;
                  if (!file_exists('Assets/images/products/' . $image)) {
                    echo "yeah";exit;
                    $file_path = base_url() . 'Assets/images/products/no_image_found.png';
                  }
              ?>
                <div class="carousel-item <?php echo ($i == 0) ? "active": ""; ?>">
                  <img class="d-block w-100" src="<?php echo $file_path; ?>" alt="images">
                </div>
                <?php 
                $i++;
                endforeach; ?>
              <?php else: ?>
                <div class="carousel-item active">
                  <img width="600" src="<?php echo base_url() . 'Assets/images/products/no_image_found.png'; ?>" alt="images">
                </div>

              <?php endif; ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
          <!-- ../ CAROURSEL -->
          <div class="card-body">
            <?php if(in_array($product->product_id, $cart_products)): ?>
              <p class="text-success">Product already in cart</p>
            <?php else: ?>
              <button data-product-id="<?php echo $product->product_id; ?>" class="btn btn-success btn-sm float-right add_to_cart">Add to Cart</button>
            <?php endif; ?>
            <h3 class="card-title"><?php echo $product->product_name; ?></h3>
            <div class="float-right"><span id="add_to_favourite"><?php echo ($already_favourite) ? "": "Add to favourite"; ?></span> <i data-product-id="<?php echo $product->product_id; ?>" class="<?php echo ($already_favourite) ? "fas": "far"; ?> fa-star favourite-icon"></i></div>
            <h4>$<?php echo $product->product_price; ?></h4>
            <p class="card-text"><?php echo $product->product_meta_description; ?></p>
            <!-- <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
            4.0 stars -->
          </div>
        </div>
        <?php else: ?>
          <div class="mt-4">
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>Error!</strong> No product found with this id!
            </div>
          </div>
        <?php endif; ?>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <!-- /.card -->

        <!-- <div class="card card-outline-secondary my-4">
          <div class="card-header">
            Product Reviews
          </div>
          <div class="card-body">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
            <small class="text-muted">Posted by Anonymous on 3/1/17</small>
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
            <small class="text-muted">Posted by Anonymous on 3/1/17</small>
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
            <small class="text-muted">Posted by Anonymous on 3/1/17</small>
            <hr>
            <a href="#" class="btn btn-success">Leave a Review</a>
          </div>
        </div> -->
        <!-- /.card -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

<?php $this->load->view('includes/footer'); ?>