<nav class="woocommerce-MyAccount-navigation">
		<?php 
		$dashboard_class = $orders_class = $addresses_class = $account_details_class = '';
			if ($this->uri->segment(2) == 'dashboard') {
				$dashboard_class = 'is_active';
			}
			if ($this->uri->segment(2) == 'orders') {
				$orders_class = 'is_active';
			}
			if ($this->uri->segment(2) == 'addresses') {
				$addresses_class = 'is_active';
			}
			if ($this->uri->segment(2) == 'account_details') {
				$account_details_class = 'is_active';
			}
		?>
	<ul>
		<li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--dashboard <?= $dashboard_class ?>">
			<a href="<?php echo base_url('user/dashboard'); ?>">Dashboard</a>
		</li>
		<li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--orders <?= $orders_class; ?>">
			<a href="<?php echo base_url('user/orders'); ?>">Orders</a>
		</li>
		<!-- <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--downloads">
			<a href="https://xstore.8theme.com/demos/2/electron01/my-account/downloads/">Downloads</a>
		</li> -->
		<li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-address <?= $addresses_class; ?>">
			<a href="<?php echo base_url('user/addresses'); ?>">Addresses</a>
		</li>
		<li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-account <?= $account_details_class; ?>">
			<a href="<?php echo base_url('user/account_details'); ?>">Account details</a>
		</li>
		<li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--customer-logout">
			<a href="<?php echo base_url('user/logout'); ?>">Logout</a>
		</li>
	</ul>
</nav>