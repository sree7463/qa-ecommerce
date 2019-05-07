<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login | Ecommerce</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="noindex, nofollow">
	<link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/bootstrap.min.css">
	<script src="<?php echo base_url(); ?>Assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>Assets/js/popper.min.js"></script>
	<script src="<?php echo base_url(); ?>Assets/js/bootstrap.min.js"></script>
	<link rel="icon" href="<?php echo base_url(); ?>Assets/leaf.png">
	<style>
		body {
		  padding-top: 54px;
		}
		.error {
		  color: red;
		  margin-left: 5px;
		}
		label.error {
		  display: inline;
		}
		.fr {
		    float: right;
		}
	</style>
</head>
<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="">
      <!-- <img src="" alt=""> -->
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <?php if (stripos($_SERVER['REQUEST_URI'],"login") > 0 || stripos($_SERVER['REQUEST_URI'],"register") < 1): ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url(); ?>register">Register</a>
        </li>
        <?php elseif (stripos($_SERVER['REQUEST_URI'],"register") > 0): ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url(); ?>login">Login</a>
        </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
<!-- Page Content -->

<div class="container mt-2">
	<div class="row">
		<div class="col-sm-4">
			<h3>Login:</h3>
			<?php 
				if (isset($login)) {
					echo $login;
				}
			?>
			<form action="<?php echo base_url(); ?>login" method="POST">
				<div class="form-group">
					<label for="user_email">Email:</label>
					<input type="text" class="form-control" id="user_email" name="user_email" required>
				</div>
				<div class="form-group">
					<label for="user_password">Password:</label>
					<input type="password" class="form-control" id="user_password" name="user_password" required>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-primary btn-sm" value="Login" name="login">
				</div>
			</form>
		</div>
	</div>
</div>

<script>
$(document).ready(function() {
	$('form[name="register_form"]').submit(function(e) {
		$(".error").remove();

		var name = $('#name').val();
		var email = $('#email').val();
		var city = $('#city').val();
		var address = $('#address').val();
		var password = $('#password').val();
		var confirm_password = $('#confirm_password').val();

		if (name == "" || email == "" || city == "" || address == "" || password == "" || confirm_password == "") {
			$('form[name="register_form"]').prepend(`<span class="error">* All fields are required!</span>`);
			e.preventDefault();
		} else if (name.length < 5) {
			$('#name').after(`<span class="error">Name must have 5 characters!</span>`);
			e.preventDefault();
		} else if (name.length > 20) {
			$('#name').after(`<span class="error">Name must not exceed 20 characters!</span>`);
			e.preventDefault();
		} else if (password != confirm_password) {
			$('#confirm_password').after('<span class="error">Password must be same!</span>');
			e.preventDefault();
		}
	});
});
</script>
</body>
</html>