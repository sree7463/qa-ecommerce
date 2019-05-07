<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/navigation'); ?>

  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <?php if(count($orders) > 0): ?>
        	<h3>Order History</h3>
					<table class="table">
				    <thead>
				      <tr>
				        <th>Date</th>
				        <th>Total</th>
				        <th>Action</th>
				      </tr>
				    </thead>
				    <tbody>
				      <?php foreach($orders as $order): ?>
								<tr>
								  <td><?php echo date_format(date_create($order->order_date), "d/m/Y"); ?></td>
								  <td>$<?php echo $order->total; ?></td>
								  <td>
								  	<button data-order-id="<?php echo $order->order_id; ?>" class="btn btn-outline-danger btn-sm order_delete"><i class="fas fa-trash-alt "></i></button>
								  </td>
								</tr>
				      <?php endforeach; ?>
				    </tbody>
				  </table>
        <?php else: ?>
          <div class="mt-4">
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>Error!</strong> No order saved yet!
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
      </div>
    </div>
  </div>

<?php $this->load->view('includes/footer'); ?>