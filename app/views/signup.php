<?php $this->view("header", $data)?>
<link rel="stylesheet" href="<?=ROOT?>/assets/css/signup.css">
    </head>
    <body>
    <div class="container">
    <?php check_error()?>
        <div class="signup">   
        <div class="mb-3">
            <div>
                <img src="<?=ROOT?>assets/images/user.png" alt="Avatar" class="avatar">
                <h3 style="text-align: center">Sign Up</h3>
            </div>
            <form method="POST" action="#">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name"required>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Surname</label>
                    <input type="text" class="form-control" id="surname" name="surname"required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" required>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3">
                    <label for="confirm-password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm-password" name="confirm-password" required>
                </div>
                <button type="submit" class="btn btn-primary">Sign Up</button>
                <div>
                    <p style="margin-top: 20px">Already have an account? <a href="<?=ROOT?>login" id="login-link">Login here</a></p>
                </div>
            </form>
        </div>
        </div>
