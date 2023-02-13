<?php $this->view("admin-sidebar", $data); ?>
<style>
.container-fluid {
    background-color: #red;
}
.center {
  height:100%;
  display:flex;
  align-items:center;
  justify-content:center;

}
.form-input {
  width:350px;
  padding:20px;
  background:#fff;
  box-shadow: -3px -3px 7px rgba(94, 104, 121, 0.377),
              3px 3px 7px rgba(94, 104, 121, 0.377);
}
.form-input input {
  display:none;

}
.form-input label {
  display:block;
  width:45%;
  height:45px;
  margin-left: 25%;
  line-height:50px;
  text-align:center;
  background:#1172c2;

  color:#fff;
  font-size:15px;
  font-family:"Open Sans",sans-serif;
  text-transform:Uppercase;
  font-weight:600;
  border-radius:5px;
  cursor:pointer;
}

.form-input img {
  width:100%;
  display:none;

  margin-bottom:30px;
}
#container {
  width: 50%;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  padding: 40px;
  border-radius: 10px;
  border: 1px solid #ccc;
    box-shadow: 0 0 10px 0 rgba(0,0,0,0.5);

}
#btn{
    width: 100%;
    margin-top: 20px;
}
</style>

<!--form to create a product product name, price, quantity, image, description-->
<div class="center">
<div id="container">
<h1>Create Product</h1>
<form>
  <div class="mb-3">
   <label for="productName" class="form-label">Product Name</label>
    <input type="text" class="form-control" id="productName" name="productName" required>
    <label for="productPrice" class="form-label">Product Price</label>
    <input type="text" class="form-control" id="productPrice" name="productPrice" required>
    <label for="productQuantity" class="form-label">Product Quantity</label>
    <input type="text" class="form-control" id="productQuantity" name="productQuantity" required>
    <label for="productCategory" class="form-label">Product Category</label>
    <select class="form-select" aria-label="Default select example" id="productCategory" name="productCategory">
    </select>
    <label for="productDescription" class="form-label">Product description</label>
    <textarea class="form-control" id="productDescription" name="productDescription" rows="4"></textarea>
    <label for="productImage" class="form-label">Product Image</label>
    <div class="form-input">
        <div class="preview">
        <img id="file-ip-1-preview">
        </div>
        <label for="file-ip-1">Upload Image</label>
        <input type="file" id="file-ip-1" accept="image/*" name="image" onchange="showPreview(event);">
    </div>
  </div>
  <div class="mb-3">
  
  </div>
  <div class="mb-3 form-check">
    
  </div>
  <button type="submit" class="btn btn-primary" id="btn">Submit</button>
</form>
</div>
</div>
<?php $this->view("end", $data); ?>
<script type="text/javascript">
    const categories = document.getElementById('productCategory');
    function showPreview(event){
    if(event.target.files.length > 0){
        var src = URL.createObjectURL(event.target.files[0]);
        var preview = document.getElementById("file-ip-1-preview");
        preview.src = src;
        preview.style.display = "block";
    }
    }
    window.onload = function(){
        showCategories();
    }
    function showCategories(){
        fetch('http://localhost/tech-zone/public/categories/get')
        .then((response) => response.json())
        .then((data) => {
            populateCategories(data);
        })

    }
    function populateCategories(data){
        var data = data['data']
        console.log(data);
        var html = '';
        for(var i = 0; i < data.length; i++){
            html += '<option value="'+data[i]['categoryID']+'">'+data[i]['categoryName']+'</option>';
        }
        categories.innerHTML += html;
    }
    document.getElementById('btn').addEventListener('click', function(e){
        e.preventDefault();
        var productName = document.getElementById('productName').value;
        var productPrice = document.getElementById('productPrice').value;
        var productQuantity = document.getElementById('productQuantity').value;
        var productCategory = document.getElementById('productCategory').value;
        var productDescription = document.getElementById('productDescription').value;
        var productImage = document.getElementById('file-ip-1').files[0].name;

        fetch('http://localhost/tech-zone/public/product/create', {
            method: 'POST',
            body: JSON.stringify({
                productName,
                productPrice,
                productQuantity,
                productCategory,
                productDescription,
                productImage
            })
        })
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
        }).then(()=>{
            //clear form
            document.getElementById('productName').value = '';
            document.getElementById('productPrice').value = '';
            document.getElementById('productQuantity').value = '';
            document.getElementById('productDescription').value = '';
            document.getElementById('file-ip-1').value = '';
            document.getElementById('file-ip-1-preview').style.display = 'none';

        })

    })
</script>
