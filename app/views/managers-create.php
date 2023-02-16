<?php $this->view("header", $data); ?>
<?php $this->view("admin-sidebar", $data); ?>
<div class="center">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id = "table">
                        <thead>
                            <tr>
                                <th  scope="col">Name</th>
                                <th  scope="col">Surname</th>
                                <th  scope="col">Email</th>
                                <th  scope="col">Role</th>
                                <th  scope="col">Action</th>
                            </tr>
                        </thead>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>