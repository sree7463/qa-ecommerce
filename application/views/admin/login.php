<!DOCTYPE html>
<html lang="en">
<head>
<title>ECOMMERCE | ADMIN PANEL | LOGIN</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
<link rel="icon" type="image/png" href="<?php echo base_url('Assets/admin/login/favicon.ico'); ?>"/>
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('Assets/admin/login/bootstrap.min.css'); ?>">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('Assets/admin/login/font-awesome/css/font-awesome.min.css'); ?>">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('Assets/admin/login/Linearicons/Web Font/style.css'); ?>">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('Assets/admin/login/animate.css'); ?>">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('Assets/admin/login/hamburgers.min.css'); ?>">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('Assets/admin/login/animsition.min.css'); ?>">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('Assets/admin/login/select2.min.css'); ?>">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('Assets/admin/login/daterangepicker.css'); ?>">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('Assets/admin/login/util.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('Assets/admin/login/main.css'); ?>">
<!--===============================================================================================-->
</head>
<body>
<div class="limiter">
<div class="container-login100">
<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
<form class="login100-form validate-form" method="POST" action="<?php echo base_url('admin/login'); ?>">
<span class="login100-form-title p-b-33">
Account Login
</span>

<?php if ($this->session->flashdata('admin_login_failed')): ?>
<div class="alert alert-danger">
<?php echo $this->session->flashdata('admin_login_failed'); ?>
</div>
<?php endif; ?>

<div class="wrap-input100">
<input class="input100" type="text" name="email" placeholder="Email" required="true">
<span class="focus-input100-1"></span>
<span class="focus-input100-2"></span>
</div>

<div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
<input class="input100" type="password" name="pass" placeholder="Password" required="true">
<span class="focus-input100-1"></span>
<span class="focus-input100-2"></span>
</div>

<div class="container-login100-form-btn m-t-20">
<button class="login100-form-btn" name="admin_login" type="submit">
Sign in
</button>
</div>

<!-- <div class="text-center p-t-45 p-b-4">
<span class="txt1">
Forgot
</span>

<a href="#" class="txt2 hov1">
Username / Password?
</a>
</div> -->

<!-- <div class="text-center">
<span class="txt1">
Create an account?
</span>

<a href="#" class="txt2 hov1">
Sign up
</a>
</div> -->
</form>
</div>
</div>
</div>
<!--===============================================================================================-->
<script src="<?php echo base_url('Assets/js/jquery.min.js'); ?>"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url('Assets/admin/login/animsition.min.js'); ?>"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url('Assets/js/popper.min.js'); ?>"></script>
<script src="<?php echo base_url('Assets/js/bootstrap.min.js'); ?>"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url('Assets/admin/login/select2.min.js'); ?>"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url('Assets/admin/login/moment.min.js'); ?>"></script>
<script src="<?php echo base_url('Assets/admin/login/daterangepicker.js'); ?>"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url('Assets/admin/login/countdowntime.js'); ?>"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url('Assets/admin/login/main.js'); ?>"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" type="dab18502ec4607cd0462b61d-text/javascript"></script> -->
<!-- <script type="dab18502ec4607cd0462b61d-text/javascript">
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'UA-23581568-13');
</script> -->
<script src="<?php echo base_url('Assets/admin/login/rocket-loader.min.js'); ?>"></script>
</body>
</html>