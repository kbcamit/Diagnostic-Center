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
        case 'income_report':
            require_once("includes/income_report.php");
            break;
        case 'view_income_report':
            require_once("includes/view_income_report.php");
            break;
        case 'expense_report':
            require_once("includes/expense_report.php");
            break;
        case 'view_expense_report':
            require_once("includes/view_expense_report.php");
            break;
        case 'total_report':
            require_once("includes/total_report.php");
            break;
        case 'view_total_report':
            require_once("includes/view_total_report.php");
            break;
    }
    ?>

</div>
<!-- /.row -->
<!-- /#page-wrapper -->

<!--footer-->
<?php include "includes/footer.php"; ?>
<!--end footer-->
