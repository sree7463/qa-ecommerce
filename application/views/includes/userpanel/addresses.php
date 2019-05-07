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
		<!-- ADDRESSES -->
		<h1 class="title"><span>My account</span></h1>
		<div class="woocommerce-MyAccount-content">
			<div class="woocommerce-notices-wrapper"></div>
			
			<p>The following addresses will be used on the checkout page by default.</p>

			<div class="u-columns woocommerce-Addresses col2-set addresses">
				<div class="u-column1 col-1 woocommerce-Address">
					<header class="woocommerce-Address-title title">
						<h3>Billing address</h3>
						<a href="<?php echo base_url('user/addresses/edit/billing-address'); ?>" class="edit">Edit</a>
					</header>
					<address>You have not set up this type of address yet.</address>
				</div>
				<div class="u-column2 col-2 woocommerce-Address">
					<header class="woocommerce-Address-title title">
						<h3>Shipping address</h3>
						<a href="<?php echo base_url('user/addresses/edit/shipping-address'); ?>" class="edit">Edit</a>
					</header>
					<address>You have not set up this type of address yet.</address>
				</div>
			</div>
		</div>
		<!-- ../ ADDRESSES -->
  </div>
</div>

<?php $this->load->view('includes/footer'); ?>