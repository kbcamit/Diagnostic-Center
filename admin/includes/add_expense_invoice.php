<?php

if (!$session->is_signed_in()) {
    header("Location: ../");
}

$expense_categories = Expense::get_all_expenses();
//print_r($expense_categories);

$message = '';
if (isset($_POST['submit'])) {

}
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Set Expense Information</h1>
    </div>
    <div class="col-lg-6">
        <div id="expenseInvoiceMessage">

        </div>
        <!-- /.col-lg-12 -->
        <form action="" method="post" id="expenseInvoiceForm" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Invoice No</label>
                <input type="number" class="form-control" name="invoice_no" id="invoiceNo">
            </div>
            <div class="form-group">
                <label for="title">Date</label>
                <input type="text" id="datepicker" class="form-control" name="date">
            </div>
            <div class="form-group">
                <label for="title">Expense Category</label>
                <select name="expense_category" class="form-control" id="expenseInvoiceCategory">
                    <option value="">--Select Expense Category--</option>
                    <?php foreach ($expense_categories as $expense_category): ?>
                        <option value="<?php echo $expense_category->id; ?>"><?php echo $expense_category->expense_name; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="title">Description</label>
                <textarea class="form-control" name="description" id="expenseInvoiceDesc" cols="30"
                          rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="title">Amount</label>
                <input type="number" step="any" class="form-control" name="amount" id="amount">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="submit" id="expenseInvoiceBtn" value="Confirm">
            </div>
        </form>
    </div>
</div>