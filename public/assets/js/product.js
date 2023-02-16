let productID;
let product_Quantity;
const productDiv = document.querySelector("#productDiv");
let purchaseButton = null;

document.addEventListener("DOMContentLoaded", function () {
  productID = getProductID();
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
        purchaseButton = document.querySelector("#purchaseButton");
        purchaseButton.addEventListener("click", () => purchaseItem());
      } else {
        productDiv.innerHTML = `<h1 class="text-center">Product does not exist</h1>`;
      }
    })
    .catch(function (error) {
      productDiv.innerHTML = `<h1 class="text-center">An error occurred</h1>`;
    });
}

function populate(product) {
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
        <input class="form-control text-center me-3" type="number" name="productQuantity" id="productQuantity" min="1" max="${product.productQuantity}">
        <button class="btn btn-outline-dark flex-shrink-0" type="button" id="purchaseButton">Buy now</button>
    </div>

</div>`;
  product_Quantity = product.productQuantity;
  productDiv.innerHTML = html;
}

const purchaseItem = () => {
  let productQuantity = document.querySelector("#productQuantity").value;
  if (productQuantity > 0 && productQuantity <= product_Quantity) {
    fetch(
      `http://localhost/tech-zone/public/product/purchaseItem/${productID}`,
      {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          productQuantity: productQuantity,
        }),
      }
    )
      .then(function (response) {
        return response.json();
      })
      .then(function (data) {
        console.log(data);
        console.log(data.redirect !== undefined);
        if (data.redirect !== undefined) {
          window.location.href = data.redirect;
        } else if (data.message_type == "success") {
          alert("Item purchased successfully");
        } else {
          alert("Could not purchase item");
        }
      })
      .catch(function (error) {
        alert("Could not purchase item, an error occurred");
      });
  } else {
    alert("Please enter a valid quantity");
  }
};
