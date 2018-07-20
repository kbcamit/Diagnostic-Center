<?php
$admins = Admin::find_all();

if (isset($_GET['active_admin_status'])) {
    $admin = Admin::find_by_id($_GET['active_admin_status']);
    $admin->status = 1;

    if ($admin->save()) {
        header('Location: settings.php?source=manage_admin');
    }
}

if (isset($_GET['inactive_admin_status'])) {
    $admin = Admin::find_by_id($_GET['inactive_admin_status']);
    $admin->status = 0;

    if ($admin->save()) {
        header('Location: settings.php?source=manage_admin');
    }
}

if (isset($_GET['delete_admin'])) {
    $admin = Admin::find_by_id($_GET['delete_admin']);
    if ($admin->delete()) {
        header('Location: settings.php?source=manage_admin');
    }
}
?>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                View All Categories
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 0;
                    foreach ($admins as $admin): ?>
                        <tr class="odd gradeX">
                            <td><?php echo $admin->admin_name; ?></td>
                            <td><?php echo $admin->admin_email; ?></td>
                            <td><?php echo $admin->role; ?></td>
                            <?php if ($admin->status == 0) { ?>
                                <td class="center">
                                    <span class="label label-danger">Inactive</span>
                                </td>
                            <?php } else { ?>
                                <td class="center">
                                    <span class="label label-success">Active</span>
                                </td>
                            <?php } ?>
                            <td>
                                <?php if ($admin->status == 0) { ?>
                                    <a class="btn btn-success" title="Active"
                                       href="settings.php?source=manage_admin&active_admin_status=<?php echo $admin->id; ?>">
                                        <i class="glyphicon glyphicon-thumbs-up"></i>
                                    </a>
                                <?php } else { ?>
                                    <a class="btn btn-success" title="Inactive"
                                       href="settings.php?source=manage_admin&inactive_admin_status=<?php echo $admin->id; ?>">
                                        <i class="glyphicon glyphicon-thumbs-down"></i>
                                    </a>
                                <?php } ?>
                                <a href="settings.php?source=edit_admin&admin_id=<?php echo $admin->id; ?>"
                                   class="btn btn-success" title="Edit">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                                <a href="settings.php?source=manage_admin&delete_admin=<?php echo $admin->id; ?>"
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