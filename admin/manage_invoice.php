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
        case 'today_invoice':
            require_once("includes/today_invoice.php");
            break;
        case 'custom_invoice':
            require_once("includes/custom_invoice.php");
            break;
        case 'custom_doctor_invoice':
            require_once("includes/custom_doctor_invoice.php");
            break;
        case 'view_custom_invoice':
            require_once("includes/view_custom_invoice.php");
            break;
        case 'view_custom_doctor_invoice':
            require_once("includes/view_custom_doctor_invoice.php");
            break;
        case 'print_invoice_details':
            require_once("includes/print_invoice_details.php");
            break;
    }
    ?>

</div>
<!-- /.row -->
<!-- /#page-wrapper -->

<!--footer-->
<?php include "includes/footer.php"; ?>
<!--end footer-->
