<?php
$doctors = Doctor::find_all();

if (isset($_GET['active_doctor_status'])) {
    $doctor = Doctor::find_by_id($_GET['active_doctor_status']);
    $doctor->status = 1;

    if ($doctor->save()) {
        header('Location: doctors.php');
    }
}

if (isset($_GET['inactive_doctor_status'])) {
    $doctor = Doctor::find_by_id($_GET['inactive_doctor_status']);
    $doctor->status = 0;

    if ($doctor->save()) {
        header('Location: doctors.php');
    }
}

if (isset($_GET['delete_doctor'])) {
    $doctor = Doctor::find_by_id($_GET['delete_doctor']);
    if ($doctor->delete()) {
        header('Location: doctors.php');
    }
}
?>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                View All Doctors
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Address</th>
                        <th>Designation</th>
                        <th>Join Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($doctors as $doctor): ?>
                        <tr class="odd gradeX">
                            <td><?php echo $doctor->doctor_name; ?></td>
                            <td><img src="<?php echo $doctor->image_path(); ?>" alt="" width="60px" height="50px"></td>
                            <td><?php echo $doctor->email; ?></td>
                            <td><?php echo $doctor->mobile_no; ?></td>
                            <td><?php echo $doctor->contact_address; ?></td>
                            <td><?php echo $doctor->designation; ?></td>
                            <td><?php echo $doctor->doc_join_date; ?></td>
                            <?php if ($doctor->status == 0) { ?>
                                <td class="center">
                                    <span class="label label-danger">Inactive</span>
                                </td>
                            <?php } else { ?>
                                <td class="center">
                                    <span class="label label-success">Active</span>
                                </td>
                            <?php } ?>
                            <td>
                                <?php if ($doctor->status == 0) { ?>
                                    <a class="btn btn-success"
                                       href="doctors.php?active_doctor_status=<?php echo $doctor->id; ?>">
                                        <i class="glyphicon glyphicon-thumbs-up"></i>
                                    </a>
                                <?php } else { ?>
                                    <a class="btn btn-success"
                                       href="doctors.php?inactive_doctor_status=<?php echo $doctor->id; ?>">
                                        <i class="glyphicon glyphicon-thumbs-down"></i>
                                    </a>
                                <?php } ?>
                                <a href="doctors.php?source=edit_doctor&doctor_id=<?php echo $doctor->id; ?>"
                                   class="btn btn-success" title="Edit">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                                <a href="doctors.php?delete_doctor=<?php echo $doctor->id; ?>"
                                   class="btn btn-danger"
                                   title="Delete" onclick="return confirm('Are you sure want to delete!!')">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>