<?php
require_once("../classes/init.php");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!empty($_POST['invoiceNo']) && !empty($_POST['date']) && !empty($_POST['expenseInvoiceCategory']) &&
        !empty($_POST['expenseInvoiceDesc']) && !empty($_POST['amount'])) {
        $expense_invoice = new Expense_invoice();
        $expense_invoice->invoice_no = $_POST['invoiceNo'];
        $expense_invoice->date = $_POST['date'];
        $expense_invoice->expense_id = $_POST['expenseInvoiceCategory'];
        $expense_invoice->description = $_POST['expenseInvoiceDesc'];
        $expense_invoice->amount = $_POST['amount'];
        $expense_invoice->admin_id = $_SESSION['admin_id'];

        //print_r($expense_invoice);

        if ($expense_invoice->save()) {
            echo "<div class='alert alert-success'>Record Insert Successfully</div>";
        } else {
            echo "<div class='alert alert-danger'>Record Insert Failed</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Record Insert Failed</div>";
    }
}