document.addEventListener("DOMContentLoaded", function(){
    get_products();
});

function get_products(){
    fetch("http://localhost/tech-zone/public/allproducts/fetchAll", {
        method:"GET",
        headers:{
            "Content-Type":"application/json"
        }
    }).then(function(response){
        return response.json();
    }
    ).then(function(data){
        console.log(data);
        populate(data);
    }
    ).catch(function(error){
        console.log(error);
    }
    );
}
function getByCategory(){
    var category = document.querySelector("#category").value;
    fetch("http://localhost/tech-zone/public/allproducts/fetchByCategory/"+category, {
        method:"GET",
        headers:{
            "Content-Type":"application/json"
        }
    }).then(function(response){
        return response.json();
    }
    ).then(function(data){
        console.log(data);
        populate(data);
    }
    ).catch(function(error){
        console.log(error);
    }
    );
}
const  outerDiv = document.querySelector("#products");
var html = "";
function populate(data){
    var data = data['products']
    console.log(data);
    for(i = 0; i < data.length; i++){
        html += `<div class="col-md-4"><div class="card mb-4 shadow-sm">
            <img src="http://localhost/tech-zone/public/assets/images/${data[i].productImage}" class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text" id="name">${data[i].productName}</p>
                <p class="card-text" id="desc">${data[i].productDescription}</p>
                <p class="card-text">${data[i].productPrice}$</p>

                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a href="http://localhost/tech-zone/public/product/${data[i].productID}" class="btn btn-sm btn-outline-secondary">View</a> 
                    </div>`;
                    if(data[i].productQuantity > 0){
                        html += `<small class="text-success">In Stock</small>`;
                    }else{
                        html += `<small class="text-danger">Out of Stock</small>`;
                    }
                    html += `
                </div>
            </div>
        </div>
    </div>`;
    }
    
    html += `</div>`;
    outerDiv.innerHTML = html;
}
