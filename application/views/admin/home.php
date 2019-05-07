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

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Users</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $user_count; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Categories</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $category_count; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Products</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $product_count; ?></div>
                        </div>
                        <div class="col">
                          <!-- <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div> -->
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total orders</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $order_count; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Orders</h1>
          </div>

          <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
              <div class="col-md-6">
                <?php if (isset($message)) echo $message; ?>
                <?php if ($this->session->flashdata('order_message')){
                  echo $this->session->flashdata('order_message');
                } ?>
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
                          <td>Rs <?php echo number_format($order->total); ?></td>
                          <td><?php echo date_format(date_create($order->order_date), 'd F Y'); ?></td>
                          <td>
                            <a href="" data-toggle="tooltip" title="Delete" data-order-id="<?php echo $order->order_id; ?>" class="btn btn-danger btn-circle btn-sm order_delete">
                              <i class="fas fa-trash"></i>
                            </a>
                            <?php if ($order->order_status == 'pending'): ?>
                            <a href="" data-toggle="tooltip" title="Approve" data-order-id="<?php echo $order->order_id; ?>" class="btn btn-success btn-circle btn-sm order_approve">
                              <i class="fas fa-check"></i>
                            </a>
                            <?php else: ?>
                            <a href="" data-toggle="tooltip" title="Pending" data-order-id="<?php echo $order->order_id; ?>" class="btn btn-danger btn-circle btn-sm order_disapprove">
                              <i class="fas fa-exclamation-triangle"></i>
                            </a>
                            <?php endif; ?>
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

          </div>


<?php $this->load->view('admin/includes/footer'); ?>