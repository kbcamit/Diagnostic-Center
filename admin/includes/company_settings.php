<?php
$message = '';

$company = Company::find_by_id(1);
//print_r($company);

if (isset($_POST['submit'])) {
    $company->name = $_POST['name'];
    $company->address = $_POST['address'];
    $company->email = $_POST['email'];
    $company->phone_no = $_POST['phone_no'];

    $image = Company::get_image($_FILES['logo']);
    if (empty($image)) {
        $the_company = Company::find_by_id(1);
        $image = $the_company->logo_image;
    } else {
        $image = Company::set_image($_FILES['logo']);
    }

    $company->logo_image = $image;

    $company->currency = $_POST['currency'];
    $company->choose_currency = $_POST['choose_currency'];
    $company->initial_balance = $_POST['initial_balance'];

    //print_r($company);

    if ($company->save()) {
        $message = "Record Updated Successfully";
    } else {
        $message = "Record Update Failed";
    }
}
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Edit Company Information</h1>
    </div>
    <div class="col-lg-6">
        <?php echo $message; ?>
        <!-- /.col-lg-12 -->
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $company->name; ?>">
            </div>
            <div class="form-group">
                <label for="title">Address</label>
                <textarea class="form-control" name="address" id="" cols="30"
                          rows="10"><?php echo $company->address; ?></textarea>
            </div>
            <div class="form-group">
                <label for="title">Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo $company->email; ?>">
            </div>
            <div class="form-group">
                <label for="title">Phone No.</label>
                <input type="text" class="form-control" name="phone_no" value="<?php echo $company->phone_no; ?>">
            </div>
            <div class="form-group">
                <label for="title">Logo</label>
                <img src="<?php echo $company->image_path(); ?>" width="200">
                <input type="file" class="form-control" name="logo">
            </div>
            <div class="form-group">
                <label for="title">Currency</label>
                <input type="text" class="form-control" name="currency" value="<?php echo $company->currency; ?>">
            </div>
            <div class="form-group">
                <label for="title">Choose Currency</label>
                <select name="choose_currency" class="form-control">
                    <option>--Choose Currency--</option>
                    <option value="after">After Amount</option>
                    <option value="before">Before Amount</option>
                </select>
            </div>
            <div class="form-group">
                <label for="title">Initial Balance</label>
                <input type="number" step="any" class="form-control" name="initial_balance"
                       value="<?php echo $company->initial_balance; ?>">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="submit" value="Save Changes">
            </div>
        </form>
    </div>
</div>