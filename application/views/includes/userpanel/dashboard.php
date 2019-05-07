<?php $this->load->view('includes/header'); ?>
<br>
<div class="container">
	
<div class="row">
	<style>

	</style>
  <div class="span3">
<?php $this->load->view('includes/userpanel/left_nav'); ?>
  </div>
  <div class="span9">
		<h1 class="title"><span>My account</span></h1>
		<div class="woocommerce-MyAccount-content">
			<div class="woocommerce-notices-wrapper"></div>
			<p>Hello <strong><?= $this->session->userdata('user_name'); ?></strong> (not <strong><?= $this->session->userdata('user_name'); ?></strong>? <a href="<?= base_url('user/logout'); ?>">Log out</a>)</p>

			<p>From your account dashboard you can view your <a href="">recent orders</a>, manage your <a href="">shipping and billing addresses</a>, and <a href="">edit your password and account details</a>.</p>

		</div>
  </div>
</div>

<?php $this->load->view('includes/footer'); ?>