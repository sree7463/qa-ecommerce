<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/navigation'); ?>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <?php $this->load->view('includes/categories'); ?>

        <h5 class="my-4">Price Range</h5>
        <div class="list-group">
          <form action="<?php echo base_url(); ?><?php echo preg_replace('/\//', '', $_SERVER['REQUEST_URI'], 1); ?>" method="POST">
            <div class="form-group">
              <input type="range" class="custom-range" name="maximum_price" min="10" max="2000" step="10" value="<?php echo $maxvalue; ?>" id="customRange1">
              <b>Price: </b> $<span>0</span> - $<span id="maximum_price"><?php echo $maxvalue; ?></span>
            </div>
            <input type="submit" name="price_filter" value="Filter" class="btn btn-primary btn-sm">
          </form>
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">
      <?php if (isset($message)) echo $message; ?>

        <div class="row mt-4">
				<?php foreach($products as $product): ?>
        <?php
          if (!empty($product->product_images)) {
            $image = explode(',', $product->product_images)[0];
            if (file_exists('Assets/images/products/' . $image)) {
              $file_path = base_url() . 'Assets/images/products/' . $image;
            } else {
              $file_path = base_url() . 'Assets/images/products/no_image_found.png';
            }
          } else {
            $file_path = base_url() . 'Assets/images/products/no_image_found.png';
          }
        ?>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="<?php echo base_url() . str_replace(' ', '-', $product->product_name) . "-2" . $product->product_id; ?>"><img class="card-img-top" src="<?php echo $file_path; ?>" alt="<?php echo $product->product_name ?>" title="<?php echo $product->product_name ?>"></a>
              <div class="card-body">
                <h4 class="card-title">
                  <div class="float-right">
                    <i data-product-id="<?php echo $product->product_id; ?>" class="<?php echo (in_array($product->product_id, $favourite_product_ids)) ? "fas": "far"; ?> fa-star favourite-icon"></i>
                  </div>
                  <a href="<?php echo base_url() . str_replace(' ', '-', $product->product_name) . "-2" . $product->product_id; ?>"><?php echo $product->product_name; ?></a>
                </h4>
                <h5>$<?php echo $product->product_price; ?></h5>
                <p class="card-text"><?php echo $product->product_meta_description; ?></p>
              </div>
            </div>
          </div>
				<?php endforeach; ?>

        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 --> 

    </div>
    <!-- /.row --><br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>

  </div>
  <!-- /.container -->

<?php $this->load->view('includes/footer'); ?>