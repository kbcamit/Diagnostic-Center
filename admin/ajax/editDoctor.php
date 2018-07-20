<?php
require_once("../classes/init.php");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $doctor = Doctor::find_by_id($_POST['doc_id']);
    //print_r($doctor);
    if (!empty($doctor)) {
        $image = $_FILES['image'];
        if ($image['name'] != '' && $image['size'] != 0) {
            $doctor->image = Doctor::set_image($image);
            unlink("../images/" . $_POST['old_image']);
        } else {
            $doctor->image = $_POST['old_image'];
        }
        $doctor->doctor_name = $_POST['doctor_name'];
        $doctor->father_name = $_POST['father_name'];
        $doctor->mother_name = $_POST['mother_name'];
        $doctor->email = $_POST['email'];
        $doctor->doc_dob = $_POST['doc_dob'];
        $doctor->mobile_no = $_POST['mobile_no'];
        $doctor->contact_address = $_POST['contact_address'];
        $doctor->designation = $_POST['designation'];
        $doctor->doc_join_date = $_POST['doc_join_date'];

        if ($doctor->save()) {
            echo "<div class='alert alert-success' style='text-align: center'>Record Updated Successfully</div>";
        } else {
            echo "<div class='alert alert-danger'>Record Update Failed</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Record Update Failed</div>";
    }
}