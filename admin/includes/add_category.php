<?php

if (!$session->is_signed_in()) {
    header("Location: ../");
}

?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Add Category</h1>
    </div>
    <div class="col-lg-6">

        <div id="message">

        </div>
        <!-- /.col-lg-12 -->
        <form action="" method="post" id="categoryForm" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Add Category</label>
                <input type="text" class="form-control" id="category_name" name="category_name" required>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" id="categorySubmit" name="submit" value="Add Category">
            </div>
        </form>
    </div>
</div>