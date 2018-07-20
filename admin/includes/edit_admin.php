<?php
if (isset($_GET['admin_id'])) {
    $admin = Admin::find_by_id($_GET['admin_id']);
}
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Edit Admin</h1>
    </div>
    <div class="col-lg-6">
        <div id="editAdminMessage">

        </div>
        <!-- /.col-lg-12 -->
        <form action="" method="post" id="adminForm" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Name</label>
                <input type="text" value="<?php echo $admin->admin_name; ?>" class="form-control" name="name"
                       id="admin_name">
                <input type="hidden" value="<?php echo $admin->id; ?>" class="form-control" name="admin_id"
                       id="admin_id">
            </div>
            <div class="form-group">
                <label for="title">Email</label>
                <input type="email" value="<?php echo $admin->admin_email; ?>" class="form-control" name="admin_email"
                       id="admin_email">
            </div>
            <div class="form-group">
                <label for="title">Admin Role</label>
                <select name="admin_role" id="admin_role" class="form-control">
                    <option value="">--Select Role--</option>
                    <?php if ($admin->role == "admin") { ?>
                        <option value="admin" selected>Admin</option>
                        <option value="operator">Operator</option>
                    <?php } elseif ($admin->role == "operator") { ?>
                        <option value="operator" selected>Operator</option>
                        <option value="admin">Admin</option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="title">Password</label>
                <input type="password" class="form-control" id="password" name="admin_password"/>
            </div>
            <div class="form-group">
                <label for="title">Confirm Password</label>
                <input type="password" class="form-control" id="confirm_password" name="admin_confirm_password">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" id="editAdminSubmit" name="submit" value="Edit Admin">
            </div>
        </form>
    </div>
</div>