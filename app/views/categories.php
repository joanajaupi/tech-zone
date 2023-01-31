<?php $this->view("header", $data); ?>
<style>
  .add_new{
    width: 500px;
    height: 500px;
    background-color: #e0e0de;
    position: absolute;

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
    <form class="form-horizontal style-form" method="get">
      <div class="form-group">
        <label class="col-sm-2 col-sm-2 control-label">Category Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="category-input">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-10">
          <button type="button" class="btn btn-success" onclick="collect_data(event)">Add Category</button>
        </div>
    </form>
    </div>

  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">CategoryID</th>
      <th scope="col">CategoryName</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>
        <button type="button" class="btn btn-success">Enabled</button>
      </td>
      <td>
      <button type="button" class="btn btn-success"><i class="fa fa-edit"></i></button>
      <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
      </td>
    </tr>
  </tbody>
</table>
</div>

</main>
<?php $this->view('footer'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="<?=ROOT?>assets/js/admin.js"></script>
<script>
function show_add_new(e)
{
  var show_add_box = document.querySelector(".add_new");
  if(show_add_box.classList.contains("hide"))
  {
    show_add_box.classList.remove("hide");
    var category_input = document.querySelector("#category-input");
    category_input.focus();
  }else{
    show_add_box.classList.add("hide");
  }
}
function collect_data(e){
  var category_input =document.querySelector("#category-input");
  if(category_input.value == ""){
    alert("Please enter a category name");
    return;
  }
  var data = category_input.value.trim();
  send_data({
    data:data, 
    type:"add_category"
  }
  );
}

function send_data(data = {})
{
  var ajax = new XMLHttpRequest();
  ajax.addEventListener("readystatechange", function(){
    if(this.readyState == 4 && this.status == 200){
      handle_result(ajax.responseText);
    }
  });
  ajax.open("POST", "<?=ROOT?>ajax", true);
  ajax.send(JSON.stringify(data));
}
function handle_result(result){
  var result = JSON.parse(result);
  if(typeof result.message_type != 'undefined')
  {
    if(result.message_type == "success"){
      alert(result.message);
    }else{
      alert(result.message);
    }
  }
}
</script>
</body>
</html>