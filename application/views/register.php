<?php $this->load->view('includes/header.php'); ?>
	<div class="container">
	<div class="row">
		<?php $this->load->view('includes/sidebar.php'); ?>

		<div class="span9">		
			<div class="well well-small">
			<h4>Create new account:</h4>
			<div class="row-fluid">
				<form action="<?php echo base_url('register'); ?>" method="POST">
					<div class="form-group">
						<label for="user_name">User name:</label>
						<input type="text" class="form-control" id="user_name" name="user_name">
					</div>

					<div class="form-group">
						<label for="user_email">User email:</label>
						<input type="text" class="form-control" id="user_email" name="user_email">
					</div>

					<div class="form-group">
						<label for="user_city">User city:</label>
						<input type="text" class="form-control" id="user_city" name="user_city">
					</div>

					<div class="form-group">
						<label for="password">Password:</label>
						<input type="password" class="form-control" id="password" name="password">
					</div>

					<div class="form-group">
						<label for="confirm_password">Confirm password:</label>
						<input type="password" class="form-control" id="confirm_password" name="confirm_password">
					</div>

					<input type="submit" value="Register" class="btn btn-primary btn-xs" name="register">
				</form>

				<a href="<?php echo base_url(); ?>login">Already have an account? Login</a>
		  </div>
		</div>
		</div>
		</div>
	</div>
<?php $this->load->view('includes/footer.php'); ?>