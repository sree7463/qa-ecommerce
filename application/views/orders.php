<?php $this->load->view('includes/header.php'); ?>
<?php // $this->load->view('includes/carousel.php'); ?>
	<div class="container">
		<div class="row">
			<?php $this->load->view('includes/sidebar.php'); ?>

			<div class="span9">		
				<h4>Orders:</h4>
				<table class="table table-bordered">
					<thead>
	          <tr>
	            <th>#</th>
						  <th>Date</th>
						  <th>Total</th>
						  <th>Action</th>
						</tr>
	        </thead>
	        <tbody>
	        	<?php if (count($orders)): ?>
						<?php foreach ($orders as $order): ?>
						<tr>
							<td><?php echo $order->order_id; ?></td>
							<td><?php echo date("d F Y", strtotime($order->order_date)); ?></td>
							<td>Rs. <?php echo number_format($order->total); ?></td>
							<td><a href="<?php echo base_url(); ?>order/order_details/<?php echo $order->order_id; ?>">view details</a></td>
						</tr>
						<?php endforeach; ?>
						<?php else: ?>
						<tr>
							<td colspan="4"><i>No order placed yet!</i></td>
						</tr>
	        	<?php endif; ?>
	        </tbody>
				</table>
			</div>
		</div>
	</div>
<?php $this->load->view('includes/footer.php'); ?>