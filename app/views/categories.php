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
          <button type="button" class="btn btn-success" onclick="add_category()">Save</button>
          <button type="button" class="btn btn-danger" onclick="show_add_new(event)">Cancel</button>
        </div>
    </form>
    </div>
  </div>
<div id="table"></div>

</div>

</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="<?=ROOT?>assets/js/categories.js"></script>
</body>
</html>