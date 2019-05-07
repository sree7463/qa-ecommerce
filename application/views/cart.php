<?php $this->load->view('includes/header.php'); ?>
<?php // $this->load->view('includes/carousel.php'); ?>
	<div class="container">
	<div class="row">
		<?php $this->load->view('includes/sidebar.php'); ?>

		<div class="span9 cart-app">		
			<h4>Favourite Products:</h4>
			<table class="table table-bordered">
        <thead>
          <tr>
            <th>Product</th>
            <th>Description</th>
            <th>Quantity/Update</th>
            <th>Price</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          <?php if (count($products) > 0): ?>
          <?php $sum_of_price = 0; ?>
          <?php foreach ($products as $product): ?>
          <?php $product_link = base_url() . "{$product->product_slug}-2{$product->product_id}"; ?>
          <?php $images = explode(',', $product->product_images); ?>
          <?php $sum_of_price += $product->product_new_price; ?>
            <tr>
              <td>
                <a href="<?php echo $product_link; ?>" target="_blank">
                  <img width="60" src="<?php echo base_url() . 'Assets/images/products/thumbnails/' . $images[0]; ?>" alt="">
                </a>
              </td>
              <td><?php echo $product->product_name; ?></td>
              <td>
                <div class="input-append">
                  <input class="product_count" data-product-id="<?php echo $product->product_id; ?>" style="max-width:34px" placeholder="1" id="appendedInputButtons" size="16" type="text" value="1" readonly="true">
                  <button data-product-price="<?php echo $product->product_new_price; ?>" class="btn decrease_pc_btn" type="button">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button data-product-price="<?php echo $product->product_new_price; ?>" class="btn increase_pc_btn" type="button">
                    <i class="fas fa-plus"></i>
                  </button>
                  <button data-product-price="<?php echo $product->product_new_price; ?>" data-product-id="<?php echo $product->product_id; ?>" class="btn btn-danger remove-product-from-cart" type="button">
                    <i class="fas fa-times"></i>
                  </button>       
                </div>
              </td>
              <td>Rs <?php echo $product->product_new_price; ?></td>
              <td>Rs <span class="multiplied_price"><?php echo $product->product_new_price; ?></span></td>
            </tr>
          <?php endforeach; ?>
        
          <tr>
            <td colspan="4" style="text-align:right">Total Price: </td>
            <td> Rs <span id="total_price"><?php echo $sum_of_price; ?></span></td>
          </tr>
          <?php else: ?>
          <tr>
            <td colspan="5"><i>No product added in cart!</i></td>
          </tr>
          <?php endif; ?>
          <!-- <tr>
            <td colspan="4" style="text-align:right"><strong>TOTAL ($228 - $50 + $31) =</strong></td>
            <td class="label label-important" style="display:block"> <strong> $155.00 </strong></td>
          </tr> -->
        </tbody>
      </table>
      <?php if (count($products) > 0): ?>
      <a href="<?php false; ?>"><button class="btn btn-primary btn-xs pull-right" id="submit_order">SUBMIT ORDER</button></a>
      <?php endif; ?>
		</div>
	</div>
	</div>
<?php $this->load->view('includes/footer.php'); ?>