<?php $this->view("header", $data); ?>
<link rel="stylesheet" href="<?= ROOT ?>assets/css/profile.css">
</head>

<body>
    <?php $this->view("navbar", $data); ?>

    <div>
        <h1>Profile Information</h1>
        <h2>Check your user information and login credentials. Modify them as you wish</h2>
    </div>
    <div class="d-flex flex-row justify-content-center">
        <div class="container-sm w-10 border border-warning rounded-1">
            <h3>Personal Information</h3>
            <form>
                <div id="userInformation"></div>
                <button type="button" class="btn btn-primary float-start" id="personalInfoButton">Edit Information</button>
                <div id="userInfoAlert" class="float-end hidden alert"></div>
            </form>
        </div>
        <div class="container-sm w-70 border border-info rounded-1">
            <h3>Change password information</h3>
            <h5>Password should be at least 8 characters long and contain at least 1 uppercase letter and one number. It should not exceed 16 characters.</h5>
            <br>
            <br>
            <form>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">New password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Password">
                    </div>
                </div>
                <br>
                <button class="btn btn-primary float-start" id="changePasswordButton" type="button" disabled="true">Change password</button>
                <div id="passwordChangeAlert" class="float-end hidden alert">Hello</div>
            </form>
        </div>
    </div>
    <script src="<?= ROOT ?>assets/js/profile.js"></script>
</body>

</html>