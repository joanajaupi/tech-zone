<?php $this->view("header", $data); ?>
<link rel="stylesheet" href="<?=ROOT?>/assets/css/login.css">
</head>
<body>
    <div class="container">
        <div class="login">
        <div class="mb-3">
        <?php check_error()?>
            <div>
                <img src="<?=ROOT?>assets/images/user.png" alt="Avatar" class="avatar">
                <h3 style="text-align: center">Login</h3>
            </div>

<form method="POST">
    <div class="mb-3">
    <label for="email" class="form-label" >Email address</label>
    <input type="email" class="form-control" id="email" name="email">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <button type="submit" class="btn btn-primary" name="login">Login</button>
  <div>
   <p style="margin-top: 20px">Don't have an account yet? <a href="<?=ROOT?>signup" id="register-link">Register here</a></p>
    </div>
</form>
        
</div>
</div>
</body>
</html>