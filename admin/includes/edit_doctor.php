<?php

if (!$session->is_signed_in()) {
    header("Location: ../");
}

$message = '';
if (isset($_GET['doctor_id'])) {
    $doctor = Doctor::find_by_id($_GET['doctor_id']);
}

/*if (isset($_POST['submit'])) {
    $image = Doctor::get_image($_FILES['image']);
    if (empty($image)) {
        $the_doctor = Doctor::find_by_id($_GET['doctor_id']);
        $image = $the_doctor->image;
    } else {
        $image = Doctor::set_image($_FILES['image']);
    }

    $doctor->image = $image;
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
        $message = "Record Updated Successfully";
    } else {
        $message = "Record Update Failed";
    }
}*/
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Edit Doctor</h1>
    </div>
    <div class="col-lg-6">
        <?php /*echo $message; */ ?>
        <div id="editDocMessage">

        </div>
        <!-- /.col-lg-12 -->
        <form action="" method="post" id="editDoctorForm" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Image</label>
                <img src="<?php echo $doctor->image_path(); ?>" width="100">
                <input type="file" class="form-control" name="image">
            </div>
            <input type="hidden" value="<?php echo $doctor->id; ?>" name="doc_id">
            <input type="hidden" value="<?php echo $doctor->image; ?>" name="old_image">
            <div class="form-group">
                <label for="title">Doctor Name</label>
                <input type="text" class="form-control" value="<?php echo $doctor->doctor_name; ?>" name="doctor_name">
            </div>
            <div class="form-group">
                <label for="title">Fathers Name</label>
                <input type="text" class="form-control" value="<?php echo $doctor->father_name; ?>" name="father_name">
            </div>
            <div class="form-group">
                <label for="title">Mothers Name</label>
                <input type="text" class="form-control" value="<?php echo $doctor->mother_name; ?>" name="mother_name">
            </div>
            <div class="form-group">
                <label for="title">Email</label>
                <input type="email" class="form-control" value="<?php echo $doctor->email; ?>" name="email">
            </div>
            <div class="form-group">
                <label for="title">Date of Birth</label>
                <input type="text" id="datepicker" class="form-control" value="<?php echo $doctor->doc_dob; ?>"
                       name="doc_dob">
            </div>
            <div class="form-group">
                <label for="title">Mobile No</label>
                <input type="text" class="form-control" value="<?php echo $doctor->mobile_no; ?>" name="mobile_no">
            </div>
            <div class="form-group">
                <label for="title">Contact Address</label>
                <textarea class="form-control" name="contact_address" id="" cols="30"
                          rows="10"><?php echo $doctor->contact_address; ?></textarea>
            </div>
            <div class="form-group">
                <label for="title">Designation</label>
                <textarea class="form-control" name="designation" id="" cols="30"
                          rows="10"><?php echo $doctor->designation; ?></textarea>
            </div>
            <div class="form-group">
                <label for="title">Join Date</label>
                <input type="text" id="datepicker2" class="form-control" value="<?php echo $doctor->doc_join_date; ?>"
                       name="doc_join_date">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="submit" value="Edit Doctor">
            </div>
        </form>
    </div>
</div>