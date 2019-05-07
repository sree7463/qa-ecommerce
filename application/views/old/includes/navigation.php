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