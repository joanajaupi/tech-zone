<?php $this->view ("header", $data); ?>
<link rel="stylesheet" href="<?=ROOT?>assets/css/admin.css" type="text/css">
</head>
<body>
<div class="container-fluid">
    <div class="row d-flex d-md-block flex-nowrap wrapper">
        <div class="col-md-3 float-left col-1 pl-0 pr-0 collapse width show" id="sidebar">
            <div class="list-group border-0 text-center text-md-left">
            <a href="<?=ROOT?>admin" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fa fa-dashboard"></i> <span class="d-none d-md-inline">Dashboard</span></a>
                <a href="#menu3" class="list-group-item d-inline-block collapsed" data-toggle="collapse" aria-expanded="false"><i class="fa fa-book"></i> <span class="d-none d-md-inline">Categories</span></a>
                <div class="collapse" id="menu3" data-parent="#sidebar">
                <a href="<?=ROOT?>admin/categories" class="list-group-item" data-parent="#menu3">view categories</a>
                    <a href="<?=ROOT?>admin/categories/add" class="list-group-item" data-parent="#menu3">Add category</a>
                    <a href="<?=ROOT?>admin/categories/delete" class="list-group-item" data-parent="#menu3">Delete category</a>
                    <a href="<?=ROOT?>admin/categories/edit" class="list-group-item" data-parent="#menu3">Edit category</a>
                </div>
                <a href="#menu2" class="list-group-item d-inline-block collapsed" data-toggle="collapse" aria-expanded="false"><i class="fa fa-book"></i> <span class="d-none d-md-inline">Products</span></a>
                <div class="collapse" id="menu2" data-parent="#sidebar">
                    <a href="<?=ROOT?>admin/products/add" class="list-group-item" data-parent="#menu2">Add products</a>
                    <a href="<?=ROOT?>admin/products/delete" class="list-group-item" data-parent="#menu2">Delete products</a>
                    <a href="<?=ROOT?>admin/products/edit" class="list-group-item" data-parent="#menu2">Edit products</a>
                </div>
                <a href="#" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fa fa-heart"></i> <span class="d-none d-md-inline">Item 4</span></a>
                <a href="#" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fa fa-list"></i> <span class="d-none d-md-inline">Item 5</span></a>
                <a href="#" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fa fa-clock-o"></i> <span class="d-none d-md-inline">Link</span></a>
                <a href="#" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fa fa-th"></i> <span class="d-none d-md-inline">Link</span></a>
                <a href="#" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fa fa-gear"></i> <span class="d-none d-md-inline">Link</span></a>
                <a href="#" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fa fa-calendar"></i> <span class="d-none d-md-inline">Link</span></a>
                <a href="#" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fa fa-envelope"></i> <span class="d-none d-md-inline">Link</span></a>
                <a href="#" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fa fa-bar-chart-o"></i> <span class="d-none d-md-inline">Link</span></a>
                <a href="<?=ROOT?>logout" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><span class="d-none d-md-inline">Log Out</span></a>
            </div>
        </div>
        <main class="col-md-9 float-left col px-5 pl-md-2 pt-2 main">
            <a href="#" data-target="#sidebar" data-toggle="collapse"><i class="text-dark fa fa-navicon fa-lg py-2 p-1"></i></a>