
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
var html = '<thead><tr><th>ID</th><th>Name</th><th>Price</th><th>Category</th><th>Description</th><th>Image</th><th>Quantity</th><th colspan="2">Action</th></tr></thead>';
            for (var i = 0; i < products.length; i++) {
                html += '<tr>';
                html += '<td>' + products[i].productID + '</td>';
                html += '<td>' + products[i].productName + '</td>';
                html += '<td>' + products[i].productPrice + '</td>';
                html += '<td>' + products[i].productCategoryID + '</td>';
                html += '<td>' + products[i].productDescription + '</td>';
                html += '<td>' + products[i].productImage + '</td>';
                html += '<td>' + products[i].productQuantity + '</td>';
                html += '<td><button class="btn btn-primary" onclick="editProduct(' + products[i].productID + ')">Edit</button></td>';
                html += '<td><button class="btn btn-danger" onclick="deleteProduct(' + products[i].productID + ')">Delete</button></td>';

            }
            table.innerHTML = html;


}
function deleteProduct(id){
fetch("<?=ROOT?>product/delete", {
    method:"POST",
    headers:{
        "Content-Type":"application/json"
    },
    body:JSON.stringify({
        id:id
    })
}).then(function(response){
    return response.json();
}
).then(function(data){
    console.log(data);
    if(data['message_type'] == "success"){
        //refresh table
        window.location.reload();
    }
}
).catch(function(error){
    console.log(error);
}
);
}
