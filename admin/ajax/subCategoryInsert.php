<?php
require_once("../classes/init.php");

$sub_category = new Sub_category();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!empty($_POST['categoryId']) && !empty($_POST['subTest']) && !empty($_POST['labId']) && !empty($_POST['subTestPrice'])) {
        $sub_category_check = Sub_category::check_sub_category($_POST['subTest']);
        if (!$sub_category_check) {
            $sub_category->category_id = $_POST['categoryId'];
            $sub_category->sub_test = $_POST['subTest'];
            $sub_category->lab_id = $_POST['labId'];
            $sub_category->sub_test_price = $_POST['subTestPrice'];
            $sub_category->status = 1;

            if ($sub_category->save()) {
                echo "<div class='alert alert-success'>Record Insert Successfully</div>";
            } else {
                echo "<div class='alert alert-danger'>Record Insert Failed</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Sub Category Test Already Inserted</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Record Insert Failed</div>";
    }
}