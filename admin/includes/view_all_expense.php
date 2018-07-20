<?php
$expenses = Expense::find_all();

if (isset($_GET['active_expense_status'])) {
    $expense = Expense::find_by_id($_GET['active_expense_status']);
    $expense->status = 1;

    if ($expense->save()) {
        header('Location: expenses.php');
    }
}

if (isset($_GET['inactive_expense_status'])) {
    $expense = Expense::find_by_id($_GET['inactive_expense_status']);
    $expense->status = 0;

    if ($expense->save()) {
        header('Location: expenses.php');
    }
}

if (isset($_GET['delete_expense'])) {
    $expense = Expense::find_by_id($_GET['delete_expense']);
    if ($expense->delete()) {
        header('Location: expenses.php');
    }
}
?>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                View All Expense
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Expense Category Name</th>
                        <th>Expense Description</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 0;
                    foreach ($expenses as $expense): ?>
                        <tr class="odd gradeX">
                            <td><?php echo $i += 1; ?></td>
                            <td><?php echo $expense->expense_name; ?></td>
                            <td><?php echo $expense->expense_desc; ?></td>
                            <?php if ($expense->status == 0) { ?>
                                <td class="center">
                                    <span class="label label-danger">Inactive</span>
                                </td>
                            <?php } else { ?>
                                <td class="center">
                                    <span class="label label-success">Active</span>
                                </td>
                            <?php } ?>
                            <td>
                                <?php if ($expense->status == 0) { ?>
                                    <a class="btn btn-success"
                                       href="expenses.php?active_expense_status=<?php echo $expense->id; ?>">
                                        <i class="glyphicon glyphicon-thumbs-up"></i>
                                    </a>
                                <?php } else { ?>
                                    <a class="btn btn-success"
                                       href="expenses.php?inactive_expense_status=<?php echo $expense->id; ?>">
                                        <i class="glyphicon glyphicon-thumbs-down"></i>
                                    </a>
                                <?php } ?>
                                <a href="expenses.php?source=edit_expense&expense_id=<?php echo $expense->id; ?>"
                                   class="btn btn-success" title="Edit">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                                <a href="expenses.php?delete_expense=<?php echo $expense->id; ?>"
                                   class="btn btn-danger"
                                   title="Delete" onclick="return confirm('Are you sure want to delete!!')">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
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