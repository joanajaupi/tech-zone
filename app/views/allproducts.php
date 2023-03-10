<?php $this->view("header", $data); ?>
<style>
    #name{
    font-size: 1.5em;
    font-weight: bold;
    color: #000;
    text-align: center;
    margin: 0;
    padding: 0;
    margin-bottom: 10px;
}
#price{
    font-size: 1.2em;
    font-weight: bold;
    color: #000;
    text-align: center;
    margin: 0;
    padding: 0;
    margin-bottom: 10px;
}
.card {
    width: 300px;
    margin: 10px;
}
.card-img-top {
    width: 100%;
    height: 15vw;
    object-fit: cover;
}
.card-body {
    padding: 0.5rem;
}
</style>
<?php $this->view("navbar", $data); ?>

<!--Display all products-->
<div class='container text-center'> 
    <div class='row align-items-start' id="products">
</div>

<?php $this->view("footer", $data); ?>
<script src="<?=ROOT?>assets/js/allproducts.js"></script>
</body>
</html>