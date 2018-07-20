<?php
require_once("../classes/init.php");

$doctor = new Doctor();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!empty($_POST['doctor_name']) && !empty($_FILES['image']) && !empty(['father_name']) && !empty($_POST['mother_name']) &&
        !empty($_POST['email']) && !empty($_POST['doc_dob']) && !empty($_POST['mobile_no']) && !empty($_POST['contact_address']) &&
        !empty($_POST['designation']) && !empty($_POST['doc_join_date'])) {

        $doctor = new Doctor();
        $doctor->image = Doctor::set_image($_FILES['image']);
        $doctor->doctor_name = $_POST['doctor_name'];
        $doctor->father_name = $_POST['father_name'];
        $doctor->mother_name = $_POST['mother_name'];
        $doctor->email = $_POST['email'];
        $doctor->doc_dob = $_POST['doc_dob'];
        $doctor->mobile_no = $_POST['mobile_no'];
        $doctor->contact_address = $_POST['contact_address'];
        $doctor->designation = $_POST['designation'];
        $doctor->doc_join_date = $_POST['doc_join_date'];
        $doctor->status = 1;

        //print_r($doctor);

        if ($doctor->save()) {
            echo "<div class='alert alert-success'>Record Insert Successfully</div>";
        } else {
            echo "<div class='alert alert-danger'>Record Insert Failed</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Record Insert Failed</div>";
    }
}