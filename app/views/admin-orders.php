<?php $this->view("admin-sidebar", $data); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id = "table">
                    <thead>
                        <tr>
                            <th scope="col">TID</th>
                            <th scope="col">productName</th>
                            <th scope="col">productPrice</th>
                            <th scope="col">productQuantity</th>
                            <th scope="col">Date purchased</th>
                        </tr>
                    </thead>
                    
                </table>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function(){
        fetchOrders();
    }
    );

    function fetchOrders(){
        console.log("fetching orders");
        fetch("http://localhost/tech-zone/public/purchases/getPurchases", {
            method:"GET",
            headers:{
                "Content-Type":"application/json"

            }
        }).then(function(response){
            return response.json();

        }
        ).then(function(data){
            console.log(data);
            createTable(data['data']);
        }
        ).catch(function(error){
            console.log(error);
        }
        );
        
    }

    function createTable(data){
        var table = document.getElementById("table");
        for(var i = 0; i < data.length; i++){
            var row = `<tr>
            <td>${data[i].transactionID}</td>
            <td>${data[i].productName}</td>
            <td>${data[i].productPrice}</td>
            <td>${data[i].productQuantity}</td>
            <td>${data[i].purchasedAt}</td>
            </tr>`;
            table.innerHTML += row;
        }
    }
</script>