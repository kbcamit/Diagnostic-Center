<?php

if (!$session->is_signed_in()) {
    header("Location: ../");
}

$categories = Category::find_all();
$message = '';
if (isset($_GET['sub_category_id'])) {
    $sub_category = Sub_category::find_by_id($_GET['sub_category_id']);
    //print_r($sub_category);
    if ($sub_category) {
        global $category_name;
        $category_name = Category::find_by_id($sub_category->category_id);
        //print_r($category_name);
    }
}
if (isset($_POST['submit'])) {
    $sub_category->category_id = $_POST['category_id'];
    $sub_category->sub_test = $_POST['sub_test'];
    $sub_category->lab_id = $_POST['lab_id'];
    $sub_category->sub_test_price = $_POST['sub_test_price'];

    if ($sub_category->save()) {
        $message = "Record Updated Successfully";
    } else {
        $message = "Record Updated failed";
    }
}

?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Edit Sub Category</h1>
    </div>
    <div class="col-lg-6">
        <?php echo $message; ?>
        <!-- /.col-lg-12 -->
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <select name="category_id" class="form-control">
                    <option>--Select Category--</option>
                    <?php foreach ($categories as $category): ?>
                        <?php if ($category_name->category_name == $category->category_name) { ?>
                            <option value="<?php echo $category->id; ?>"
                                    selected><?php echo $category->category_name; ?></option>
                        <?php } else { ?>
                            <option value="<?php echo $category->id; ?>"><?php echo $category->category_name; ?> </option>
                        <?php } endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="title">Sub Test</label>
                <input type="text" class="form-control" name="sub_test" value="<?php echo $sub_category->sub_test; ?>">
            </div>
            <div class="form-group">
                <label for="title">Lab ID</label>
                <input type="text" class="form-control" name="lab_id" value="<?php echo $sub_category->lab_id; ?>">
            </div>
            <div class="form-group">
                <label for="title">Sub Test Price</label>
                <input type="number" step="any" class="form-control" name="sub_test_price"
                       value="<?php echo $sub_category->sub_test_price; ?>">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="submit" value="Add Sub Category">
            </div>
        </form>
    </div>
</div>