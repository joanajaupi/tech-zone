
<?php $this->view("admin-sidebar", $data); ?>
<style>
    .welcome{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .content{
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0,0,0,0.2);
    }
    #users, #products, #categories, #orders{
        font-size: 30px;
        font-weight: bold;
    }
    a{
        
        text-decoration: none;
        color : #fff;
    }
</style>
<div class="p-4">
    <div class="welcome">
      <div class="content rounded-3 p-3">
        <h1 class="fs-3">Welcome to Dashboard</h1>
        <p class="mb-0">Hello , welcome to your dashboard!</p>
      </div>
</div>
</div>
<!-- a container displaying number of users, products, categories, orders -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
        <a href="<?=ROOT?>/admin/users">
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-header">Users</div>
                <div class="card-body">
                    <h5 class="card-title"><i class="fa fa-user"> Users </i></h5>
                    <p class="card-text">Number of users in the database</p>
                    <p id="users"></p>
                </div>
            </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="<?=ROOT?>/admin/products">
            <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                <div class="card-header">Products</div>
                <div class="card-body">
                    <h5 class="card-title"><i class="fa fa-book"></i> Number of Products</h5>
                    <p class="card-text">Number of products:</p>
                    <p id="products"></p>
                </div>
            </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="<?=ROOT?>/admin/categories">
            <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                <div class="card-header">Categories</div>
                <div class="card-body">
                    <h5 class="card-title"><i class="fa fa-list"> Categories</i></h5>
                    <p class="card-text">Number of categories: </p>
                    <p id="categories"></p>
                </div>
            </div>
            </a>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                <div class="card-header">Orders</div>
                <div class="card-body">
                    <h5 class="card-title">Number of Orders</h5>
                    <p class="card-text">Number of orders: </p>
                    <p id="orders"></p>
                </div>
            </div>
        </div>
    </div>
<script src="<?=ROOT?>assets/js/admin-dashboard.js"></script>
<?php $this->view("footer", $data); ?>

