<?php
require_once("../classes/init.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $category = Category::find_by_id($_POST['catId']);
    if (!empty($_POST['category'])) {
        $check = Category::check_category($_POST['category']);
        if (!$check) {
            $category->category_name = $_POST['category'];
            if ($category->save()) {
                echo "<div class='alert alert-success' style='text-align: center'>Record Updated Successfully</div>";
            } else {
                echo "<div class='alert alert-danger'>Record Update Failed</div>";
            }
        } else {
            echo "<div class='alert alert-danger' style='text-align: center'>Category Name Already Inserted</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Record Insert Failed</div>";
    }
}