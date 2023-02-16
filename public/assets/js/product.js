let productID;
const productDiv = document.querySelector("#productDiv");
document.addEventListener("DOMContentLoaded", function () {
  productID = getProductID();
  console.log(productID);
  getProduct(productID);
  showReviews(productID);
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
  html = `<div class="col-md-5">
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
// reviews section
const reviewDiv = document.querySelector("#reviewDiv");
function showReviews(productID){
    fetch(`http://localhost/tech-zone/public/reviews/fetchReviews/${productID}`, {
        method: "GET",
        headers: {
            "Content-Type": "application/json",
        },
    })
    .then(function (response) {
        return response.json();
    })
    .then(function (reviews) {
        if(reviews['userID'] == null){
          document.querySelector("#submit").style.display = "none";
          document.querySelector("#review").disabled = true;
          document.querySelector("#review").placeholder = "You must be logged in to review this product";
        }
        if(reviews['data'].length > 0){
            populateReviews(reviews['data']);
        }else{
            console.log(reviews);
            reviewDiv.innerHTML = `<h1 class="text-center">No reviews yet</h1>`;
        }
    })
    .catch(function (error) {
        console.log(error);
        reviewDiv.innerHTML = `<h1 class="text-center">An error occurred</h1>`;
    });
}
function populateReviews(reviews){
    
    var html = '<h3>What other people are saying</h3>';
    for(var i = 0; i < reviews.length; i++){

  if(i % 3 == 0){
      html += '<div class="row">';
  }
  html += `<div class="col-md-4">
  <div class="card" style="width: 18rem;">
      <div class="card-body">
          <h5 class="card-title">${reviews[i].name}</h5>`;
          
          for(var j = 0; j < reviews[i].rate; j++){
              html += `<span class="float-end"><i class="text-warning fa fa-star"></i></span>`;
          }
              
          html += `<h6 class="card-subtitle mb-2 text-muted">${reviews[i].publishedAt}</h6>
          <p class="card-text">${reviews[i].review}</p>
      </div>
    </div>
  </div>`;
}
  
    reviewDiv.innerHTML = html;
}

// publish review
document.getElementById("submit").addEventListener("click", function(e){
    e.preventDefault();
    var review = document.querySelector("#review").value;
    var rate = document.querySelector("#rating").value;
    review = review.trim();
    if(review == ""){
        return;
    }

    var prodID = productID;
    fetch (`http://localhost/tech-zone/public/reviews/publishReview`, {
        method: "POST",
        headers: {
            "Content-Type": "application/json", 
        },
        body: JSON.stringify({
            review: review,
            rate: rate,
            productID: prodID
        })
    })
    .then(function (response) {
        return response.json();
    }
    )
    .then(function (data) {
        console.log(data);
        if(data['status'] == 'success'){
            window.location.reload();
        }else{
            console.log(data);
        }}
        );
  }
);



