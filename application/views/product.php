<?php $this->load->view('includes/header.php'); ?>
	<div class="container">
	<div class="row">
		<?php $this->load->view('includes/sidebar.php'); ?>

<div class="row">	 
			<div id="gallery" class="span3">
				<?php 
				$images = explode(',', $product->product_images);
				$cart_products = [];
		  	if (isset($_COOKIE["cart_products"])) {
		  		$cart_products = json_decode($_COOKIE["cart_products"]);
		  	}
				?>
        <a href="<?php echo base_url() . 'Assets/images/products/' . $images[0]; ?>" title="<?php echo $product->product_name; ?>">
				<img src="<?php echo base_url() . 'Assets/images/products/thumbnails/' . $images[0]; ?>" style="width:100%" alt="<?php echo $product->product_name; ?>">
            </a>
			<?php if (count($images) > 1): ?>
			
				<div id="differentview" class="moreOptopm carousel slide">
          <div class="carousel-inner">
            <div class="item active">
	          	<?php foreach ($images as $image): ?>
							<a href="<?php echo base_url() . 'Assets/images/products/' . $image; ?>"> 
							<img style="width:29%" src="<?php echo base_url() . 'Assets/images/products/thumbnails/' . $image; ?>" alt=""></a>
							<?php endforeach; ?>
            </div>
            <div class="item">
							<?php foreach ($images as $image): ?>
								<a href="<?php echo base_url() . 'Assets/images/products/thumbnails/' . $image; ?>"> 
								<img style="width:29%" src="<?php echo base_url() . 'Assets/images/products/' . $image; ?>" alt=""></a>
							<?php endforeach; ?>
            </div>
          </div>
					<!-- <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
					<a class="right carousel-control" href="#myCarousel" data-slide="next">›</a> --> 

        </div>
			<?php endif; ?><!-- count (images) -->
			</div>
			<div class="span6">
				<h3 class="pdp-title"><?php echo $product->product_name; ?></h3>
				<hr class="soft">
				<form class="form-horizontal qtyFrm">
				  <div class="control-group">
					<label class="control-label"><span class="pdp-price">Rs <?php echo $product->product_new_price; ?>.00</span></label>
					<div class="controls">
						<!-- <button type="submit" class="btn btn-xs btn-primary pull-right"> Add to cart <i class="fas fa-shopping-cart"></i></button> -->
					<!-- <input type="number" class="span1" placeholder="Qty." value=1> -->
					  <?php if (!in_array($product->product_id, $cart_products)): ?>
				  		<a class="btn btn-xs add-to-cart" data-product-id="<?php echo $product->product_id; ?>" href="#">Add to <i class="fas fa-shopping-cart"></i></a>
			  		<?php else: ?>
							<button data-product-id='<?php echo $product->product_id; ?>' class='btn btn-danger btn-xs remove-from-cart'>Remove</button>
			  		<?php endif; ?>
					</div>
				  </div>
				</form>
				
				<hr class="soft">
				<br class="clr">
				<?php echo html_entity_decode($product->product_detail); ?>
			<hr>

			</div>
					 </div>

		</div>
          </div>

	</div>
	<?php $this->load->view('includes/footer.php'); ?>