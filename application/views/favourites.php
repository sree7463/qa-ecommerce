<?php $this->load->view('includes/header.php'); ?>
<?php // $this->load->view('includes/carousel.php'); ?>
	<div class="container">
	<div class="row">
		<?php $this->load->view('includes/sidebar.php'); ?>

		<div class="span9">		
			<h4>Favourite Products:</h4>
			<table class="table table-bordered">
        <thead>
          <tr>
            <th>Product</th>
            <th>product name</th>
					  <th>Price</th>
					  <th>Action</th>
					</tr>
        </thead>
        <tbody>
        	<?php if (count($products) > 0): ?>
        	<?php $sum_of_price = 0; ?>
          <?php foreach ($products as $product): ?>
          <?php $images = explode(',', $product->product_images); ?>
          <?php $sum_of_price += $product->product_new_price; ?>
					<tr>
            <td> <img width="60" src="<?php echo base_url() . 'Assets/images/products/thumbnails/' . $images[0]; ?>" alt=""></td>
            <td><?php echo $product->product_name; ?></td>
            <td>Rs <?php echo $product->product_new_price; ?></td>
            <td>
            	<a data-product-id="<?php echo $product->product_id; ?>" href="#" class="btn add-to-cart">Add to <i class="fas fa-shopping-cart"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
              <button data-product-id="<?php echo $product->product_id; ?>" class="btn fav-product">
                <a class="" rel="tooltip" data-placement="top" data-original-title="Add to favourite"><i class="fa fa-heart favourite-product"></i></a>
              </button>
            	<!-- <button class="btn btn-warning btn-xs">Delete</button> -->
            </td>
          </tr>
          <?php endforeach; ?>
          <!-- <tr>
            <td colspan="2" style="text-align:right">Total Price:	</td>
            <td colspan="2">Rs <?php echo $sum_of_price; ?></td>
          </tr> -->
          <?php else: ?>
          <tr>
						<td colspan="4"><i>No product saved as favourite!</i></td>
          </tr>
         	<?php endif; ?>
				</tbody>
      </table>
		</div>
	</div>
	</div>
<?php $this->load->view('includes/footer.php'); ?>