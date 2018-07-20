<?php
require_once("../classes/init.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $expense = Expense::find_by_id($_POST['expenseId']);
    if (!empty($_POST['expenseName']) && !empty($_POST['expenseDesc'])) {
        $check = Expense::check_expense_description($_POST['expenseName'], $_POST['expenseDesc']);
        if (!$check) {
            $expense->expense_name = $_POST['expenseName'];
            $expense->expense_desc = $_POST['expenseDesc'];

            if ($expense->save()) {
                echo "<div class='alert alert-success'>Record Updated Successfully</div>";
            } else {
                echo "<div class='alert alert-danger'>Record Update Failed</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Expense did not updated</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Record Update Failed</div>";
    }
}