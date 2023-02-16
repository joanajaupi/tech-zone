<?php $this->view("header", $data); ?>
<link rel="stylesheet" href="<?= ROOT ?>assets/css/product.css" type="text/css">
<style>
    .writeAReview{
        background-color: #92B4A7;
        width: 60%;
        margin: 0 auto;
        padding: 20px;
        border-radius: 10px;

    }
    #review{
        margin-bottom: 10px;
        background-color: #B7CDC4;
    }
    #reviewDiv{
        width: 60%;
        margin: 0 auto;
        padding: 20px;
        border-radius: 10px;
        margin-top: 20px;
        
    }
</style>
</head>

<body>
    <?php $this->view("navbar", $data); ?>
    <section>
        <div class="container px4 px-lg-5" id="productDiv">

        </div>
        <div class="writeAReview">
        <h3>Write a review</h3>
            <form method="POST">
                <div class="mb-3">
                    <label for="review" class="form-label">Review Description</label>
                    <textarea class="form-control" id="review" name="review" rows="4"></textarea>
                </div>
                <div class="mb-3">
                    <label for="rating" class="form-label">Rating</label>
                    <select class="form-select" aria-label="Default select example" id="rating" name="rating">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" id="submit">Submit</button>

            </form>
        </div>

        <div id="reviewDiv">
            
        </div>
    </section>

    <script src="<?= ROOT ?>assets/js/product.js"></script>
</body>

</html>