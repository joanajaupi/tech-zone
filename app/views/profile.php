<?php $this->view("header", $data); ?>
</head>

<body>
    <?php $this->view("navbar", $data); ?>
    <div class="container-sm">
        <form>
            <div id="userInformation"></div>
            <button type="button" class="btn btn-primary" id="personalInfoButton">Edit Information</button>
        </form>

        <form>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Password">
                </div>
            </div>
            <button class="btn btn-primary" id="changePasswordButton" type="button" disabled="true">Change password</button>
        </form>
    </div>
    <script src="<?= ROOT ?>assets/js/profile.js"></script>
</body>

</html>