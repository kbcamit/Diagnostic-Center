<?php

if (!$session->is_signed_in()) {
    header("Location: ../");
}

?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Add Expense</h1>
    </div>
    <div class="col-lg-6">
        <div id="exMessage">

        </div>
        <!-- /.col-lg-12 -->
        <form action="" method="post" id="expenseForm" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Add Expense Category Name</label>
                <input type="text" class="form-control" name="expense_category_name" id="expense_category_name" required>
            </div>
            <div class="form-group">
                <label for="title">Add Expense Description</label>
                <textarea class="form-control" name="expense_desc" id="expense_desc" cols="30"
                          rows="10" required></textarea>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="submit" id="expenseSubmit" value="Save">
            </div>
        </form>
    </div>
</div>