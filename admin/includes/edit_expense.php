<?php

if (!$session->is_signed_in()) {
    header("Location: ../");
}

if (isset($_GET['expense_id'])) {
    $expense = Expense::find_by_id($_GET['expense_id']);
}

?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Edit Expense</h1>
    </div>
    <div class="col-lg-6">
        <div id="editExMessage">

        </div>

        <!-- /.col-lg-12 -->
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Add Expense Category Name</label>
                <input type="text" class="form-control" id="editExpenseNameTxt"
                       value="<?php echo $expense->expense_name; ?>"
                       name="expense_category_name">
                <input type="hidden" class="form-control" id="editExpenseIdTxt" value="<?php echo $expense->id; ?>"
                       name="expense_id">
            </div>
            <div class="form-group">
                <label for="title">Add Expense Description</label>
                <textarea class="form-control" name="expense_desc" id="editExpenseDesc" cols="30"
                          rows="10"><?php echo $expense->expense_desc; ?></textarea>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" id="editExpenseBtn" name="submit" value="Update Expense">
            </div>
        </form>
    </div>
</div>