<?php $this->view("header", $data); ?>
<link rel="stylesheet" href="<?=ROOT?>assets/css/product.css" type = "text/css">
<?php $this->view("navbar", $data); ?>
</head>
<body>
<div class="container">
        <div class="single-product">
            <div class="row">
                <div class="col-6">
                    <div class="product-image">
                        <div class="product-image-main">
                            <img src="img/tshirt-1.png" alt="" id="product-main-image">
                        </div>  
                    </div>
                </div>
                <div class="col-6">
                    <div class="breadcrumb">
                        <span><a href="<?=ROOT?>home">Home</a></span>
                        <span><a href="#">Product</a></span>
                        <span class="active">T-shirt</span>
                    </div>

                    <div class="product">
                        <div class="product-title">
                            <h2><?=data['product_data']->productName?></h2>
                        </div>
                        <div class="product-rating">
                        </div>
                        <div class="product-price">
                            <span class="offer-price"><?=data['product_data']->productName?></span>
                        </div>
                        <div class="product-details">
                            <h3>Description</h3>
                            <p><?=data['product_data']->productDescription?></p>
                        </div>
                        <div class="product-color">
                            <h4>Color</h4>
                            <div class="color-layout">
                                <input type="radio" name="color"  value="black" class="color-input">
                                <label for="black" class="black"></label>
                                <input type="radio" name="color"  value="red" class="color-input">
                                <label for="red" class="red"></label>

                                <input type="radio" name="color"  value="blue" class="color-input">
                                <label for="blue" class="blue"></label>
                            </div>
                        </div>
                        <span class="divider"></span>

                        <div class="product-btn-group">
                            <div class="button buy-now"><i class='bx bxs-zap' ></i> Buy Now</div>
                            <div class="button add-cart"><i class='bx bxs-cart' ></i> Add to Cart</div>
                            <div class="button heart"><i class='bx bxs-heart' ></i> Add to Wishlist</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--script-->
    <script src="script.js"></script>
</body>
</html>
