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
              <li class="breadcrumb-item">User</li>
            </ol>
          </nav>

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">User list:</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>

          <div class="row">
            <div class="col-md-5">
              <?php if (isset($message)) echo $message; ?>
              <?php if ($this->session->flashdata('user_deleted')): ?>
              <div class="alert alert-success">
                <?php echo $this->session->flashdata('user_deleted'); ?>
              </div>
              <?php endif; ?>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>City</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th colspan="3">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(!empty($users)): ?>
                    <?php foreach($users as $user): ?>
                      <tr>
                        <td><?php echo $user->user_name; ?></td>
                        <td><?php echo $user->user_email; ?></td>
                        <td><?php echo $user->user_city; ?></td>
                        <td><?php echo $user->user_role; ?></td>
                        <td><?php echo $user->user_status; ?></td>
                        <!-- <td>
                          <a href="<?php echo base_url(); ?>admin/admin/edit_user/<?php echo $user->user_id; ?>" class="btn btn-primary btn-circle btn-sm">
                            <i class="fas fa-edit"></i>
                          </a>
                        </td> -->
                        <td>
                          <a href="<?php echo base_url(); ?>admin/admin/delete_user/<?php echo $user->user_id; ?>" class="btn btn-danger btn-circle btn-sm delete_item">
                            <i class="fas fa-trash"></i>
                          </a>
                        </td>
                        <td>
                          <?php if($user->user_status !== 'blocked' && $user->user_email !== $this->session->userdata('user_email')): ?>
                            <a href="<?php echo base_url(); ?>admin/admin/block_user/<?php echo $user->user_id; ?>" class="btn btn-danger btn-circle btn-sm delete_item">
                              <i class="fas fa-ban"></i>
                            </a>
                          <?php elseif($user->user_email !== $this->session->userdata('user_email')): ?>
                            <a href="<?php echo base_url(); ?>admin/admin/unblock_user/<?php echo $user->user_id; ?>" class="btn btn-success btn-circle btn-sm delete_item">
                              <i class="fas fa-unlock-alt"></i>
                            </a>
                          <?php endif; ?>
                        </td>
                      </tr>
                    <?php  endforeach; ?>
                  <?php else: ?>
                    <!-- IN CASE OF ZERO USERS -->
                  <?php endif; ?>
                  <!-- <tr>
                    <td colspan="4"><i>No categories added yet!</i></td>
                  </tr> -->
                </tbody>
              </table>
            </div>
          </div>
<?php $this->load->view('admin/includes/footer'); ?>