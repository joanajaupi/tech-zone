<?php $this->view("header", $data); ?>
<link rel="stylesheet" href="<?= ROOT ?>assets/css/product.css" type="text/css">
</head>

<body>
    <?php $this->view("navbar", $data); ?>
    <section>
        <div class="container px4 px-lg-5" id="productDiv">

        </div>
    </section>

    <script src="<?= ROOT ?>assets/js/product.js"></script>
</body>

</html>