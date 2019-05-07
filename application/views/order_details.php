<?php $this->load->view('includes/header.php'); ?>
<?php // $this->load->view('includes/carousel.php'); ?>
	<div class="container">
		<div class="row">
			<?php $this->load->view('includes/sidebar.php'); ?>

			<div class="span9">		
				<h4>Orders info:</h4>
				<?php if ($order !== NULL): ?>
					<div class="invoice__item">
					  <span class="label">ID:</span>
					  <span class="value"><?php echo $order->order_id; ?></span>
					</div>
					<div class="invoice__item">
					  <span class="label">Date:</span>
					  <span class="value"><?php echo date("d F Y", strtotime($order->order_date)); ?></span>
					</div>
					<?php 
						$order_products = json_decode($order->product_ids_and_amount);
						foreach ($order_products as $item) {
							$item_details = $this->Product_model->edit_product($item->product_id);
							echo '<div class="invoice__item">
										  <span class="label">'.$item_details->product_name.':</span>
										  <span class="value">'.$item->product_count.' x '.$item->price.'</span>
										</div>';
						}
						// echo '<pre>';print_r($this->Product_model->multiple_product_details($order_product_ids)); echo '</pre>';
					?>
					<div class="invoice__item">
					  <span class="label">Total:</span>
					  <span class="value">Rs. <?php echo number_format($order->total); ?></span>
					</div>
					<div class="invoice__item">
					  <span class="label">Status:</span>
					  <span class="value"><?php echo ucfirst($order->order_status); ?></span>
					</div>
				<?php else: ?>
					<div class="alert alert-danger">
						<strong>Order not found</strong>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
<?php $this->load->view('includes/footer.php'); ?>