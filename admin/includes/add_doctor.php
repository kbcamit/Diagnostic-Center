<?php

if (!$session->is_signed_in()) {
    header("Location: ../");
}

/*$message = '';
if (isset($_POST['submit'])) {
    if (!empty($_POST['doctor_name']) && !empty($_FILES['image']) && !empty(['father_name']) && !empty($_POST['mother_name']) && !empty($_POST['email']) &&
        !empty($_POST['doc_dob']) && !empty($_POST['mobile_no']) && !empty($_POST['contact_address']) && !empty($_POST['designation']) && !empty($_POST['doc_join_date'])) {
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
        $doctor->status = 0;

        //print_r($doctor);

        if ($doctor->save()) {
            $message = "Record Save Successfully";
        } else {
            $message = "Record Save Failed";
        }
    }
}*/

?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Add Doctor</h1>
    </div>
    <div class="col-lg-6">
        <div id="docMessage">

        </div>
        <?php //echo $message; ?>
        <!-- /.col-lg-12 -->
        <form action="" method="post" id="doctorForm" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Image</label>
                <input type="file" class="form-control" id="docImage" name="image">
            </div>
            <div class="form-group">
                <label for="title">Doctor Name</label>
                <input type="text" class="form-control" id="docName" name="doctor_name">
            </div>
            <div class="form-group">
                <label for="title">Fathers Name</label>
                <input type="text" class="form-control" id="fatherName" name="father_name">
            </div>
            <div class="form-group">
                <label for="title">Mothers Name</label>
                <input type="text" class="form-control" id="motherName" name="mother_name">
            </div>
            <div class="form-group">
                <label for="title">Email</label>
                <input type="email" class="form-control" id="docEmail" name="email"><span
                        style="color: red; font-weight: bold"></span>
            </div>
            <div class="form-group">
                <label for="title">Date of Birth</label>
                <input type="text" id="datepicker" class="form-control" name="doc_dob">
            </div>
            <div class="form-group">
                <label for="title">Mobile No</label>
                <input type="text" class="form-control" id="docMobile" name="mobile_no">
            </div>
            <div class="form-group">
                <label for="title">Contact Address</label>
                <textarea class="form-control" name="contact_address" id="docContactAddress" cols="30"
                          rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="title">Designation</label>
                <textarea class="form-control" name="designation" id="docDesignation" cols="30"
                          rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="title">Join Date</label>
                <input type="text" id="datepicker2" class="form-control" name="doc_join_date">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="submit" id="docSubmit" value="Add Doctor">
            </div>
        </form>
    </div>
</div>