<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="qaisar">
    <meta name="generator" content="qaisar">
    <meta name="robots" content="noindex, nofollow">
    <title>Ecommerce | Checkout</title>

    <link rel="canonical" href="<?php echo base_url(); ?>Cart/checkout/">

    <!-- ANGULAR JS -->
    <script src="<?php echo base_url(); ?>Assets/js/angular.min.js"></script>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>Assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- TAB ICON -->
    <link rel="icon" href="<?php echo base_url(); ?>Assets/shopping-cart.png">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
  </head>
  <body class="bg-light">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="<?php echo base_url(); ?>">Ecommerce</a>
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
          <li class="nav-item">
            <!-- <a class="nav-link" href="#">About</a> -->
          </li>
          <li class="nav-item">
            <!-- <a class="nav-link" href="#">Services</a> -->
          </li>
          <li class="nav-item">
            <!-- <a class="nav-link" href="#">Contact</a> -->
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container mt-4" ng-app="checkout" ng-controller="checkoutCtrl">
  <div class="py-5 text-center">
    <!-- <h1 class="display-3 d-block mx-auto mb-4">Ecommerce</h1> -->
    <?php if (isset($message)) echo $message; ?>
    <!-- <img class="d-block mx-auto mb-4" src="/docs/4.3/Assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> -->
    <h2>Checkout form</h2>
    <!-- <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p> -->
  </div>

  <div class="row">
    <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Your cart</span>
        <span class="badge badge-secondary badge-pill">{{ products.length }}</span>
      </h4>
      <ul class="list-group mb-3">
        <li class="list-group-item d-flex justify-content-between lh-condensed" ng-repeat="product in products">
          <div>
            <h6 class="my-0">{{ product.product_name }}</h6>
            <small class="text-muted">{{ product.product_description }}</small>
          </div>
          <span class="text-muted">${{ product.product_price }}</span>
        </li>
        <!-- <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Second product</h6>
            <small class="text-muted">Brief description</small>
          </div>
          <span class="text-muted">$8</span>
        </li> -->
        <!-- <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Third item</h6>
            <small class="text-muted">Brief description</small>
          </div>
          <span class="text-muted">$5</span>
        </li> -->
        <li class="list-group-item d-flex justify-content-between">
          <span>Total (USD)</span>
          <strong>${{ sum_of_product_prices }}</strong>
        </li>
      </ul>

      <!-- <form class="card p-2">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Promo code">
          <div class="input-group-append">
            <button type="submit" class="btn btn-secondary">Redeem</button>
          </div>
        </div>
      </form> -->
    </div>
    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Billing address</h4>
      <form class="needs-validation" novalidate action="<?php echo base_url(); ?>Cart/save_order" method="POST">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">First name</label>
            <input type="text" class="form-control" id="firstName" name="first_name" placeholder="" value="" required>
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Last name</label>
            <input type="text" class="form-control" id="lastName" name="last_name" placeholder="" value="" required>
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="username">Username</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">@</span>
            </div>
            <input type="text" class="form-control" id="username" name="user_name" placeholder="Username" required>
            <div class="invalid-feedback" style="width: 100%;">
              Your username is required.
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="email">Email <span class="text-muted">(Optional)</span></label>
          <input type="email" class="form-control" id="email" name="user_email" placeholder="you@example.com">
          <div class="invalid-feedback">
            Please enter a valid email address for shipping updates.
          </div>
        </div>

        <div class="mb-3">
          <label for="address">Address</label>
          <input type="text" class="form-control" id="address" name="user_address" placeholder="1234 Main St" required>
          <div class="invalid-feedback">
            Please enter your shipping address.
          </div>
        </div>

        <!-- <div class="mb-3">
          <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
          <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
        </div> -->

        <div class="row">
          <div class="col-md-5 mb-3">
            <label for="country">Country</label>
            <select class="custom-select d-block w-100" id="country" name="country" required>
              <option value="">Choose...</option>
              <option>United States</option>
            </select>
            <div class="invalid-feedback">
              Please select a valid country.
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <label for="state">State</label>
            <select class="custom-select d-block w-100" id="state" name="state" required>
              <option value="">Choose...</option>
              <option>California</option>
            </select>
            <div class="invalid-feedback">
              Please provide a valid state.
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="zip">Zip</label>
            <input type="text" class="form-control" id="zip" name="zip_code" placeholder="" required>
            <div class="invalid-feedback">
              Zip code required.
            </div>
          </div>
        </div>
        <!-- <hr class="mb-4"> -->
        <!-- <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="same-address">
          <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
        </div>
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="save-info">
          <label class="custom-control-label" for="save-info">Save this information for next time</label>
        </div> -->
        <hr class="mb-4">

        <h4 class="mb-3">Payment</h4>

        <div class="d-block my-3">
          <div class="custom-control custom-radio">
            <input id="credit" name="paymentMethod" value="credit_card" type="radio" class="custom-control-input" checked required>
            <label class="custom-control-label" for="credit">Credit card</label>
          </div>
          <div class="custom-control custom-radio">
            <input id="debit" name="paymentMethod" value="debit_card" type="radio" class="custom-control-input" required>
            <label class="custom-control-label" for="debit">Debit card</label>
          </div>
          <div class="custom-control custom-radio">
            <input id="paypal" name="paymentMethod" value="paypal" type="radio" class="custom-control-input" required>
            <label class="custom-control-label" for="paypal">PayPal</label>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="cc-name">Name on card</label>
            <input type="text" class="form-control" id="cc-name" name="name_on_cc" placeholder="" required>
            <small class="text-muted">Full name as displayed on card</small>
            <div class="invalid-feedback">
              Name on card is required
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="cc-number">Credit card number</label>
            <input type="text" class="form-control" id="cc-number" name="cc_number" placeholder="" required>
            <div class="invalid-feedback">
              Credit card number is required
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 mb-3">
            <label for="cc-expiration">Expiration</label>
            <input type="text" class="form-control" id="cc-expiration" name="cc_expiration"  placeholder="" required>
            <div class="invalid-feedback">
              Expiration date required
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="cc-cvv">CVV</label>
            <input type="text" class="form-control" id="credit_card_cvv" name="cc_cvv" placeholder="" required>
            <div class="invalid-feedback">
              Security code required
            </div>
          </div>
        </div>
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
      </form>
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

  <!-- <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2017-2019 Company Name</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer> -->
</div>
  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Ecommerce <?php echo date("Y"); ?></p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="<?php echo base_url(); ?>Assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>Assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>Assets/js/form-validation.js"></script>

<script>
// ANGULAR APP
  var app = angular.module('checkout', []);
  app.controller('checkoutCtrl', function($scope, $http) {
    $http.get("<?php echo base_url(); ?>Cart/products_json_format")
    .then(function(response) {
      $scope.products = response.data.products;
      $scope.sum_of_product_prices = 0;
      $scope.products.map(function(product) {
        $scope.sum_of_product_prices += Number(product.product_price);
      });
    });
  });
</script>
</body>
</html>