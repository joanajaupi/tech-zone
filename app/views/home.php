<?php $this->view("header", $data); ?>
<link rel="stylesheet" href="<?= ROOT ?>assets/css/home.css">
<?php $this->view("navbar", $data); ?>

</head>

<body>
  <!--carousel-->
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
        <img class="d-block w-100" src="<?php echo ROOT; ?>assets/images/imac-banner.jpg" alt="Second slide">
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
  <!--end carousel-->
  <div>
    <!--start of about us-->
  </div>
  <div class="responsive-container-block container">
    <p class="text-blk team-head-text">
      Our Team&nbsp;
    </p>
    <div class="responsive-container-block">
      <div class="responsive-cell-block wk-desk-3 wk-ipadp-3 wk-tab-6 wk-mobile-12 card-container">
        <div class="card">
          <div class="team-image-wrapper">
            <img class="team-member-image" src="<?=ROOT?>assets/images/108238766.jpeg">
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
            <img class="team-member-image" src="<?=ROOT?>assets/images/105079235.jpeg">
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

    <?php $this->view("footer", $data); ?>
</body>

</html>