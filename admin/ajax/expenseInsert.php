<?php
require_once("../classes/init.php");
$expense = new Expense();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!empty($_POST['expenseName']) && !empty($_POST['expenseDesc'])) {
        $check = Expense::check_expense($_POST['expenseName']);
        if (!$check) {
            $expense->expense_name = $_POST['expenseName'];
            $expense->expense_desc = $_POST['expenseDesc'];
            $expense->status = 0;
            if ($expense->save()) {
                echo "<div class='alert alert-success'>Record Insert Successfully</div>";
            } else {
                echo "<div class='alert alert-danger'>Record Insert Failed</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Expense Record Already Inserted</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Record Insert Failed</div>";
    }
}