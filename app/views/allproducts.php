<!DOCTYPE html>
<?php $this->view("header", $data); ?>
<?php $this->view("navbar", $data); ?>
<h1>allProducts</h1>
<div id="allproducts">
<!--Display all products-->
<div class='container text-center'> <div class='row align-items-start'>
<?php foreach ($data['products'] as $d) : ?>
    <div class='col'>
        <div class='card' style='height: 400px'>
            <img class='card-img-top' src='images/products/" + d.productImage + "'style='height: 180px; width: 180px' alt='Card image cap'>
            <div class='card-body'>
                <h5 class='card-title'><?= $d->productName ?></h5>
                <p class='card-text'><?= $d->productDescription ?></p>
                <p class='card-text'><?= $d->productPrice ?></p>
                <a href='#' class='btn btn-primary'>Add to cart</a>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<?php $this->view("footer", $data); ?>
</body>
</html>