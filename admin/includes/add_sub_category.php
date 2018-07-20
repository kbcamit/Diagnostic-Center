<?php

if (!$session->is_signed_in()) {
    header("Location: ../");
}

$categories = Category::select_all_category();
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Add Sub Category</h1>
    </div>
    <div class="col-lg-6">
        <div id="subCategoryMessage">

        </div>
        <!-- /.col-lg-12 -->
        <form action="" method="post" id="subCategoryForm" enctype="multipart/form-data">
            <div class="form-group">
                <select name="category_id" id="categoryId" class="form-control">
                    <option value="">--Select Category--</option>
                    <?php while ($row = mysqli_fetch_assoc($categories)) { ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['category_name']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="title">Sub Test</label>
                <input type="text" class="form-control" id="subTest" name="sub_test">
            </div>
            <div class="form-group">
                <label for="title">Lab ID</label>
                <input type="text" class="form-control" name="lab_id" id="labID">
            </div>
            <div class="form-group">
                <label for="title">Sub Test Price</label>
                <input type="number" step="any" class="form-control" name="sub_test_price" id="subTestPrice">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" id="subCategoryBtn" name="submit" value="Add Sub Category">
            </div>
        </form>
    </div>
</div>