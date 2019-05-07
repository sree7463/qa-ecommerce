<?php $this->load->view('includes/header'); ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
	  <div class="card-header bg-dark text-light">
		  <i class="fa fa-shopping-cart" aria-hidden="true"></i>
		  Shipping cart
		</div>

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <?php 
            $home_active = $favourites_active = $cart_active = $order_active = false;
            if (stripos($_SERVER['REQUEST_URI'], "home") > 0) {
              $home_active = true;
            } else if (stripos($_SERVER['REQUEST_URI'], "favourites") > 0) {
              $favourites_active = true;
            } else if (stripos($_SERVER['REQUEST_URI'], "cart") > 0) {
              $cart_active = true;
            } else if (stripos($_SERVER['REQUEST_URI'], "order") > 0) {
              $order_active = true;
            }
          ?>
          <?php if ($this->session->userdata('user_role') == 'admin'): ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>admin">Admin</a>
          </li>
          <?php endif; ?>
          <li class="nav-item <?php echo ($home_active)? "active": ""; ?>">
            <a class="nav-link" href="<?php echo base_url(); ?>home">Home
              <?php if($home_active): ?>
                <span class="sr-only">(current)</span>
              <?php endif; ?>
            </a>
          </li>
          <li class="nav-item <?php echo ($favourites_active)? "active": ""; ?>">
            <a class="nav-link" href="<?php echo base_url(); ?>User/favourites">Favourite</a>
            <?php if ($favourites_active): ?>
              <span class="sr-only">(current)</span>
            <?php endif; ?>
          </li>
          <li class="nav-item <?php echo ($cart_active)? "active": ""; ?>">
            <a class="nav-link" href="<?php echo base_url(); ?>Cart">Cart</a>
            <?php if ($cart_active): ?>
              <span class="sr-only">(current)</span>
            <?php endif; ?>
          </li>
          <li class="nav-item <?php echo ($order_active)? "active": ""; ?>">
            <a class="nav-link" href="<?php echo base_url(); ?>Order">Orders</a>
            <?php if ($order_active): ?>
              <span class="sr-only">(current)</span>
            <?php endif; ?>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>User/logout">Logout</a>
          </li>
        </ul>
      </div>
  </div>
</nav>

<div class="container">
	<div class="card shopping-cart" ng-app="shoppingCart" ng-controller="shoppingCartCtrl">
		<div class="alert alert-success alert-danger" ng-if="products.length < 1">
		  <button type="button" class="close" data-dismiss="alert">&times;</button>
		  <strong>Error!</strong> No product added to cart yet!
		</div>
    <div class="card-body" ng-repeat="product in products">
			<div class="row">
        <div class="col-12 col-sm-12 col-md-2 text-center">
                <img class="img-responsive" src="http://placehold.it/120x80" alt="prewiew" width="120" height="80">
        </div>
        <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
            <h4 class="product-name"><strong>{{ product.product_name }}</strong></h4>
            <h4>
                <small>{{ product.product_meta_description }}</small>
            </h4>
        </div>
        <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">
            <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">
                <h6><strong>${{ product.product_price }}</strong></h6>
            </div>
            <div class="col-2 col-sm-2 col-md-2 text-right">
                <button ng-click="remove_product($index)" type="button" class="btn btn-outline-danger btn-xs">
                  <i class="fas fa-minus-circle remove_product_cookie"></i>
                </button>
            </div>
        </div>
      </div>
      <hr>
    </div>
    <div class="card-footer" ng-if="products.length > 0">
      <div class="float-right" style="margin: 10px">
        <a href="<?php echo base_url(); ?>Cart/checkout" class="btn btn-success btn-sm float-right">Checkout</a>
          <div class="float-right" style="margin: 5px">
              Total price: <b>${{ sum_of_product_prices }}</b>
          </div>
      </div>
    </div>
  </div>
</div><br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php $this->load->view('includes/footer'); ?>