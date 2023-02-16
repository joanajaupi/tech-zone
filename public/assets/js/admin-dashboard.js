/*get number of users product categories in the database*/
function users(){

    fetch('http://localhost/tech-zone/public/profile/getNumberOfUsers')
    .then(response => response.json())
    .then(data => {
        document.getElementById('users').innerHTML = data['data'] + ' Users';
    })
    .catch(error => console.log(error));
}

function products(){

    fetch('http://localhost/tech-zone/public/allProducts/getNumberOfProducts')
    .then(response => response.json())
    .then(data => {
        document.getElementById('products').innerHTML = data['products'] + ' Products';
    })
    .catch(error => console.log(error));
}
function categories(){
    fetch('http://localhost/tech-zone/public/categories/getNumberOfCategories')
    .then(response => response.json())
    .then(data => {
        document.getElementById('categories').innerHTML = data['data'] + ' Categories';
    })
    .catch(error => console.log(error));
}

function purchase(){
    fetch('http://localhost/tech-zone/public/product/getNumberOfPurchases')
    .then(response => response.json())
    .then(data => {
        document.getElementById('orders').innerHTML = data['data'] + ' Purchases';
    })
    .catch(error => console.log(error));
}

document.addEventListener('DOMContentLoaded', function() {
    users();
    products();
    categories();
    purchase();
});