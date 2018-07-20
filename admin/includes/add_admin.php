<?php

if (!$session->is_signed_in()) {
    header("Location: ../");
}

?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Add Admin</h1>
    </div>
    <div class="col-lg-6">
        <div id="adminMessage">

        </div>
        <!-- /.col-lg-12 -->
        <form action="" method="post" id="adminForm" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Name</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>
            <div class="form-group">
                <label for="title">Email</label>
                <input type="email" class="form-control" name="email" id="email">
            </div>
            <div class="form-group">
                <label for="title">Password</label>
                <input type="password" class="form-control" id="txtPassword" name="password">
            </div>
            <div class="form-group">
                <label for="title">Confirm Password</label>
                <input type="password" class="form-control" id="txtConfirmPassword" name="confirm_password">
            </div>
            <div class="form-group">
                <label for="title">Admin Role</label>
                <select name="admin_role" id="adminRole" class="form-control">
                    <option value="">--Select Role--</option>
                    <option value="admin">Admin</option>
                    <option value="operator">Operator</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" id="adminSubmit" name="submit" value="Add Admin">
            </div>
        </form>
    </div>
</div>