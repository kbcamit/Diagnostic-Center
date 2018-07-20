<?php

if (!$session->is_signed_in()) {
    header("Location: ../");
}

if (isset($_GET['category_id'])) {
    $category = Category::find_by_id($_GET['category_id']);
}

?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Edit Category</h1>
    </div>
    <div class="col-lg-6">
        <div id="catMessage">

        </div>
        <!-- /.col-lg-12 -->
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Edit Category</label>
                <input type="text" class="form-control" id="editCatTextBox" name="category_name"
                       value="<?php echo $category->category_name; ?>">
                <input type="hidden" class="form-control" id="CatId" name="category_name"
                       value="<?php echo $category->id; ?>">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" id="editCategorySubmit" name="submit"
                       value="Update Category">
            </div>
        </form>
    </div>
</div>