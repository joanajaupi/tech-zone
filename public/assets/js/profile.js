const infoForm = document.querySelector("#userInformation");
const personalInfoButton = document.querySelector("#personalInfoButton");
const passwordField = document.querySelector("#newPassword");
const changePasswordButton = document.querySelector("#changePasswordButton");
const userInfoAlert = document.querySelector("#userInfoAlert");
const passwordChangeAlert = document.querySelector("#passwordChangeAlert");
const purchaseDiv = document.querySelector("#purchaseDiv");

document.addEventListener("DOMContentLoaded", function () {
  getUserInformation();
  getUserPurchases();
});

function getUserInformation() {
  fetch("http://localhost/tech-zone/public/profile/getInformation", {
    method: "GET",
    headers: {
      "Content-Type": "application/json",
    },
  })
    .then(function (response) {
      return response.json();
    })
    .then(function (userData) {
      appendUserForm(userData);
    })
    .catch(function (error) {
      infoForm.innerHTML = `<h1>Something went wrong</h1>`;
      personalInfoButton.disabled = true;
    });
}

const appendUserForm = (userData) => {
  infoForm.innerHTML = `<div class="form-group row">
  <label for="name" class="col-sm-2 col-form-label">Name</label>
  <div class="col-sm-10">
      <input type="text" class="form-control" id="name" name="name" value="${userData.name}">
  </div>
</div>
<br>
<div class="form-group row">
  <label for="surname" class="col-sm-2 col-form-label">Surname</label>
  <div class="col-sm-10">
      <input type="text" class="form-control" id="surname" name="surname" value="${userData.surname}">
  </div>
</div>
<br>
<div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
  <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="${userData.email}">
  </div>
</div>
<br>
<div class="form-group row">
  <label for="phone" class="col-sm-2 col-form-label">Phone</label>
  <div class="col-sm-10">
      <input type="text" class="form-control" id="phone" name="phone" value="${userData.phone}">
  </div>
</div>
<br>`;
};

function getUserPurchases() {
  fetch("http://localhost/tech-zone/public/profile/getPurchases", {
    method: "GET",
    headers: {
      "Content-Type": "application/json",
    },
  })
    .then(function (response) {
      return response.json();
    })
    .then(function (purchases) {
      appendUserPurchases(purchases);
    })
    .catch(function (error) {
      purchaseDiv.innerHTML = `<h1>Something went wrong</h1>`;
    });
}

const appendUserPurchases = (purchases) => {
  html = `<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">Transaction ID</th>
      <th scope="col">Product Name</th>
      <th scope="col">Product Price</th>
      <th scope="col">Product quantity</th>
      <th scope="col">Total Price</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
  `;
  for (purchase of purchases.data) {
    html += `<tr scope="row">
    <th scope="row">${purchase.transactionID}</th>
    <td>${purchase.productName}</td>
    <td>${purchase.productPrice}</td>
    <td>${purchase.productQuantity}</td>
    <td>${purchase.totalPrice}</td>
    <td>${purchase.purchasedAt}</td>
    </tr>`;
  }

  html += `</tbody>
   </table>`;
  purchaseDiv.innerHTML = html;
};

passwordField.addEventListener("keyup", () => {
  if (passwordField.value.length === 0) {
    changePasswordButton.disabled = true;
  } else {
    changePasswordButton.disabled = false;
  }
});

changePasswordButton.addEventListener("click", () => {
  const newPassword = passwordField.value;
  passwordField.value = "";
  fetch("http://localhost/tech-zone/public/profile/changePassword", {
    method: "PUT",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      newPassword,
    }),
  })
    .then(function (response) {
      return response.json();
    })
    .then(function (data) {
      passwordChangeAlert.innerText = data.message;
      if (data.message_type === "success") {
        passwordChangeAlert.classList.add("alert-success");
        passwordChangeAlert.classList.remove("alert-danger");
        passwordChangeAlert.classList.remove("hidden");
      } else {
        passwordChangeAlert.classList.add("alert-danger");
        passwordChangeAlert.classList.remove("alert-success");
        passwordChangeAlert.classList.remove("hidden");
      }
      passwordField.value = "";
      changePasswordButton.disabled = true;
    })
    .catch(function (error) {
      passwordChangeAlert.innerText = "Something went wrong";
      passwordChangeAlert.classList.add("alert-danger");
      passwordChangeAlert.classList.remove("alert-success");
      passwordChangeAlert.classList.remove("hidden");
      passwordField.value = "";
      changePasswordButton.disabled = true;
    });
});

personalInfoButton.addEventListener("click", () => {
  const name = document.querySelector("#name").value;
  const surname = document.querySelector("#surname").value;
  const phone = document.querySelector("#phone").value;
  fetch("http://localhost/tech-zone/public/profile/updateInformation", {
    method: "PUT",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      name,
      surname,
      phone,
    }),
  })
    .then(function (response) {
      return response.json();
    })
    .then(function (data) {
      userInfoAlert.innerText = data.message;
      if (data.message_type === "success") {
        userInfoAlert.classList.add("alert-success");
        userInfoAlert.classList.remove("alert-danger");
        userInfoAlert.classList.remove("hidden");
      } else {
        userInfoAlert.classList.add("alert-danger");
        userInfoAlert.classList.remove("alert-success");
        userInfoAlert.classList.remove("hidden");
      }
    })
    .catch(function (error) {
      userInfoAlert.innerText = "Something went wrong";
      userInfoAlert.classList.add("alert-danger");
      userInfoAlert.classList.remove("alert-success");
      userInfoAlert.classList.remove("hidden");
    });
});
