<?php
require_once("../classes/init.php");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $admin = Admin::find_by_id($_POST['adminId']);
    if (!empty($_POST['adminName']) && !empty($_POST['adminEmail']) && !empty($_POST['adminRole'])) {
        //$check = Admin::check_admin_details($_POST['adminName'], $_POST['adminEmail'], $_POST['adminRole']);
        /*if (!$check) {*/
        if (empty($_POST['password'])) {
            $password = $admin->password;
            $admin->password = $password;
        } else {
            $admin->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        }
        $admin->admin_name = $_POST['adminName'];
        $admin->admin_email = $_POST['adminEmail'];
        $admin->role = $_POST['adminRole'];

        if ($admin->save()) {
            echo "<div class='alert alert-success'>Record Updated Successfully</div>";
        } else {
            echo "<div class='alert alert-danger'>Record Update Failed</div>";
        }
        /* } else {
             echo "<div class='alert alert-danger'>Record did not updated</div>";
         }*/
    } else {
        echo "<div class='alert alert-danger'>Record Update Failed</div>";
    }
}