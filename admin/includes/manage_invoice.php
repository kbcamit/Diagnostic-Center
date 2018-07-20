<?php

$invoices = Invoice::find_all_invoices();

$message = '';
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}

if (isset($_GET['dlt_invoice'])) {
    $invoice_delete = payment::delete_invoice($_GET['dlt_invoice']);
    $patient_delete = Invoice::delete_patient($_GET['dlt_invoice']);
    $payment_delete = clear_payment::delete_payment($_GET['dlt_invoice']);
    //$message = "<div class='alert alert-success'>Record Deleted Successfully</div>";
    header("Location: invoices.php?source=manage_invoice");
}

?>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Invoice Information
            </div>
            <br>
            <?php echo $message; ?>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>Invoice No</th>
                        <th>Date</th>
                        <th>Invoice Type</th>
                        <th>Patient</th>
                        <th>Test Name</th>
                        <th>Paid</th>
                        <th>Due</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php while ($row = mysqli_fetch_assoc($invoices)) {
                        $patient_info = Invoice::find_patient_info($row['invoice_no']);
                        $test_info = Sub_category::find_by_id($row['sub_test_id']);
                        $payment_info = Invoice::find_payment_info($row['invoice_no']);
                        ?>
                        <tr class="odd gradeX">
                            <td><?php echo $row['invoice_no']; ?></td>
                            <td><?php echo $patient_info['delivery_date']; ?></td>
                            <td><?php echo $patient_info['invoice_type']; ?></td>
                            <td><?php echo $patient_info['patient_name']; ?></td>
                            <td><?php echo $test_info->sub_test; ?></td>
                            <td><?php echo $payment_info['paid']; ?></td>
                            <td><?php echo $payment_info['due']; ?></td>
                            <td>
                                <a href="invoices.php?source=edit_invoice&invoice_no=<?php echo $row['invoice_no']; ?>"
                                   class="btn btn-success" title="Edit">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                                <a href="invoices.php?source=manage_invoice&dlt_invoice=<?php echo $row['invoice_no']; ?>"
                                   class="btn btn-danger"
                                   title="Delete" onclick="return confirm('Are you sure want to delete!!')">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>