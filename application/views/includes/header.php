<?php 

if (isset($category)) {
	$meta_title = $category->category_meta_title;
	$meta_description = $category->category_meta_description;
	$meta_keywords = $category->category_meta_tags;
} else if (isset($product)) {
	$meta_title = $product->product_meta_title;
	$meta_description = $product->product_meta_description;
	$meta_keywords = $product->product_meta_keywords;
} else {
	$meta_title = $general_setting->meta_title;
	$meta_description = $general_setting->meta_description;
	$meta_keywords = $general_setting->meta_tags;
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo $meta_title; ?></title>
    <noscript>
		  <meta http-equiv="refresh" content="0; URL=<?php echo base_url('nojs'); ?>">
		</noscript>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $meta_description; ?>">
    <meta name="author" content="<?php echo $meta_keywords; ?>">
<!--Less styles -->
   <!-- Other Less css file //different less files has different color scheam
	<link rel="stylesheet/less" type="text/css" href="themes/less/simplex.less">
	<link rel="stylesheet/less" type="text/css" href="themes/less/classified.less">
	<link rel="stylesheet/less" type="text/css" href="themes/less/amelia.less">  MOVE DOWN TO activate
	-->
	<!--<link rel="stylesheet/less" type="text/css" href="themes/less/bootshop.less">
	<script src="themes/js/less.js" type="text/javascript"></script> -->
<!-- Bootstrap style --> 

  <link id="callCss" rel="stylesheet" href="<?php echo base_url(); ?>Assets/themes/bootshop/bootstrap.min.css" media="screen"/>
  <link href="<?php echo base_url(); ?>Assets/themes/css/base.css" rel="stylesheet" media="screen"/>
  <!-- OWL CAROUSEL -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/owl.theme.default.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/owl.carousel.min.css">

	<!-- DASHICONS -->
	<link href="//s.w.org/wp-includes/css/dashicons.css?20150710" rel="stylesheet" type="text/css">

	<!-- JQUERY UI -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>Assets/jquery-ui/jquery-ui.min.css" type="text/css" />

	
<!-- Bootstrap style responsive -->	
	<link href="<?php echo base_url(); ?>Assets/themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
	<!-- <link href="<?php echo base_url(); ?>Assets/themes/css/font-awesome.css" rel="stylesheet" type="text/css"> -->

	<!-- FONTAWESOME ICONS -->
	<link rel="stylesheet" href="<?php echo base_url('Assets/css/fontawesome/css/all.min.css'); ?>">

	<!-- SELECT2 CSS -->
	<!-- <link rel="stylesheet" href="<?php echo base_url('Assets/select2/dist/css/select2.min.css'); ?>"> -->

	<!-- COUNTRY SELECT JS -->
	<link rel="stylesheet" href="<?php echo base_url('Assets/country-select/build/css/countrySelect.css'); ?>">

<!-- Google-code-prettify -->	
	<link href="<?php echo base_url(); ?>Assets/themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
<!-- fav and touch icons -->
  <link rel="shortcut icon" href="<?php echo base_url(); ?>Assets/themes/images/ico/favicon.ico">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url(); ?>Assets/themes/images/ico/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url(); ?>Assets/themes/images/ico/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url(); ?>Assets/themes/images/ico/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="<?php echo base_url(); ?>Assets/themes/images/ico/apple-touch-icon-57-precomposed.png">

	<style type="text/css" id="enject"></style>
	<style>
		/* DEFINE FONTS HERE */
		@font-face {
		  font-family: 'Whitney';
		  src: url('Assets/fonts/whitney/whitney-medium.woff');
		  src: url('Assets/fonts/whitney/whitney-medium.woff') format('woff'),
		}
		.ribbon {
		  position: absolute;
		  right: -5px; top: -5px;
		  z-index: 1;
		  overflow: hidden;
		  width: 75px; height: 75px;
		  text-align: right;
		}
		.ribbon span {
		  font-size: 10px;
		  font-weight: bold;
		  color: #FFF;
		  text-transform: uppercase;
		  text-align: center;
		  line-height: 20px;
		  transform: rotate(45deg);
		  -webkit-transform: rotate(45deg);
		  width: 100px;
		  display: block;
		  background: #79A70A;
		  background: linear-gradient(#9BC90D 0%, #79A70A 100%);
		  box-shadow: 0 3px 10px -5px rgba(0, 0, 0, 1);
		  position: absolute;
		  top: 19px; right: -21px;
		}
		.ribbon span::before {
		  content: "";
		  position: absolute; left: 0px; top: 100%;
		  z-index: -1;
		  border-left: 3px solid #79A70A;
		  border-right: 3px solid transparent;
		  border-bottom: 3px solid transparent;
		  border-top: 3px solid #79A70A;
		}
		.ribbon span::after {
		  content: "";
		  position: absolute; right: 0px; top: 100%;
		  z-index: -1;
		  border-left: 3px solid transparent;
		  border-right: 3px solid #79A70A;
		  border-bottom: 3px solid transparent;
		  border-top: 3px solid #79A70A;
		}

		.price-filter-inp {
			padding: 5px !important;
			min-height: 36px !important;
			margin-bottom: 0px !important;
			font-weight: bold !important;
			color: #C60 !important;
			width: 260px;
		}

		input[type=text][readonly] {
			background-color: #DDD;
			cursor: default;
		}
		}
		/* FOR THE PROPER POSITIONING OF PRODUCTS */
		img {
	    width: auto\9;
	    height: auto;
	    max-width: 100%;
	    vertical-align: middle;
	    border: 0;
	    -ms-interpolation-mode: bicubic;
		}

		.thumbnail>a {
	    display: block;
	    text-align: center;
	    height: 200px;
	    display: flex;
	    justify-content: center;
	    align-items: center;
	    align-content: center;
	    overflow: hidden;
		}

		.thumbnail {
	    background: #fff;
	    position: relative;
	    border: 1px solid #eee;
	    height: 300px;
	    display: flex;
	    flex-direction: column;
	    justify-content: space-between;
	    line-height: 20px;
		}
		/* ../ FOR THE PROPER POSITIONING OF PRODUCTS */
		.thumbnail > a {
			display: flex;
			justify-content: center;
			align-content: center; 
			align-items:center;
			height: 200px; 
			overflow: hidden;
		}
		/* FAVOURITE PRODUCT BUTTON */
		.fa-heart {
			color: #d0caca;
			font-size: 18px;
		}
		.fa-heart:hover {
			color: #f1c5cf;
		}
		/* ../ FAVOURITE PRODUCT BUTTON */
		/* PRODUCT TITLE STYLE */
		.pdp-title {
		  font-family: Whitney;
		  color: #282C3F;
		  margin-top: 0px;
		  margin-bottom: 0px;
		  padding: 0px 20px 0px 0px;
		  font-size: 24px;
		  font-weight: 500;
		  line-height: 1;
		}
		/* ../ PRODUCT TITLE STYLE */
		/* PRODUCT PRICE STYLE */
		.pdp-price {
		  font-size: 24px;
		  font-weight: 600;
		  line-height: 1;
		  color: #282C3F;
		  margin-right: 12px;
      font-family: Whitney;
		}
		/* ../ PRODUCT PRICE STYLE */
		/* SEARCH PAGE - SEARCH MESSAGE */
		.pro_search_results {
		  font-size: 21px;
		  color: #F08221;
		  /*float: left;*/
		  text-transform: uppercase;
		  display: block;
		}
		/* FAVOURITE PRODUCT */
		.favourite-product {
			color: #ff0000;
		}
		/* INVOICE ITEM */
		.invoice__item {
		  padding: 10px;
		  background-color: #f8f8f8;
		  margin-bottom: 10px;
		  display: flex;
		}
		.invoice__item .label {
		  flex: 0 0 110px;
		  color: #555;
		  font-size: 14px;
		  margin-right: 20px;
		  background: transparent;
		}
		.invoice__item .value {
			font-family: "Open Sans", sans-serif;
		  flex: 1;
		}
		/* PAGINATION ACTIVE STYLE */
		.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
		  z-index: 3;
		  color: #fff;
		  cursor: default;
		  background-color: #337ab7;
		  border-color: #337ab7;
		}
		/* DISCOUNTED PRICE STYLE */
		div.og-price-cut {
		  font-size: 14px;
		  margin-right: 12px;
		  color: #F00;
		  font-weight: 400;
		  text-decoration: line-through;
		}
		/* PRODUCT PRICE STYLE */
		div.og-price {
		  font-size: 16px;
		  font-weight: bold;
		}
		/* PRICES CONTAINER */
		.prices_container {
			display: flex;
			justify-content: space-around;
			margin-top: 10px;
		}
		/* HOT PRODUCT FAV BTN CONTAINER STYLE */
		.hot_product_container {
			display: flex; 
			justify-content: center; 
			margin-top: 10px;
		}
		/* PRODUCT FAV BTN CONTAINER STYLE*/
		.fav_btn_container {
			display: flex; 
			justify-content: space-between; 
			margin-top: 10px;
		}
		/* FONT FAMILY bk-grotesk */
		@font-face {
		  font-family: hk-grotesk;
		  src: url(http://ecommerce/Assets/fonts/hk-grotesk.ttf) format("truetype");
		}
		/* HEADING STYLE IN ACCOUNT */
		.title {
		  display: block;
		  font-size: 1.7rem;
		  text-transform: uppercase;
		  text-align: center;
		  font-family: 'hk-grotesk';
		  font-weight: 400;
		}
		/* USER PANEL */
		.w3-white, .w3-hover-white:hover {
		  background-color: inherit;
		}
		.w3-card, .w3-card-2 {
		}
		.w3-sidebar {
		  height: 100%;
		}
		.w3-bar-block .w3-bar-item {
		  display: block;
		  padding: 8px 16px;
		  text-align: left;
		  border: none;
		  white-space: normal;
		  float: none;
		  outline: 0;
		}
		.w3-bar-block .w3-bar-item {
		  display: block;
		  padding: 8px 16px;
		  text-align: left;
		  border: none;
		  white-space: normal;
		  float: none;
		  outline: 0;
		}
		.w3-button {
			font-family: Verdana,sans-serif;
		  font-size: 15px;
		}
		.w3-button:hover {
			transition: 0.5s;
		  color: #000!important;
		  background-color: #ccc!important;
		}
		.w3-sidebar > a:hover {
			text-decoration: none;
		}
		.woocommerce-notices-wrapper, p {
		  font-family: hk-grotesk;
		  font-weight: 400;
		  font-style: normal;
		  color: #555555;
		  margin-bottom: 1.43rem;
		  line-height: 1.6;
		  font-size: 1.14rem;
		}
		.woocommerce-MyAccount-content strong {
		  font-weight: 400;
		}
		.woocommerce-MyAccount-content p:nth-child(2) a,.woocommerce-MyAccount-content p:nth-child(2) a:hover {
			outline: none;
			text-decoration: underline;
		  text-decoration-line: underline;
		  text-decoration-style: initial;
		  text-decoration-color: initial;
			cursor: pointer;
			color: #888888;
		}
		.woocommerce-MyAccount-content > p > a:focus, .woocommerce-MyAccount-content > p > a:hover {
			outline: none;
			text-decoration: none;
			text-decoration-skip-ink: none;
			color: #888888;
		}
		.woocommerce-info, .dokan-info, .mc4wp-info {
		  border-top-color: #1565c0 !important;
		}
		/*.woocommerce-message:before, .mc4wp-success:before {
		    color: #2e7d32;
		    content: "\e92a";
		}
		.woocommerce-info:before, .dokan-info:before, .mc4wp-info:before {
		  color: #1565c0;
		  content: "\e92a";
		}*/
		.woocommerce-info, .dokan-info, .mc4wp-info {
		  border-top-color: #1565c0 !important;
		}
		.woocommerce-message, .woocommerce-error, .woocommerce-info, .dokan-info, .mc4wp-alert {
			font-family: hk-grotesk;
		  padding: 0.79em 1.2em 0.79em calc(1.2em + 25px);
		  margin: 0 0 1.43em;
		  position: relative;
		  font-size: 1.14rem;
		  word-wrap: break-word;
		  border: 1px solid #e1e1e1;
		  border-top: 2px solid;
		  border-top-color: #2e7d32 !important;
		  border-radius: 0;
		  display: inline-block;
		  width: 100%;
		  box-sizing: border-box;
		}
		.woocommerce-message:before, .woocommerce-error:before, .woocommerce-info:before, .dokan-info:before, .mc4wp-alert:before {
		  position: absolute;
		  font-family: 'xstore-icons';
		  border-radius: 50%;
		  left: 20px;
		  padding: 0;
		  top: auto;
		  background: transparent;
		  font-style: normal;
		}
		.woocommerce-message .button, .woocommerce-error .button, .woocommerce-info .button, .dokan-info .button, .mc4wp-alert .button {
		  float: right;
		  height: auto;
		  padding: 0;
		  font-size: inherit;
		  background: transparent !important;
		  border: none !important;
		  text-decoration: none;
		  text-transform: none;
		  color: #222222;
		}
		.woocommerce-message .button, .woocommerce-error .button, .woocommerce-info .button {
		  margin-left: 15px;
		}
		.woocommerce-message .button:hover, .woocommerce-error .button:hover, .woocommerce-info .button:hover, .dokan-info .button:hover, .mc4wp-alert .button:hover {
		  color: #888888;
		}
		/* TICK ICON FOR NO ORDER MESSAGE */
		@font-face {
		  font-family: 'xstore-icons';
		  src:
		    url('../Assets/fonts/xstore-icons-light.ttf') format('truetype'),
		    url('../Assets/fonts/xstore-icons-light.woff') format('woff');
		  font-weight: normal;
		  font-style: normal;
		}
		.et-checked:before {
		  content: "\e92a";
		}
		.et-icon {
		  font-family: 'xstore-icons' !important;
		  speak: none;
		  font-style: normal;
		  font-weight: normal;
		  font-variant: normal;
		  text-transform: none;
		  line-height: 1;
		  -webkit-font-smoothing: antialiased;
		  -moz-osx-font-smoothing: grayscale;
			position: absolute;
			font-family: 'xstore-icons';
			border-radius: 50%;
			left: 20px;
			padding: 0;
			top: auto;
			background: transparent;
			font-style: normal;
		}
		.woocommerce-MyAccount-content > p {
		  font-family: hk-grotesk;
		  font-weight: 400;
		  font-style: normal;
		  color: #555555;
		  margin-bottom: 1.43rem;
		  line-height: 1.6;
		  font-size: 1.14rem;
		}
		.title {
		  display: block;
		  font-size: 1.7rem;
		  text-transform: uppercase;
		  text-align: center;
		  font-family: 'hk-grotesk';
		  font-weight: 400;
		}
		.col2-set {
		  width: 100%;
		  overflow: hidden;
		}
		.col2-set .col-1, .col2-set .col-2 {
		  width: calc(50% - 30px);
		  float: left;
		}
		.col2-set .col-1 {
		  margin-right: 60px;
		}
		.woocommerce-Address-title h3 {
			font-size: 1rem;
			display: inline-block;
			margin-bottom: 0;
			color: #222222;
			margin-top: 0;
			font-weight: 400;
			line-height: 1.1;
			margin-inline-start: 0px;
			margin-inline-end: 0px;
			text-align: left;
			text-transform: uppercase;
			font-family: hk-grotesk;
			font-weight: 400;
			font-style: normal;
		}
		.woocommerce-Address-title {
			padding: 0 0 1em 0;
			text-align: left;
			font-size: 1em;
			margin-bottom: 1em;
			text-transform: uppercase;
			border-bottom: 1px solid #e1e1e1;
			display: block;
			margin: 0;
			box-sizing: border-box;
			font-family: hk-grotesk;
			font-weight: 400;
			font-style: normal;
			color: #555555;
			line-height: 1.42857143;
			-webkit-tap-highlight-color: rgba(0,0,0,0);
		}
		.woocommerce-Address-title .edit {
			float: right;
			text-decoration: none;
			text-decoration-skip-ink: none;
			cursor: pointer;
			color: #222222;
			-webkit-transition: all 0.2s ease-out;
			transition: all 0.2s ease-out;
			line-height: 1.42857143;
			font-size: 14px;
		}

		.woocommerce-Address-title > a:hover {
			outline: none;
			color: #888888;
		}
		.woocommerce-Address > address {
			font-style: italic;
			font-size: 15.96px;
			font-family: hk-grotesk;
			font-weight: 400;
			height: 44.8px;
			line-height: 22.8px;
			color: rgb(85, 85, 85);
		}

		.form-row-first, .form-row-last {
		  float: left;
		  width: 46%;
		  padding: 0 15px 0 0;
		  overflow: visible;
		}
		.form-row-last {
			padding: 0 0 0 15px;
			float: right;
		}
		.woocommerce-form-row > label {
			display: inline-block;
			max-width: 100%;
			margin-bottom: 5px;
		}

		.woocommerce-EditAccountForm p > input[type="text"], .woocommerce-EditAccountForm p > input[type="number"], .woocommerce-EditAccountForm p > input[type="email"], .woocommerce-EditAccountForm p > input[type="search"], .woocommerce-EditAccountForm p > input[type="password"], .woocommerce-EditAccountForm p > input[type="tel"], .woocommerce-EditAccountForm p > input[type="url"] {
		  height: 2.642rem;
		  line-height: 2rem;
		  padding: 0 1.07em;
		  -webkit-appearance: none;
		  border: 1px solid #e1e1e1;
		  background-color: #fff;
		  outline: none;
		  border-radius: 0;
		  width: 100%;
		  color: #222222;
		  font-size: 1.14rem;
		  box-shadow: none;
		}
		.woocommerce-form-row p > input[type="text"]:focus {
		    box-shadow: none;
		    outline: none;
		    border-color: #555555;
		}
		.woocommerce-Input woocommerce-Input--text {
			border: 1px solid #e1e1e1;
			background-color: #fff;
			outline: none;
			border-radius: 0;
			width: 100%;
			color: #222222;
			font-size: 1.14rem;
			box-shadow: none;
		}
		input.woocommerce-Input {
		  box-shadow: none;
		  outline: none;
		  border-color: rgb(85, 85, 85);
		  font-family: hk-grotesk;
		  font-size: 15.96px;
		}

		input.woocommerce-Input:focus {
			box-shadow: none;
			outline: none;
			border-color: #555555;
		}
		fieldset {
		  border: 1px solid #e1e1e1;
		  margin: 0 0 3em;
		  padding: 1.5em 2.5em;
		  min-width: 0;
		}
		fieldset legend {
		  display: inline-block;
		  width: auto;
		}
		legend {
		  font-size: 1rem;
		  text-transform: uppercase;
		  color: #222222;
		  margin-bottom: 0;
		  border-bottom-style: none;
		  font-family: hk-grotesk;;
		  font-size: 14px;
			font-style: normal;
			font-weight: 400;
		}
		.woocommerce-form-row span em {
			font-size: 15.96px;
		}
		input#account_display_name {
			margin-bottom: 0px;
		}
		.woocommerce-Button {
			display: inline-block;
			border: 1px solid rgb(242, 242, 242);
			text-transform: uppercase;
			font-size: .85rem;
			text-align: center;
			line-height: 1.2;
			padding: .75rem 2.2rem;
			transition: all 0.2s ease-out;
			background-color: #f2f2f2;
			font-family: hk-grotesk;
		}
		.woocommerce-Button:hover {
			border-color: #b71c1c;
			background-color: #b71c1c;
			color: #ffffff;
			box-sizing: border-box;
		}
		/* ../ USER PANEL */
		/* USER PANEL - LEFT NAV */
		.woocommerce-MyAccount-navigation ul {
		  padding-left: 0;
      margin-bottom: 1.43em;
		}
		.woocommerce-MyAccount-navigation li:first-child {
		  border-top: none;
		  list-style: none;
	    margin-bottom: 0;
	    line-height: 1.8;
	    font-size: 1.14rem;
		}
		.woocommerce-MyAccount-navigation li {
			list-style: none;
	    border-top: 1px solid #e1e1e1;
	    font-size: 14px;
	    font-style: normal;
	    font-weight: 400;
	    line-height: 25.2px;
	    font-family: hk-grotesk;
		}
		.woocommerce-MyAccount-navigation li {
	    line-height: 25px;
			text-align: -webkit-match-parent;
		}
		.woocommerce-MyAccount-navigation li a {
		  padding: 10px 0;
		  text-transform: uppercase;
		  display: inline-block;
		  font-size: 1rem;
		  text-decoration: none;
	    text-decoration-skip-ink: none;
	    cursor: pointer;
	    color: #222222;
	    transition: all 0.2s ease-out;
	    background-color: transparent;
		}
		.woocommerce-MyAccount-navigation li a:hover {
		  outline: none;
		  color: #888888;
		}
		.woocommerce-MyAccount-navigation li.is_active a {
			color: #b71c1c;
		}
		/* ../ USER PANEL - LEFT NAV */
	</style>
  </head>
<body>
<div id="header">
<div class="container">
<div id="welcomeLine" class="row">
	<div class="span6"></div>
	<div class="span6">
	<div class="pull-right">
		<?PHP 
		$cart_products = [];
		if (isset($_COOKIE["cart_products"])) {
			$cart_products = json_decode($_COOKIE["cart_products"]);
		}
		if (count($cart_products) > 0) {
			$this->db->select("*");
			$this->db->where_in('product_id', $cart_products);
			$query = $this->db->get("products");
			$products = $query->result();
			if (count($products) > 0) {
				$sum = 0;
				foreach ($products as $product) {
					$sum += $product->product_new_price;
				}
			}
		}
		?>
		<?php if (false): ?>
			<span class="btn btn-mini">$ <?php echo $sum; ?></span>
		<?php endif; ?>
		<?php if(true): ?>
		<a href="<?php echo base_url('product/cart'); ?>"><span class="btn btn-mini btn-primary">
			<i class="fas fa-shopping-cart"></i> [ <span id="cart_product_count"><?php echo count($cart_products); ?></span> ] Itemes in your cart </span>
		</a> 
		<?php endif; ?>
	</div>
	</div>
</div>
<div id="logoArea" class="navbar">
<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</a>
  <div class="navbar-inner">
    <a class="brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>Assets/themes/images/logo.png" alt="Bootsshop"/></a>
		<form class="form-inline navbar-search" name="search_product_form" method="post" action="products.html" >
		<input id="srchFld" class="srchTxt" type="text" placeholder="search" />
		  <button type="submit" id="submitButton" class="btn btn-primary">Search</button>
    </form>
    <ul id="topMenu" class="nav pull-right">
			<li class=""><a href="<?php echo base_url("product/favourites"); ?>">Favourite</a></li>
			<?php // isset($has_placed_order) && $has_placed_order && ?>
			<?php if ($this->session->userdata('user_id')): ?>
				<li class=""><a href="<?php echo base_url("user/dashboard"); ?>">Account</a></li>
			<?php endif; ?>
			<li class="">
			<?php if (! $this->session->has_userdata('user_role')): ?>
				<a href="<?PHP echo base_url(); ?>login" role="button" style="padding-right:0"><span class="btn btn-success btn-xs">Login</span></a>
			<?php else: ?>
				<!-- <a href="<?PHP // echo base_url('user/logout'); ?>" role="button" style="padding-right:0"><span class="btn btn-default btn-xs">Logout</span></a> -->
			<?php endif; ?>
			</li>
    </ul>
  </div>
</div>
</div>
</div>