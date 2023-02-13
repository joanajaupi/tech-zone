let category;
document.addEventListener("DOMContentLoaded", function () {
  category = getCurrentCategory();
  if (category === "allproducts") {
    getAllProducts();
  } else {
    getByCategory(category);
  }
});

function getAllProducts() {
  fetch("http://localhost/tech-zone/public/allproducts/fetchAll", {
    method: "GET",
    headers: {
      "Content-Type": "application/json",
    },
  })
    .then(function (response) {
      return response.json();
    })
    .then(function (data) {
      populate(data);
    })
    .catch(function (error) {
      let products = document.querySelector("#products");
      products.innerHTML = `<h1 class="text-center">An error occurred</h1>`;
    });
}

function getByCategory(category) {
  fetch(
    `http://localhost/tech-zone/public/allproducts/fetchByCategory/${category}`,
    {
      method: "GET",
      headers: {
        "Content-Type": "application/json",
      },
      // body: JSON.stringify({
      //   category,
      // }),
    }
  )
    .then(function (response) {
      return response.json();
    })
    .then(function (data) {
      populate(data);
    })
    .catch(function (error) {
      console.log(error);
      let products = document.querySelector("#products");
      products.innerHTML = `<h1 class="text-center">An error occurred</h1>`;
    });
}

function populate(data) {
  let products = document.querySelector("#products");
  let html = "";
  if (data.products.length > 0) {
    for (let product of data.products) {
      html += `<div class="col-md-4"><div class="card mb-4 shadow-sm">
            <img src="http://localhost/tech-zone/public/assets/images/${product.productImage}" class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text" id="name">${product.productName}</p>
                <p class="card-text" id="desc">${product.productDescription}</p>
                <p class="card-text">${product.productPrice}$</p>

                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a href="http://localhost/tech-zone/public/product/${product.productID}" class="btn btn-sm btn-outline-secondary">View</a>
                    </div>`;
      if (product.productQuantity > 0) {
        html += `<small class="text-success">In Stock</small>`;
      } else {
        html += `<small class="text-danger">Out of Stock</small>`;
      }
      html += `
                </div>
            </div>
        </div>
    </div>`;
    }

    html += `</div>`;
    products.innerHTML = html;
  } else {
    products.innerHTML = `<h1 class="text-center">No products found</h1>`;
  }
}

function getCurrentCategory() {
  let category = window.location.href.split("/");
  return category[category.length - 1];
}
