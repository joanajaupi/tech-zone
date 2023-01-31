<?php $this->view("header", $data); ?>
<link rel="stylesheet" href="<?=ROOT?>assets/css/admin.css" type="text/css">
</head>
<body>
<div class="container-fluid">
    <div class="row d-flex d-md-block flex-nowrap wrapper">
        <div class="col-md-3 float-left col-1 pl-0 pr-0 collapse width show" id="sidebar">
            <div class="list-group border-0 text-center text-md-left">
                <a href="#menu1" class="list-group-item d-inline-block collapsed" data-toggle="collapse" aria-expanded="false"><i class="fa fa-dashboard"></i> <span class="d-none d-md-inline">Dashboard</span> </a>
                <div class="collapse" id="menu1" data-parent="#sidebar">
                    <a href="#menu1sub1" class="list-group-item" data-toggle="collapse" aria-expanded="false">Subitem 1 </a>
                    <div class="collapse" id="menu1sub1" data-parent="#menu1">
                        <a href="#" class="list-group-item" data-parent="#menu1sub1">Subitem a</a>
                        <a href="#" class="list-group-item" data-parent="#menu1sub1">Subitem b</a>
                        <a href="#menu1sub1sub1" class="list-group-item" data-toggle="collapse" aria-expanded="false">Subitem c </a>
                        <div class="collapse" id="menu1sub1sub1">
                            <a href="#" class="list-group-item" data-parent="#menu1sub1sub1">Subitem c.1</a>
                            <a href="#" class="list-group-item" data-parent="#menu1sub1sub1">Subitem c.2</a>
                        </div>
                        <a href="#" class="list-group-item" data-parent="#menu1sub1">Subitem d</a>
                        <a href="#menu1sub1sub2" class="list-group-item" data-toggle="collapse" aria-expanded="false">Subitem e </a>
                        <div class="collapse" id="menu1sub1sub2">
                            <a href="#" class="list-group-item">Subitem e.1</a>
                            <a href="#" class="list-group-item">Subitem e.2</a>
                        </div>
                    </div>
                    <a href="#menu1sub2" class="list-group-item" data-toggle="collapse" aria-expanded="false">Subitem 2</a>
                    <div class="collapse" id="menu1sub2" data-parent="#menu1">
                        <a href="#" class="list-group-item" data-parent="#menu1sub1">Subitem 1 a</a>
                        <a href="#" class="list-group-item" data-parent="#menu1sub1">Subitem 2 b</a>
                        <a href="#menu1sub1sub1" class="list-group-item" data-toggle="collapse" aria-expanded="false">Subitem 3 c </a>
                        <div class="collapse" id="menu1sub1sub1">
                            <a href="#" class="list-group-item" data-parent="#menu1sub1sub1">Subitem 3 c.1</a>
                            <a href="#" class="list-group-item" data-parent="#menu1sub1sub1">Subitem 3 c.2</a>
                        </div>
                        <a href="#" class="list-group-item" data-parent="#menu1sub1">Subitem 4 d</a>
                        <a href="#menu1sub1sub2" class="list-group-item" data-toggle="collapse" aria-expanded="false">Subitem 5 e </a>
                        <div class="collapse" id="menu1sub1sub2">
                            <a href="#" class="list-group-item" data-parent="#menu1sub1sub2">Subitem 5 e.1</a>
                            <a href="#" class="list-group-item" data-parent="#menu1sub1sub2">Subitem 5 e.2</a>
                        </div>
                    </div>
                    <a href="#" class="list-group-item">Subitem 3</a>
                </div>
                <a href="#" class="list-group-item d-inline-block collapsed"><i class="fa fa-film"></i> <span class="d-none d-md-inline">Item 2</span></a>
                <a href="#menu3" class="list-group-item d-inline-block collapsed" data-toggle="collapse" aria-expanded="false"><i class="fa fa-book"></i> <span class="d-none d-md-inline">Item 3 </span></a>
                <div class="collapse" id="menu3" data-parent="#sidebar">
                    <a href="#" class="list-group-item" data-parent="#menu3">3.1</a>
                    <a href="#menu3sub2" class="list-group-item" data-toggle="collapse" aria-expanded="false">3.2 </a>
                    <div class="collapse" id="menu3sub2">
                        <a href="#" class="list-group-item" data-parent="#menu3sub2">3.2 a</a>
                        <a href="#" class="list-group-item" data-parent="#menu3sub2">3.2 b</a>
                        <a href="#" class="list-group-item" data-parent="#menu3sub2">3.2 c</a>
                    </div>
                    <a href="#" class="list-group-item" data-parent="#menu3">3.3</a>
                </div>
                <a href="#" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fa fa-heart"></i> <span class="d-none d-md-inline">Item 4</span></a>
                <a href="#" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fa fa-list"></i> <span class="d-none d-md-inline">Item 5</span></a>
                <a href="#" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fa fa-clock-o"></i> <span class="d-none d-md-inline">Link</span></a>
                <a href="#" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fa fa-th"></i> <span class="d-none d-md-inline">Link</span></a>
                <a href="#" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fa fa-gear"></i> <span class="d-none d-md-inline">Link</span></a>
                <a href="#" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fa fa-calendar"></i> <span class="d-none d-md-inline">Link</span></a>
                <a href="#" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fa fa-envelope"></i> <span class="d-none d-md-inline">Link</span></a>
                <a href="#" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fa fa-bar-chart-o"></i> <span class="d-none d-md-inline">Link</span></a>
                <a href="#" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fa fa-star"></i> <span class="d-none d-md-inline">Link</span></a>
                <a href="<?=ROOT?>logout" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><span class="d-none d-md-inline">Log Out</span></a>
            </div>
        </div>
        <main class="col-md-9 float-left col px-5 pl-md-2 pt-2 main">
            <a href="#" data-target="#sidebar" data-toggle="collapse"><i class="text-dark fa fa-navicon fa-lg py-2 p-1"></i></a>
        </main>
    </div>
</div>
<?php $this->view('footer'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="<?=ROOT?>assets/js/admin.js"></script>
</body>
</html>
