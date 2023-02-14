let productID;
const productDiv = document.querySelector("#productDiv");
document.addEventListener("DOMContentLoaded", function () {
  productID = getProductID();
  console.log(productID);
  getProduct(productID);
});

function getProductID() {
  let URL = window.location.href.split("/");
  return URL[URL.length - 1];
}

function getProduct(productID) {
  fetch(`http://localhost/tech-zone/public/product/fetchProduct/${productID}`, {
    method: "GET",
    headers: {
      "Content-Type": "application/json",
    },
  })
    .then(function (response) {
      return response.json();
    })
    .then(function (product) {
      if (product.data.length > 0) {
        populate(product.data[0]);
      } else {
        productDiv.innerHTML = `<h1 class="text-center">Product does not exist</h1>`;
      }
    })
    .catch(function (error) {
      console.log(error);
      productDiv.innerHTML = `<h1 class="text-center">An error occurred</h1>`;
    });
}

function populate(product) {
  console.log(product);
  html = `<div class="col-md-6">
    <img src="http://localhost/tech-zone/public/assets/images/${product.productImage}" alt="" class="card-img-top mb-5 mb-md-0">
</div>
<div class="col-md-6">
    <h1 class="display-5 fw-bolder">${product.productName}</h1>
    <div class="fs-5 mb-5">
        <span>$${product.productPrice}</span>
        <br>
        <span>In Stock: ${product.productQuantity}</span>
        <br>
        <span>Category: <a href="../allproducts/${product.categoryName}">${product.categoryName}</a></span>
    </div>
    <p class="lead">${product.productDescription}</p>
    <div class="d-flex">
        <input class="form-control text-center me-3" type="number" name="productQuantity" id="productQuantity" min="1" max="10">
        <button class="btn btn-outline-dark flex-shrink-0" type="button">Buy now</button>
    </div>

</div>`;
  productDiv.innerHTML = html;
}
