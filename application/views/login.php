<?php $this->load->view('includes/header.php'); ?>
	<div class="container">
	<div class="row">
		<?php $this->load->view('includes/sidebar.php'); ?>

		<div class="span9">		
			<div class="well well-small">
			<h4>Login to your account: </h4>
			<?php if ($this->session->flashdata('registered')): ?>
			<p class="alert alert-success"><?php echo $this->session->flashdata('registered'); ?></p>
			<?php endif; ?>
			<div class="row-fluid">
				<form action="<?php echo base_url(); ?>login" method="POST">
					<div class="form-group">
						<label for="username">Email:</label>
						<input type="email" autocomplete="username" class="form-control" id="email" name="user_email">
					</div>

					<div class="form-group">
						<label for="password">Password:</label>
						<input type="password" autocomplete="current-password" class="form-control" id="password" name="user_password">
					</div>

					<input type="submit" value="submit" class="btn btn-primary btn-xs" name="login">
				</form>

				<a href="<?php echo base_url(); ?>register">Don't have an account? Register</a>
		  </div>
		</div>
		</div>
		</div>
	</div>
<?php $this->load->view('includes/footer.php'); ?>