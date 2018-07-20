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
        case 'add_expense':
            require_once("includes/add_expense.php");
            break;
        case 'edit_expense':
            require_once("includes/edit_expense.php");
            break;
        default:
            require_once("includes/view_all_expense.php");
            break;
    }
    ?>

</div>
<!-- /.row -->
<!-- /#page-wrapper -->

<!--footer-->
<?php include "includes/footer.php"; ?>
<!--end footer-->
