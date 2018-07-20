<?php

if (isset($_POST['submit'])) {
    $from_date = $_POST['from_date'];
    $to_date = $_POST['to_date'];

    $reports = Expense_invoice::get_expense_details($from_date, $to_date);
}

?>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Expense Report
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Invoice No</th>
                        <th>Date</th>
                        <th>Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $total = 0;
                    while ($row = mysqli_fetch_assoc($reports)) { ?>
                        <tr class="odd gradeX">
                            <td><?php echo $row['invoice_no']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td><?php echo $row['amount']; ?></td>
                        </tr>
                        <?php $total += $row['amount'];
                    } ?>
                    <tr>
                        <td colspan="2">Total Expense</td>
                        <td><?php echo $total; ?></td>
                    </tr>
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