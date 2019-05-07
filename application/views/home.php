<?php $this->load->view('includes/header.php'); ?>
<?php // $this->load->view('includes/carousel.php'); ?>
	<div class="container">
	<div class="row">
		<?php $this->load->view('includes/sidebar.php'); ?>

		<div class="span9">		
			<h4>Featured Products</h4>
			<div class="owl-carousel owl-theme">
			  <?php if (count($featured_products) > 0): ?>
				<?php foreach ($featured_products as $product): ?>
				<?php $image = explode(',' , $product->product_images)[0]; ?>
				<?php $product_link = base_url() . "{$product->product_slug}-2{$product->product_id}"; ?>
				<?php 
					$favourite_products = [];
			  	if (isset($_COOKIE["favourite_products"])) {
			  		$favourite_products = json_decode($_COOKIE["favourite_products"]);
			  	}
		  	?>
					<div class="item">
						  <div class="thumbnail">
						  <div class="ribbon"><span><?php echo $product->product_tag; ?></span></div>
							<a href="<?php echo $product_link; ?>" style=''>
								<img src="<?php echo base_url(); ?>Assets/images/products/thumbnails/<?php echo $image; ?>" style='width: 100%' alt="">
							</a>
							<div class="caption">
							  <h5 class="pdp-title"><?php echo $product->product_name; ?></h5>
							  
							  	<?php 
							  	$class = "";
							  	if (in_array($product->product_id, $favourite_products)) {
							  		$class = "favourite-product";
							  	}
							  	?>
						 

						  	<div class="hot_product_container">
							  	<button data-product-id="<?php echo $product->product_id; ?>" class="btn fav-product ">
							  		<a class="" rel="tooltip" data-placement="top" data-original-title="Add to favourite"><i class="fa fa-heart <?PHP echo $class; ?>"></i></a>
							  	</button>
					  		</div>
	
							  	<div class="prices_container">
							  		<?php if (isset($product->product_old_price) && $product->product_old_price > 0): ?>
								  		<div class="og-price og-price-cut">Rs <?php echo $product->product_old_price; ?></div>
								  	<?php endif; ?>
								  	<?php if (isset($product->product_new_price)): ?>
									  	<div class="og-price">Rs <?php echo $product->product_new_price; ?></div>
									  <?php endif; ?>
							  	</div>
							  <h4>
									<!-- <a class="btn btn-primary" href="#">Rs <?php echo $product->product_new_price; ?></a> -->
							  </h4>
							</div>
						  </div>
					</div>
				<?php endforeach; ?>
			  <?php endif; ?><!-- if (count($featured_products) > 0) -->
			</div>
				<?php if (count($products) > 0): ?>
			  <?php 
				  $cart_products = [];
			  	if (isset($_COOKIE["cart_products"])) {
			  		$cart_products = json_decode($_COOKIE["cart_products"]);
			  	}
			  	$favourite_products = [];
			  	if (isset($_COOKIE["favourite_products"])) {
			  		$favourite_products = json_decode($_COOKIE["favourite_products"]);
			  	}
			  ?>
						<h4>Products:</h4>
						  <ul class="thumbnails">
					<?PHP
							foreach ($products as $product):
							$image = explode(',' , $product->product_images)[0]; 
							$product_link = base_url() . "{$product->product_slug}-2{$product->product_id}";
				?>
					<li class="span3">
					  <div class="thumbnail">
						<a  href="<?php echo $product_link; ?>"><img src="<?php echo base_url(); ?>Assets/images/products/thumbnails/<?php echo $image; ?>" width="150" alt="<?php echo $product->product_name; ?>" title="<?php echo $product->product_name; ?>"/></a>
						<div class="caption">
						  <h5 class="pdp-title"><?php echo $product->product_name; ?></h5>
						  <!-- <p> 
							Lorem Ipsum is simply dummy text. 
						  </p> -->
						  
						  	<?php 
						  	$class = "";
						  	if (in_array($product->product_id, $favourite_products)) {
						  		$class = "favourite-product";
						  	}
						  	?>
						  	<div class="fav_btn_container">
						  	<button data-product-id="<?php echo $product->product_id; ?>" class="btn fav-product">
						  		<a class="" rel="tooltip" data-placement="top" data-original-title="Add to favourite"><i class="fa fa-heart <?PHP echo $class; ?>"></i></a>
						  	</button>
						  	<!-- IF NOT IN PRODUCT CART -->
					  		<?php if (!in_array($product->product_id, $cart_products)): ?>
						  		<a class="btn add-to-cart" data-product-id="<?php echo $product->product_id; ?>" href="#">Add to <i class="fas fa-shopping-cart"></i></a>
						  		</div>
					  		<?php else: ?>
									<button data-product-id='<?php echo $product->product_id; ?>' class='btn btn-danger btn-xs remove-from-cart'>Remove</button>
					  		<?php endif; ?>
								
							<div class="prices_container">
					  		<?php if (isset($product->product_old_price) && $product->product_old_price > 0): ?>
						  		<div class="og-price og-price-cut">Rs <?php echo $product->product_old_price; ?></div>
						  	<?php endif; ?>
						  	<?php if (isset($product->product_new_price)): ?>
							  	<div class="og-price">Rs <?php echo $product->product_new_price; ?></div>
							  <?php endif; ?>
					  	</div>

							<!-- <h4 style="text-align:center;">
								<a class="btn btn-primary" href="#">Rs <?php echo $product->product_new_price; ?></a>
							</h4> -->
						  <div class="flexbox">

								<!-- <div class="fav-list">
								  <div href="#" id="fav_button">Add to Favorites</a>
								</div> -->
								
							</div>
						</div>
					  </div>
					</li>
				<?php 
						endforeach; ?>
				</ul>	
				<?php if (!isset($_POST['price_range'])): ?>
					<ul class="pager">
	          <?PHP
	            for($i = 1; $i <= $product_count; $i++){
	              if($i == $page){
	                echo "<li><a class='active_link' href='".base_url()."?page={$i}'>{$i}</a></li>";
	              } else {
	                echo "<li><a href='".base_url()."?page={$i}'>{$i}</a></li>";
	              }
	            }
	          ?>
	        </ul>
				<?php endif; ?>
				<?php
					else: // if (count($products) > 0)
				?>
					<h1 class="text-jumbo text-ginormous">Oops!</h1>
          <h2>Currently there are no products available with in this price range.</h2>
          <h6>Error code: 404</h6>
				<?php endif; ?>

		</div>
		</div>
	</div>
<?php $this->load->view('includes/footer.php'); ?>