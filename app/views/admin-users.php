<?php $this->view("header", $data); ?>
<style>
</style>

<?php $this->view("admin-sidebar", $data); ?>
<p class="text-center">Users</p>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id = "table">
                    <thead>
                        <tr>
                            <th  scope="col">Name</th>
                            <th  scope="col">Surname</th>
                            <th  scope="col">Email</th>
                            <th  scope="col">Role</th>
                            <th  scope="col">Action</th>
                        </tr>
                    </thead>
                    
                </table>
            </div>
        </div>
    </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function(){
    fetchUsers();
}
);
function fetchUsers(){
    console.log("fetching users");
    fetch("http://localhost/tech-zone/public/profile/getUsers", {
        method:"GET",
        headers:{
            "Content-Type":"application/json"

        }
    }).then(function(response){
        return response.json();

    }
    ).then(function(data){
        console.log(data);
        createTable(data['data']);
    }
    ).catch(function(error){
        console.log(error);
    }
    );
    
}

function createTable(data){
    var table = document.getElementById("table");
    for(var i = 0; i < data.length; i++){
        var row = `<tr>
        <td>${data[i].name}</td>
        <td>${data[i].surname}</td>
        <td>${data[i].email}</td>`
        if(data[i].admin == 0){
            row += `<td>Customer</td>`;
        }else{
            row += `<td>Admin</td>`;
        }
        row += `
        <td><a href = "<?=ROOT?>admin/users/${data[i].id}">Edit</a></td>
        </tr>`;
        table.innerHTML += row;
    }
}

</script>