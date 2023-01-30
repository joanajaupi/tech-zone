<?php $this->view("header", $data); ?>
<?php $this->view("navbar", $data); ?>
</head>
<body>

    <!--carousel-->
    
    <div id="mainCarousel" class="carousel slide" data-interval="4000">
                <div class="carousel-indicators">
                  <?php $result= json_decode(json_encode($data['carousel']), true); ?>
                    <?php foreach($result as $key => $value): ?>
                        <?php if($key === 0): ?>
                            <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="<?=$key?>" class="active" aria-current="true" aria-label="Slide <?=$key?>"></button>
                          <?php else: ?>
                            <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="<?=$key?>" aria-label="Slide <?=$key?>"></button>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <div class="carousel-inner">
                  <?php $result= json_decode(json_encode($data['carousel']), true); ?>
                    <?php foreach($result as $key => $value): ?>
                        <?php if($key === 0): ?>
                            <div class="carousel-item active"> 
                              <img src="<?=ROOT?>assets/images/<?=$value['fileName']?>" class ="d-block w-100">
                            </div>
                          <?php else: ?>
                            <div class="carousel-item">
                               <img src="<?=ROOT?>assets/images/<?=$value['fileName']?>" class="d-block w-100">
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <a class="carousel-control-prev" href="#mainCarousel" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#mainCarousel" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                        </a>                   
            </div>

</body>

</html>
