
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
</style>
<div class="p-4">
    <div class="welcome">
      <div class="content rounded-3 p-3">
        <h1 class="fs-3">Welcome to Dashboard</h1>
        <p class="mb-0">Hello Jone Doe, welcome to your awesome dashboard!</p>
      </div>
</div>
</div>
<!-- a container displaying number of users, products, categories, orders -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-header">Users</div>
                <div class="card-body">
                    <h5 class="card-title"><i class="fa fa-user"> Users </i></h5>
                    <p class="card-text">Number of users in the database</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                <div class="card-header">Products</div>
                <div class="card-body">
                    <h5 class="card-title">Number of Products</h5>
                    <p class="card-text">Number of products in the database</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                <div class="card-header">Categories</div>
                <div class="card-body">
                    <h5 class="card-title"><i class="fa fa-list"> Categories</i></h5>
                    <p class="card-text">Number of categories in the database</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                <div class="card-header">Orders</div>
                <div class="card-body">
                    <h5 class="card-title">Number of Orders</h5>
                    <p class="card-text">Number of orders in the database</p>
                </div>
            </div>
        </div>
    </div>

<?php $this->view("footer", $data); ?>

  