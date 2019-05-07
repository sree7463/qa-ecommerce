<?php 
if (isset($general_setting)) {
  $meta_title = $general_setting->meta_title;
  $meta_description = $general_setting->meta_description;
  $meta_tags = $general_setting->meta_tags;
} else if (isset($product)) {
  $meta_title = $product->product_meta_title;
  $meta_description = $product->product_meta_description;
  $meta_tags = $product->product_meta_tags;
} else if (isset($category)) {
  $meta_title = $category->category_meta_title;
  $meta_description = $category->category_meta_description;
  $meta_tags = $category->category_meta_tags;
} else {
  $meta_title = "Home - Ecommerce";
  $meta_description = "Shop food, laptop, mobiles online";
  $meta_tags = "Online shopping, electronics shopping, laptop shopping";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="qaisar">
  <title><?php echo $meta_title; ?></title>
  <meta name="tags" content="<?php echo $meta_tags; ?>">
  <meta name="description" content="<?php echo $meta_description; ?>">
  <meta name="robots" content="noindex, nofollow">
  <meta name="google" content="nositelinkssearchbox" />
  <meta name="google" content="notranslate" />
  <meta property="og:url" content="<?php echo base_url(); ?>" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="<?php echo $meta_title; ?>" />
  <meta property="og:description" content="<?php echo $meta_description; ?>" />
  <meta property="og:image" content="<?php echo base_url(); ?>Assets/ecommerce-logo.png" />
  <meta name="revisit-after" content="1 days" />
  <meta name="author" content="Qaisar Khan" />
  <meta name="contact" content="qaisark787@gmail.com" />
  <meta name="copyright" content="Digital Applications" />
  <meta name="distribution" content="global" />
  <meta name="language" content="English" />
  <meta name="rating" content="general" />
  <meta name="reply-to" content="qaisark787@gmail.com" />
  <meta name="web_author" content="Digital Applications" />
  <link rel="canonical" href="http://qa-ecommerce.dsaps.com/" />

  <!-- ANGULAR JS -->
  <script src="<?php echo base_url(); ?>Assets/js/angular.min.js"></script>

  <link href="<?php echo base_url(); ?>Assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url(); ?>Assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>Assets/css/shop-homepage.css" rel="stylesheet">
  <link rel="icon" href="<?php echo base_url(); ?>Assets/shopping-cart.png">
  <style>
  	.favourite-icon {
  		font-size: 25px;
  		cursor: pointer;
  	}
    .fa-trash {
      color: #dc3545;
      cursor: pointer;
    }


    .quantity {
      float: left;
      margin-right: 15px;
      background-color: #eee;
      position: relative;
      width: 80px;
      overflow: hidden
    }

    .quantity input {
      margin: 0;
      text-align: center;
      width: 15px;
      height: 15px;
      padding: 0;
      float: right;
      color: #000;
      font-size: 20px;
      border: 0;
      outline: 0;
      background-color: #F6F6F6
    }

    .quantity input.qty {
      position: relative;
      border: 0;
      width: 100%;
      height: 40px;
      padding: 10px 25px 10px 10px;
      text-align: center;
      font-weight: 400;
      font-size: 15px;
      border-radius: 0;
      background-clip: padding-box
    }

    .quantity .minus, .quantity .plus {
      line-height: 0;
      background-clip: padding-box;
      -webkit-border-radius: 0;
      -moz-border-radius: 0;
      border-radius: 0;
      -webkit-background-size: 6px 30px;
      -moz-background-size: 6px 30px;
      color: #bbb;
      font-size: 20px;
      position: absolute;
      height: 50%;
      border: 0;
      right: 0;
      padding: 0;
      width: 25px;
      z-index: 3
    }

    .quantity .minus {
      bottom: 0
    }
    .shopping-cart {
      margin-top: 20px;
    }
    i.fas.fa-star.favourite-icon {
      color: #3eff3e;
    }
  </style>
</head>
<body>