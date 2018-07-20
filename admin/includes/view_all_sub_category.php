<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">All Sub Category</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<?php
$subcategories = Sub_category::select_all_sub_category();
//print_r($subcategories);

if (isset($_GET['active_sub_category_status'])) {
    $sub_category = Sub_category::find_by_id($_GET['active_sub_category_status']);
    $sub_category->status = 1;

    if ($sub_category->save()) {
        header('Location: sub_categories.php');
    }
}

if (isset($_GET['inactive_sub_category_status'])) {
    $sub_category = Sub_category::find_by_id($_GET['inactive_sub_category_status']);
    $sub_category->status = 0;

    if ($sub_category->save()) {
        header('Location: sub_categories.php');
    }
}

if (isset($_GET['delete_sub_category'])) {
    $sub_category = Sub_category::find_by_id($_GET['delete_sub_category']);
    if ($sub_category->delete()) {
        header('Location: sub_categories.php');
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
                        <th>Serial No.</th>
                        <th>Category ID</th>
                        <th>Sub Category Name</th>
                        <th>Lab ID</th>
                        <th>Sub Test Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 0;
                    while ($row = mysqli_fetch_assoc($subcategories)) {
                        ?>
                        <tr class="odd gradeX">
                            <td><?php echo $i += 1; ?></td>
                            <td><?php echo $row['category_name']; ?></td>
                            <td><?php echo $row['sub_test']; ?></td>
                            <td><?php echo $row['lab_id']; ?></td>
                            <td><?php echo $row['sub_test_price']; ?></td>
                            <?php if ($row['status'] == 0) { ?>
                                <td class="center">
                                    <span class="label label-danger">Inactive</span>
                                </td>
                            <?php } else { ?>
                                <td class="center">
                                    <span class="label label-success">Active</span>
                                </td>
                            <?php } ?>
                            <td>
                                <?php if ($row['status'] == 0) { ?>
                                    <a class="btn btn-success"
                                       href="sub_categories.php?active_sub_category_status=<?php echo $row['id']; ?>">
                                        <i class="glyphicon glyphicon-thumbs-up"></i>
                                    </a>
                                <?php } else { ?>
                                    <a class="btn btn-success"
                                       href="sub_categories.php?inactive_sub_category_status=<?php echo $row['id']; ?>">
                                        <i class="glyphicon glyphicon-thumbs-down"></i>
                                    </a>
                                <?php } ?>
                                <a href="sub_categories.php?source=edit_sub_category&sub_category_id=<?php echo $row['id']; ?>"
                                   class="btn btn-success" title="Edit">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                                <a href="sub_categories.php?delete_sub_category=<?php echo $row['id']; ?>"
                                   class="btn btn-danger"
                                   title="Delete" onclick="return confirm('Are you sure want to delete!!')">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
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