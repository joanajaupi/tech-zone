<?php $this->view ("header", $data); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="<?=ROOT?>assets/css/admin.css" type="text/css">
<script src="<?=ROOT?>assets/js/admin-sidebar.js" defer></script>
<style>
#admin{
  /*admin information */
  background-color: #333;
  color: #EEE;
  padding: 10px;
  margin-bottom: 10px;
  border-radius: 5px;
  text-align: center;
}

</style>
</head>
<body>
<div class="container-fluid">
    <div class="row d-flex d-md-block flex-nowrap wrapper">
        <div class="col-md-3 float-left col-1 pl-0 pr-0 collapse width show" id="sidebar">
            <div class="list-group border-0 text-center text-md-left">
            <div id="admin"></div>
            <a href="<?=ROOT?>admin" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fa fa-dashboard"></i> <span class="d-none d-md-inline">Dashboard</span></a>
                <a href="<?=ROOT?>admin/products" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fa fa-book"></i> <span class="d-none d-md-inline">Products</span></a>
                <a href="<?=ROOT?>admin/categories" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fa fa-list"></i> <span class="d-none d-md-inline">Categories</span></a>
                <a href="<?=ROOT?>admin/products/create" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fa fa-clock-o"></i> <span class="d-none d-md-inline">Create Product</span></a>
                <a href="<?=ROOT?>admin/users" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fa fa-user"></i> <span class="d-none d-md-inline">Users</span></a>
                <a href="<?=ROOT?>logout" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><span class="d-none d-md-inline">Log Out</span></a>
            </div>
        </div>
        <main class="col-md-9 float-left col px-5 pl-md-2 pt-2 main">
            <a href="#" data-target="#sidebar" data-toggle="collapse"><i class="text-dark fa fa-navicon fa-lg py-2 p-1"></i></a>