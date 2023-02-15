
const categories = document.getElementById('productCategory');

function showPreview(event) {
    if (event.target.files.length > 0) {
        var src = URL.createObjectURL(event.target.files[0]);
        var preview = document.getElementById("file-ip-1-preview");
        preview.src = src;
        preview.style.display = "block";
    }
}
window.onload = function() {
    showCategories();
}

function showCategories() {
    fetch('http://localhost/tech-zone/public/categories/get')
        .then((response) => response.json())
        .then((data) => {
            populateCategories(data);
        })

}

function populateCategories(data) {
    var data = data['data']
    console.log(data);
    var html = '';
    for (var i = 0; i < data.length; i++) {
        html += '<option value="' + data[i]['categoryID'] + '">' + data[i]['categoryName'] + '</option>';
    }
    categories.innerHTML += html;
}
document.getElementById('btn').addEventListener('click', function(e) {
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
        }).then(() => {
            //clear form
            document.getElementById('productName').value = '';
            document.getElementById('productPrice').value = '';
            document.getElementById('productQuantity').value = '';
            document.getElementById('productDescription').value = '';
            document.getElementById('file-ip-1').value = '';
            document.getElementById('file-ip-1-preview').style.display = 'none';

        })

})
