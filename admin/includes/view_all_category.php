<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">All Category</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<?php
$categories = Category::find_all();

if (isset($_GET['active_category_status'])) {
    $category = Category::find_by_id($_GET['active_category_status']);
    $category->status = 1;

    if ($category->save()) {
        header('Location: categories.php');
    }
}

if (isset($_GET['inactive_category_status'])) {
    $category = Category::find_by_id($_GET['inactive_category_status']);
    $category->status = 0;

    if ($category->save()) {
        header('Location: categories.php');
    }
}

if (isset($_GET['delete_category'])) {
    $category = Category::find_by_id($_GET['delete_category']);
    if ($category->delete()) {
        header('Location: categories.php');
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
                        <th>Category Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 0;
                    foreach ($categories as $category): ?>
                        <tr class="odd gradeX">
                            <td><?php echo $i += 1; ?></td>
                            <td><?php echo $category->category_name; ?></td>
                            <?php if ($category->status == 0) { ?>
                                <td class="center">
                                    <span class="label label-danger">Inactive</span>
                                </td>
                            <?php } else { ?>
                                <td class="center">
                                    <span class="label label-success">Active</span>
                                </td>
                            <?php } ?>
                            <td>
                                <?php if ($category->status == 0) { ?>
                                    <a class="btn btn-success" title="Active"
                                       href="categories.php?active_category_status=<?php echo $category->id; ?>">
                                        <i class="glyphicon glyphicon-thumbs-up"></i>
                                    </a>
                                <?php } else { ?>
                                    <a class="btn btn-success" title="Inactive"
                                       href="categories.php?inactive_category_status=<?php echo $category->id; ?>">
                                        <i class="glyphicon glyphicon-thumbs-down"></i>
                                    </a>
                                <?php } ?>
                                <a href="categories.php?source=edit_category&category_id=<?php echo $category->id; ?>"
                                   class="btn btn-success" title="Edit">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                                <a href="categories.php?delete_category=<?php echo $category->id; ?>"
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