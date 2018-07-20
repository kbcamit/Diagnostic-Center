<?php

if (isset($_POST['submit'])) {
    $from_date = $_POST['from_date'];
    $to_date = $_POST['to_date'];

    $exp_reports = Expense_invoice::get_expense_details($from_date, $to_date);
    $income_reports = payment::get_income_info($from_date, $to_date);

    $total_income = 0;
    while ($total_row = mysqli_fetch_assoc($income_reports)) {
        $total_income += $total_row['total'];
    }

    $total_expense = 0;
    while ($row = mysqli_fetch_assoc($exp_reports)) {
        $total_expense += $row['amount'];
    }
}

?>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Total Report
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover">
                    <tbody>
                    <tr>
                        <td>Total Income</td>
                        <td><?php echo $total_income; ?></td>
                    </tr>
                    <tr>
                        <td>Total Expense</td>
                        <td><?php echo $total_expense; ?></td>
                    </tr>
                    <tr>
                        <?php
                        if ($total_income > $total_expense) {
                            ?>
                            <td colspan="1">Profit</td>
                            <td><?php echo $total_income - $total_expense; ?></td>
                        <?php } else { ?>
                            <td colspan="1">Loss</td>
                            <td><?php echo $total_expense - $total_income; ?></td>
                        <?php } ?>
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