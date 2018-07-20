<?php
require_once("admin/classes/init.php");

if ($session->is_signed_in()) {
    header("Location: admin");
}

$the_message = '';
if (isset($_POST['submit'])) {
    $username = trim($_POST['email']);
    $password = trim($_POST['password']);

    $admin_found = Admin::verify_admin($username, $password);

    //print_r($user_found);

    if ($admin_found) {
        $session->login($admin_found);
        header("Location: admin");
    } else {
        $the_message = "Your password or username are incorrect";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Clinical Diagnostic Management System</title>

    <!-- Bootstrap Core CSS -->
    <link href="admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="admin/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div class="container">

    <div class="row">
        <div class="text-center">
            <img style="width: 100px; height:100px;margin-top: 20px" src="admin/images/if_stethoscope_38717.png">
            <h4>Clinical Diagnostic Management System</h4>
        </div>
        <div class="col-md-4 col-md-offset-4" style="margin-top: -60px">
            <div class="login-panel panel panel-default">

                <div class="panel-heading">
                    <h4 class="danger"><?php echo $the_message; ?></h4>
                    <h3 class="panel-title">Please Sign In</h3>
                </div>
                <div class="panel-body">

                    <form action="" method="post">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password"
                                       value="">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                </label>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <input type="submit" name="submit" value="Login" class="btn btn-lg btn-success btn-block">
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="admin/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="admin/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="admin/vendor/metisMenu/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="admin/dist/js/sb-admin-2.js"></script>

</body>

</html>
