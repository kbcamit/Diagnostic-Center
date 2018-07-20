<?php require_once("classes/init.php"); ?>

<?php
if (!$session->is_signed_in()) {
    header("Location: ../");
}
?>

<?php include "includes/header.php"; ?>


<!--top nav-->
<?php include "includes/top_nav.php"; ?>
<!--end top nav-->


<!--side nav-->
<?php include "includes/side_nav.php"; ?>
<!--end side nav-->


<div id="page-wrapper">

    <?php
    if (isset($_GET['source'])) {
        $source = $_GET['source'];
    } else {
        $source = '';
    }
    switch ($source) {
        case 'add_admin':
            require_once("includes/add_admin.php");
            break;
        case 'manage_admin';
            require_once("includes/manage_admin.php");
            break;
        case 'edit_admin';
            require_once("includes/edit_admin.php");
            break;
        case 'company_settings';
            require_once("includes/company_settings.php");
            break;
    }
    ?>

</div>
<!-- /.row -->
<!-- /#page-wrapper -->

<!--footer-->
<?php include "includes/footer.php"; ?>
<!--end footer-->
