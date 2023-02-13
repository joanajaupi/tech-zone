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
            <form>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">New password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Password">
                    </div>
                </div>
                <button class="btn btn-primary" id="changePasswordButton" type="button" disabled="true">Change password</button>
            </form>
        </div>
    </div>
    <script src="<?= ROOT ?>assets/js/profile.js"></script>
</body>

</html>