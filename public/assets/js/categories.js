function show_add_new()
{
  var show_add_box = document.querySelector(".add_new");
  var category_input = document.querySelector("#category-input");
  if(show_add_box.classList.contains("hide"))
  {
    show_add_box.classList.remove("hide");
    var category_input = document.querySelector("#category-input");
    category_input.focus();
  }else{
    show_add_box.classList.add("hide");
    category_input.value = "";
  }
}
function add_category(){
    var category_input = document.querySelector("#category-input");
    var category_name = category_input.value;
    if(category_name == ""){
        alert("Please enter category name");
        return;
    }
    fetch("http://localhost/tech-zone/public/categories/create", {
        method:"POST",
        headers:{
        "Content-Type":"application/json"
        },
        body:JSON.stringify({categoryName:category_name})
    }).then(function(response){
        return response.json();
    }
    ).then(function(data){
        if(data["status"] == "success"){
            show_add_new();
            get_categories();
    }
    else{
        alert(data["message"]);
    }
}
    ).catch(function(error){
        console.log(error);
    }
    );
}

document.addEventListener("DOMContentLoaded", function(){
    get_categories();
});
function get_categories(){
    fetch("http://localhost/tech-zone/public/categories/get", {
        method:"GET",
        headers:{
            "Content-Type":"application/json"
        }
    }).then(function(response){
        return response.json();
    }
    ).then(function(data){
        console.log(data);
        makeTable(data);
        
    }
    ).catch(function(error){
        console.log(error);
    }
    );
}
const table = document.querySelector("#table");
function makeTable(data){
    console.log(data["data"]);
    var data = data["data"];
    var html = "";
    html += "<table class='table table-striped table-bordered'>";
    html += ` <thead>
    <tr>
      <th scope="col">Category ID</th>
      <th scope="col">Category Name</th>
      <th scope="col">Action</th>
    </tr></thead><tbody>`;

    for(var i = 0; i < data.length; i++){
       
      html += `<tr><th scope="row">${data[i].categoryID}</th><td>${data[i].categoryName}</td>
      <td><button class="btn btn-danger" onclick="delete_row(${data[i].categoryID})">Delete</button>
      <button class="btn btn-primary" onclick="edit_row(${data[i].categoryName})">
      Edit</button></td></tr>`;
            
    }
    html += "</tbody></table>";
    table.innerHTML = html;
}

function delete_row(id) {
    fetch("http://localhost/tech-zone/public/categories/delete", {
        method:"POST",
        headers:{
            "Content-Type":"application/json"
        },
        body:JSON.stringify({categoryID:id})
    }).then(function(response){
        console.log(response);
        return response.json();
    }
    ).then(function(data){
        console.log(data);
        get_categories();
    }
    ).catch(function(error){
        console.log(error);
    }
    );
}
function edit_row(id) {
    var data = {id:id, type:"edit_category"};
    send_data(data);
}