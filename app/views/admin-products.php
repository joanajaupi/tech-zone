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
<?php $this->view('admin-footer'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        fetchAll();
    });
    const table = document.getElementById('table');
    function fetchAll(){
        fetch("<?=ROOT?>allproducts/fetchAll", {
        method:"GET",
        headers:{
            "Content-Type":"application/json"
        }
    }).then(function(response){
        return response.json();
    }
    ).then(function(data){
        console.log(data);
        createTable(data['products']);
        
    }
    ).catch(function(error){
        console.log(error);
    }
    );
    }

function createTable(data){
    console.log(data);
    var products = data;
    var html = '<thead><tr><th>ID</th><th>Name</th><th>Price</th><th>Category</th><th>Description</th><th>Image</th><th>Quantity</th></tr></thead>';
                for (var i = 0; i < products.length; i++) {
                    html += '<tr>';
                    html += '<td>' + products[i].productID + '</td>';
                    html += '<td>' + products[i].productName + '</td>';
                    html += '<td>' + products[i].productPrice + '</td>';
                    html += '<td>' + products[i].productCategoryID + '</td>';
                    html += '<td>' + products[i].productDescription + '</td>';
                    html += '<td>' + products[i].productImage + '</td>';
                    html += '<td>' + products[i].productQuantity + '</td>';

                }
                table.innerHTML = html;


}
</script>
</body>
</html>
