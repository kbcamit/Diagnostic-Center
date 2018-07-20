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
    <!-- /.row -->
    <!--container-->
    <?php include "includes/container.php"; ?>
    <!--end container-->
    <!-- /.row -->
</div>
<!-- /.row -->
<!-- /#page-wrapper -->

<!--footer-->
<?php include "includes/footer.php"; ?>
<!--end footer-->
