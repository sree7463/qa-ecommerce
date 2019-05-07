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
		        <h1 class="h3 mb-0 text-gray-800">General setting:</h1>
		      </div>

		      <!-- Content Row -->
		      <div class="row">
		      	<div class="col-md-12">
		      		<?php if (isset($message)) echo $message; ?>
		      		<form action="<?php echo base_url(); ?>admin/Admin/setting" method="POST" name="general_setting_form">
		      			<div class="row">
		      				<div class="col-4">
			      				<div class="form-group">
			      					<label for="meta_title">Meta title:</label>
			      					<div class="input-group mb-3">
											  <input type="text" class="form-control" name="meta_title" id="meta_title" value="<?php echo $general_setting->meta_title; ?>">
											  <div class="input-group-append">
											    <span class="input-group-text" id="meta_title_count"><?php echo strlen($general_setting->meta_title); ?></span>
											  </div>
											</div>
			      				</div>

			      				<div class="form-group">
			      					<label for="meta_description">Meta description:</label>
			      					<div class="input-group mb-3">
											  <input type="text" class="form-control" name="meta_description" id="meta_description" value="<?php echo $general_setting->meta_description; ?>">
											  <div class="input-group-append">
											    <span class="input-group-text" id="meta_description_count"><?php echo strlen($general_setting->meta_description); ?></span>
											  </div>
											</div>
			      				</div>

			      				<div class="form-group">
			      					<label for="meta_tags">Meta keywords:</label>
			      					<div class="input-group mb-3">
											  <input type="text" class="form-control wcount" data-role="" name="meta_tags" id="meta_tags" value="<?php echo $general_setting->meta_tags; ?>">
											  <div class="input-group-append">
		                      <span class="input-group-text"><?php echo count(explode(',', $general_setting->meta_tags)); ?></span>
		                    </div>
		                  </div>
			      				</div>

			      				<div class="form-group">
			      					<input type="submit" class="btn btn-primary btn-sm" value="Submit" name="general_setting">
			      				</div>

			      			</div>
			      			<div class="col-4">
			      				<!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, quisquam.</p> -->
			      			</div>
		      			</div>
		      		</form>
		      	</div>
		      </div>


<?php $this->load->view('admin/includes/footer'); ?>