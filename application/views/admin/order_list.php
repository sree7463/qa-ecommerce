<?php $this->load->view('admin/includes/header'); ?>
  <!-- Page Wrapper -->
  <div id="wrapper">
<?php $this->load->view('admin/includes/sidebar'); ?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
<?php $this->load->view('admin/includes/navigation'); ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">Order</li>
            </ol>
          </nav>

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Order list:</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>

          <div class="row">
            <div class="col-md-6">
              <?php if (isset($message)) echo $message; ?>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>First name</th>
                    <th>Total</th>
                    <th>Date</th>
                    <th colspan="2">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(!empty($orders)): ?>
                    <?php foreach($orders as $order): ?>
                      <tr>
                        <td><?php echo $order->order_id; ?></td>
                        <td><?php echo $order->first_name; ?></td>
                        <td>$<?php echo $order->total; ?></td>
                        <td><?php echo date_format(date_create($order->order_date), 'd-m-Y'); ?></td>
                        <td>
                          <a href="#" data-order-id="<?php echo $order->order_id; ?>" class="btn btn-danger btn-circle btn-sm order_delete">
                            <i class="fas fa-trash"></i>
                          </a>
                        </td>
                      </tr>
                    <?php  endforeach; ?>
                  <?php else: ?>
                    <tr>
                      <td colspan="5"><i>No order saved yet!</i></td>
                    </tr>
                  <?php endif; ?>
                  <!-- <tr>
                    <td colspan="4"><i>No categories added yet!</i></td>
                  </tr> -->
                </tbody>
              </table>
            </div>
          </div>
<?php $this->load->view('admin/includes/footer'); ?>