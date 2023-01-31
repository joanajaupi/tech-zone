<?php $this->view("header", $data); ?>
<style>
  .add_new{
    width: 500px;
    height: 200px;
    background-color: #e0e0de;
    position: absolute;
    box-shadow: 0 0 10px 0 rgba(0,0,0,0.5);
  }
  .show{
    display: block;

  }
  .hide{
    display: none;
  }
</style>
<?php $this->view("admin-sidebar", $data); ?>
<table class="table" style="margin-top: 50px;">
<p>Product Categories</p>
  <button type="button" class="btn btn-success" style="margin-bottom: 10px;" onclick="show_add_new(event)">Add Category <i class="fa fa-plus"></i></button>
  
  <div class="add_new hide">
    <h4 class="mb"><i class="fa fa-angle-right"></i> Add New Category</h4>
    <form class="form-horizontal style-form" method="post">
      <div class="form-group">
        <label class="col-sm-2 col-sm-2 control-label">Category Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="category-input" name="category"  autofocus>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-10">
          <button type="button" class="btn btn-success" onclick="collect_data(event)">Save</button>
          <button type="button" class="btn btn-danger" onclick="show_add_new(event)">Cancel</button>
        </div>
    </form>
    </div>

  <thead>
    <tr>
      <th scope="col">CategoryID</th>
      <th scope="col">CategoryName</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
  </tbody>
</table>
</div>

</main>
<?php $this->view('admin-footer'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="<?=ROOT?>assets/js/admin.js"></script>
<script>
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
function collect_data(e){
  var category_input =document.querySelector("#category-input");
  if(category_input.value.trim() == ""){
    alert("Please enter a category name");
    return;
  }
  var data = category_input.value.trim();
  send_data({
    data:data, 
    type:"add_category"});
}

function send_data(data = {})
{
  var ajax = new XMLHttpRequest();
  ajax.addEventListener("load", function(){
    if(this.readyState == 4 && this.status == 200){
      handle_result(ajax.responseText);
    }
  });
  ajax.open("POST", "<?=ROOT?>ajax", true);
  ajax.send(JSON.stringify(data));
}


function handle_result(result){
  console.log(result);
  if(result!=""){
    var result = JSON.parse(result);
    if(typeof result.message_type != "undefined"){
        if(result.message_type == "success"){
          alert("Category added successfully");
          show_add_new();
          var category_input = document.querySelector("#category-input");
          category_input.value = "";
          var table = document.querySelector(".table-group-divider");
          table.innerHTML = result.data;
     
  }else{
    alert(result.message);
  }
}
  }
}
</script>
</body>
</html>