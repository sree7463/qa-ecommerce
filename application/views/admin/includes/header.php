<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="robots" content="noindex, nofollow">
  <meta name="google" content="nositelinkssearchbox" />
  <meta name="google" content="notranslate" />
  <meta property="og:url" content="http://qblog.dsaps.com/" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="Web development JavaScript Operators PHP Data Types echo print " />
  <meta property="og:description" content="Web development JavaScript Operators PHP Data Types echo print " />
  <meta property="og:image" content="http://qa-ecommerce.dsaps.com" />
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

  <title>Ecommerce | Admin Panel</title>
  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url(); ?>Assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- NESTED SORT JQUERY UI CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/admin/css/nested-sort.css">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url(); ?>Assets/admin/css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="icon" href="<?php echo base_url(); ?>Assets/admin/img/admin_panel_icon.png">

  <!-- TAGSINPUT CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/admin/css/tagsinput.css">



  <style>
    .input_error {
      color: red;
      margin-left: 5px;
    }
    label.input_error {
      display: inline;
    }
    .fr {
        float: right;
    }
    .inputfile {
      width: 0.1px;
      height: 0.1px;
      opacity: 0;
      overflow: hidden;
      position: absolute;
      z-index: -1;
    }
    .inputfile + label {
      font-size: 1.25em;
      font-weight: 700;
      color: white;
      background-color: #4e73df;
      display: inline-block;
      cursor: pointer;
    }

    .inputfile:focus + label,
    .inputfile + label:hover {
      background-color: #1cc88a;
    }

    /* PRODUCT EDIT - PRODUCT IMAGE X CSS */
    .img-wrap {
      position: relative;
      display: inline-block;
      border: 1px red solid;
      font-size: 0;
      margin: 0px 2px 6px 0px;
    }
    .img-wrap .close {
      position: absolute;
      top: 2px;
      right: 2px;
      z-index: 100;
      background-color: #FFF;
      padding: 5px 2px 2px;
      color: #000;
      font-weight: bold;
      cursor: pointer;
      opacity: .2;
      text-align: center;
      font-size: 22px;
      line-height: 10px;
      border-radius: 50%;
    }
    .img-wrap:hover .close {
      opacity: 1;
    }
    /* ../ PRODUCT EDIT - PRODUCT IMAGE X CSS */
    .dd-item {
      background: #fafafa;
      display: block;
      margin-bottom: 10px;
      position: relative;
    }

    .dd-handle {
      flex: 1;background: transparent; 
    }

    .dd-handle-trash,.dd-handle-plus {
      flex: 0 0 40px; 
      text-align: center; 
      cursor: pointer;    
      position: absolute;
      top: 6px;
      right: 13px;
    }

    /* CSS FOR SWITCH SLIDER */
    .switch {
      position: relative;
      display: block;
      width: 60px;
      height: 34px;
    }

    .switch input { 
      opacity: 0;
      width: 0;
      height: 0;
    }

    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      -webkit-transition: .4s;
      transition: .4s;
    }

    .slider:before {
      position: absolute;
      content: "";
      height: 26px;
      width: 26px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
    }

    input:checked + .slider {
      background-color: #4e73df;
    }

    input:focus + .slider {
      box-shadow: 0 0 1px #4e73df;
    }

    input:checked + .slider:before {
      -webkit-transform: translateX(26px);
      -ms-transform: translateX(26px);
      transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
      border-radius: 34px;
    }

    .slider.round:before {
      border-radius: 50%;
    }
    /** ../ SWITCH SLIDER **/

    /* HEADING CSS */
    .ec_heading {
      padding-left: 20px;
      border-left: 6px solid #4e73df;
      line-height: 50px;
    }
    /* ../ HEADING CSS */

    /* RED AESTERIK REQUIRED FIELD */
    .req::after {
      content: "*";
      position: absolute;
      color: #F00;
      font-size: 16px;
      margin-left: 12px;
      margin-top: 0px;
    }
    /* ../ RED AESTERIK REQUIRED FIELD */
  </style>
</head>
<body id="page-top">