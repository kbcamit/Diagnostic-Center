<?php
require_once("../classes/init.php");
$admin = new Admin();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!empty($_POST['adminName']) && !empty($_POST['adminEmail']) && !empty($_POST['password']) && !empty($_POST['adminRole'])) {
        $check = Admin::check_admin_email($_POST['adminEmail']);
        if (!$check) {
            $admin->admin_name = $_POST['adminName'];
            $admin->admin_email = $_POST['adminEmail'];
            $admin->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $admin->role = $_POST['adminRole'];
            $admin->status = 0;

            if ($admin->save()) {
                echo "<div class='alert alert-success'>Record Insert Successfully</div>";
            } else {
                echo "<div class='alert alert-danger'>Record Insert Failed</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Email Already Exists</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Record Insert Failed</div>";
    }
}