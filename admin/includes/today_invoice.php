<?php
$today_invoices = Invoice::get_all_invoice_info();
//print_r($today_invoices);
?>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Today's All Invoice Information
            </div>
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
                        <th>Total Amount</th>
                        <th>Ref. By</th>
                        <th>Entry By</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php while ($row = mysqli_fetch_assoc($today_invoices)) { ?>
                        <tr class="odd gradeX">
                            <td><?php echo $row['invoice_no']; ?></td>
                            <td><?php echo $row['delivery_date']; ?></td>
                            <td><?php echo $row['invoice_type']; ?></td>
                            <td><?php echo $row['patient_name']; ?></td>
                            <td><?php echo $row['sub_test']; ?></td>
                            <td><?php echo $row['total']; ?></td>
                            <td><?php echo $row['doctor_name']; ?></td>
                            <td><?php echo $row['admin_name']; ?></td>
                            <td>
                                <a href="manage_invoice.php?source=print_invoice_details&invoice_no=<?php echo $row['invoice_no']; ?>"
                                   class="btn btn-success" title="Print">
                                    <span class="glyphicon glyphicon-print"></span>
                                </a>
                                <a href="doctors.php?delete_doctor=<?php ?>"
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