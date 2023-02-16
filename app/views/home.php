<?php $this->view("header", $data); ?>
<link rel="stylesheet" href="<?= ROOT ?>assets/css/home.css">
<?php $this->view("navbar", $data); ?>
<style>
  body {
    background-color: #0a131f;
  }

  .card {
    background-color: #13293D;
    color: #fff;
    shadow: 5px 5px 5px 5px #fff;
  }

  .card:hover {
    background-color: #0a131f;
    color: #fff;
  }

  .feat {
    border-radius: 5px;
    margin-top: 50px;
    padding: 0px;
    text-align: center;
    font-size: 20px;
    font-weight: 500;
    background-color: #13293D;
    color: #fff;
  }

  .feat:hover {
    background-color: #0a131f;
    color: #fff;
  }

  .col-md-3 {
    width: 50%;
  }

  .img-fluid {
    max-width: 100%;
    height: 300px;
  }

  #discover {
    background-color: #fff;
    color: #13293D;
    font-weight: 900;
    border: none;
    width: 60%;
    margin: 0 auto;
    display: block;
    margin-top: 60px;
    margin-bottom: 10px;
  }

  #img {
    height: 300px;
    width: auto;
    fit: cover;
  }

  #img2 {
    height: 300px;
    width: auto;
    fit: cover;
    text-align: right;
  }

  .footer-basic {
    background-color: #0a131f;
    color: #fff;
    text-align: center;
    font-size: 20px;
    font-weight: 500;
    margin: 0 auto;
  }
</style>

</head>

<body>
  <!--carousel-->
  <div>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="<?php echo ROOT; ?>assets/images/iphonebanner.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100 cimage" src="<?php echo ROOT; ?>assets/images/imac-banner.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="<?php echo ROOT; ?>assets/images/hp-banner.webp" alt="Third slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
  <!--end carousel-->
  <!--featured products-->
  <div class="container">
    <h2 class="text-center text-white">"Experience tomorrow's technology today at our store!"</h2>
    <div class="card feat">
      <div class="card-body">
        <div class="row">
          <div class="col-md-3" id="img">
            <img src="<?php echo ROOT; ?>assets/images/discover1.jpg" alt="" class="img-fluid">
          </div>
          <div class="col-md-3">
            <p class="text-center">Laptops</p>
            <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec auctor, nisl eget ultricies tincidunt, nunc nisl aliquam nisl, vit
              ae semper nisl nunc nec nisl. Donec auctor, nisl eget ultricies tincidunt, nunc nisl aliquam nisl, vitae semper nisl nunc nec nisl.</p>
            <button class="btn btn-primary btn-block" id="discover">Discover More</button>
          </div>
        </div>
      </div>
    </div>
    <div class="card feat">
      <div class="card-body">
        <div class="row">
          <div class="col-md-3">
            <p class="text-center">Laptops</p>
            <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec auctor, nisl eget ultricies tincidunt, nunc nisl aliquam nisl, vit
              ae semper nisl nunc nec nisl. Donec auctor, nisl eget ultricies tincidunt, nunc nisl aliquam nisl, vitae semper nisl nunc nec nisl.</p>
            <button class="btn btn-primary btn-block" id="discover">Discover more</button>
          </div>
          <div class="col-md-3" id="img-2">
            <img src="<?php echo ROOT; ?>assets/images/discover2.jpg" alt="" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="featured-products">

  </div>
  <!--start of about us-->
  <div class="responsive-container-block container">
    <h1 class="text-center text-white">About Us</h1>
    <div class="responsive-container-block">
      <div class="responsive-cell-block wk-desk-3 wk-ipadp-3 wk-tab-6 wk-mobile-12 card-container">
        <div class="card">
          <div class="team-image-wrapper">
            <img class="team-member-image" src="<?= ROOT ?>assets/images/108238766.jpeg">
          </div>
          <p class="text-blk name">
            Joana Jaupi
          </p>
          <p class="text-blk position">
            CEO
          </p>
          <p class="text-blk feature-text">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
          </p>
          <div class="social-icons">
            <a href="https://www.github.com/joanajaupi">
              <i class="fa fa-github"></i>
            </a>
            <a href="https://www.linkedin.com/in/joana-jaupi/" target="_blank">
              <i class="fa fa-linkedin"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="responsive-cell-block wk-desk-3 wk-ipadp-3 wk-tab-6 wk-mobile-12 card-container">
        <div class="card">
          <div class="team-image-wrapper">
            <img class="team-member-image" src="<?= ROOT ?>assets/images/105079235.jpeg">
          </div>
          <p class="text-blk name">
            Kevin Tenolli
          </p>
          <p class="text-blk position">
            CEO
          </p>
          <p class="text-blk feature-text">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
          </p>
          <div class="social-icons">
            <a href="https://github.com/ProfessorGustavi">
              <i class="fa fa-github"></i>
            </a>
            <a href="https://www.facebook.com" target="_blank">
              <i class="fa fa-linkedin"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php $this->view('footer'); ?>