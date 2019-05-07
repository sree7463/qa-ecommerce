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
		<!-- ORDERS -->
		<h1 class="title"><span>My account</span></h1>
		<style>
.my_account_orders {
  margin-bottom: 5.0em;
}

table.woocommerce-orders-table {
	width: 100%;
  max-width: 100%;
  background-color: transparent;
	border-collapse: collapse;
	border-spacing: 0;
}

table.woocommerce-orders-table thead {
    border-bottom: 1px solid #e1e1e1;
}

table.woocommerce-orders-table thead th {
	text-transform: uppercase;
	color: #222222;
	padding-top: 1.9em;
	padding-bottom: 1em;
	font-family: hk-grotesk;
	font-size: 14px;
	font-style: normal;
	font-weight: 400;
	text-align: left;
}

table.woocommerce-orders-table th:first-child, table.woocommerce-orders-table td:first-child {
  padding-left: 0;
}

table.woocommerce-orders-table tbody tr td {
	padding-top: 1em;
	padding-left: 0;
	text-transform: uppercase;
	font-size: .9rem;
	color: #222222;
	vertical-align: middle;
	font-family: hk-grotesk;
	font-size: 12.6px;
	font-style: normal;
	font-weight: 400;
  padding-bottom: 8.946px;
	padding-left: 0px;
	padding-right: 8.946px;
	padding-top: 12.6px;
	text-align: left;
}

table.woocommerce-orders-table thead th:last-child {
	text-align: right;
}

table.woocommerce-orders-table tbody tr td:last-child {
	text-align: right;
	padding-right: 0px;
}

.my_account_orders td .button:first-of-type {
  margin-left: 0;
}
.my_account_orders td .button {
  margin-left: 5px;
  margin-bottom: 3px;
  margin-top: 3px;
}
.my_account_orders .view {
  background-color: #222222;
  border: 1px solid #222222;
  color: #fff;
  padding: 10.5px 30.8px 10.5px 30.8px;
  font: normal 400 11.9px hk-grotesk;
  transition: all 0.2s ease-out;
}

.my_account_orders .view:hover {
  background-color: #4c4c4c;
  border-color: #4c4c4c;
  color: #fff;
  text-decoration: none;
}
		</style>
		<table class="woocommerce-orders-table woocommerce-MyAccount-orders shop_table shop_table_responsive my_account_orders account-orders-table">
		<thead>
			<tr>
				<th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-number"><span class="nobr">Order</span></th>
				<th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-date"><span class="nobr">Date</span></th>
				<th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-status"><span class="nobr">Status</span></th>
				<th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-total"><span class="nobr">Total</span></th>
				<th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-actions"><span class="nobr">Actions</span></th>
			</tr>
		</thead>

		<tbody>
			<tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-on-hold order">
				<td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-number" data-title="Order">
					<a href="https://xstore.8theme.com/demos/2/electron01/my-account/view-order/5283/">#5283</a>
				</td>
				
				<td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-date" data-title="Date">
				<time datetime="2019-04-29T11:39:59+00:00">April 29, 2019</time>

													</td>
											<td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-status" data-title="Status">
															On hold
													</td>
											<td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-total" data-title="Total">
															<span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">£</span>6,345.00</span> for 4 items
													</td>
											<td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-actions" data-title="Actions">
															<a href="https://xstore.8theme.com/demos/2/electron01/my-account/view-order/5283/" class="woocommerce-button button view">View</a>													</td>
									</tr>
					</tbody>
	</table>

		<!-- <div class="woocommerce-MyAccount-content">
			<div class="woocommerce-notices-wrapper"></div>
			<div class="woocommerce-message woocommerce-message--info woocommerce-Message woocommerce-Message--info woocommerce-info">
				<i class="et-icon et-checked"></i><a class="woocommerce-Button button" href="<?= base_url(); ?>">
					Go shop		</a>
				No order has been made yet.	</div>

		</div> -->
		<!-- ../ ORDERS -->
  </div>
</div>

<?php $this->load->view('includes/footer'); ?>