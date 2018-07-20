<?php
require_once("../classes/init.php");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $category = new Category();
    if (!empty($_POST['category'])) {
        $check = Category::check_category($_POST['category']);
        if (!$check) {
            $category->category_name = $_POST['category'];
            $category->status = 1;
            if ($category->save()) {
                echo "<div class='alert alert-success'>Record Insert Successfully</div>";
            } else {
                echo "<div class='alert alert-danger'>Record Insert Failed</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Category Name Already Inserted</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Record Insert Failed</div>";
    }
}