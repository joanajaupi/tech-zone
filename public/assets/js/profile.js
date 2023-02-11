const infoForm = document.querySelector("#userInformation");

document.addEventListener("DOMContentLoaded", function () {
  getUserInformation();
});
//

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
    });
}

const appendUserForm = (userData) => {
  console.log(userData);
  infoForm.innerHTML = `<div class="form-group row">
  <label for="name" class="col-sm-2 col-form-label">Name</label>
  <div class="col-sm-10">
      <input type="text" class="form-control" id="name" name="name" value="${userData.name}">
  </div>
</div>
<div class="form-group row">
  <label for="surname" class="col-sm-2 col-form-label">Surname</label>
  <div class="col-sm-10">
      <input type="text" class="form-control" id="surname" name="surname" value="${userData.surname}">
  </div>
</div>
<div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
  <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="${userData.email}">
  </div>
</div>
<div class="form-group row">
  <label for="phone" class="col-sm-2 col-form-label">Phone</label>
  <div class="col-sm-10">
      <input type="text" class="form-control" id="phone" name="phone" value="${userData.phone}">
  </div>
</div>`;
};
