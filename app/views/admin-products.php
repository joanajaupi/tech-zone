<?php $this->view("header", $data); ?>
<?php $this->view("admin-sidebar", $data); ?>
<p class="text-center">All Products</p>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id = "table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    
                </table>
            </div>
        </div>
    </div>
</div>
<script src = "<?=ROOT?>assets/js/admin-products.js"></script>
</body>
</html>
