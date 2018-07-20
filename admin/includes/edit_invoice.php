<?php

$doctors = Doctor::get_doctor();

if (isset($_GET['invoice_no'])) {
    $patient = Invoice::find_patient_info($_GET['invoice_no']);
    $invoices = Invoice::get_test_payment_details($_GET['invoice_no']);
    $clear_payment = clear_payment::clear_payment_info($_GET['invoice_no']);
    $tests = Sub_category::find_all();
}

if (isset($_POST['submit'])) {
    $paid = clear_payment::find_by_id($_POST['pay_id']);
    $paid->due = $_POST['due'];
    $paid->paid = $_POST['paid'];
    if ($paid->save()) {
        $_SESSION['message'] = "<div class='alert alert-success' style='text-align: center'>Record Updated Successfully</div>";
    } else {
        $_SESSION['message'] = "<div class='alert alert-danger'>Record Update Failed</div>";
    }
    header("Location: invoices.php?source=manage_invoice");
}

?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Edit Test & Patient Information</h1>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <?php //echo $message;
            //echo $insert_id;
            ?>

            <!-- /.col-lg-12 -->
            <form id="" action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="row">
                    <div class="col-lg-4">
                        <div>
                            <label for="title">Patient Name</label>
                            <input type="text" class="form-control" name="patient_name"
                                   value="<?php echo $patient['patient_name']; ?>">
                        </div>
                        <div>
                            <label for="title">Mobile No</label>
                            <input type="text" class="form-control" value="<?php echo $patient['mobile_no']; ?>"
                                   name="mobile_no">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div>
                            <label for="title">Age</label>
                            <input type="number" value="<?php echo $patient['age']; ?>" class="form-control" name="age">
                        </div>
                        <div>
                            <label for="title">Delivery Date</label>
                            <input type="text" id="datepicker" value="<?php echo $patient['delivery_date']; ?>"
                                   class="form-control" name="delivery_date">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div>
                            <label for="title">Sex</label>
                            <select name="sex" class="form-control">
                                <option>--Select Gender--</option>
                                <?php
                                if ($patient['sex'] == 'male') {
                                    ?>
                                    <option value="male" selected>Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                <?php } elseif ($patient['sex'] == 'female') { ?>
                                    <option value="male">Male</option>
                                    <option value="female" selected>Female</option>
                                    <option value="other">Other</option>
                                <?php } else { ?>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other" selected>Other</option>
                                <?php } ?>
                            </select>
                        </div>
                        <div>
                            <label for="title">Time</label>
                            <input type="text" id="basicExample" value="<?php echo $patient['time']; ?>"
                                   class="form-control" name="time">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <label for="title">Referred By</label>
                        <select name="doctor_id" class="form-control">
                            <option>--Select Doctor--</option>
                            <?php while ($row = mysqli_fetch_assoc($doctors)) {
                                if ($patient['doctor_id'] == $row['id']) {
                                    ?>
                                    <option value="<?php echo $row['id']; ?>"
                                            selected><?php echo $row['doctor_name']; ?></option>
                                <?php } else { ?>
                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['doctor_name']; ?></option>
                                <?php }
                            } ?>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label for="title">Description</label>
                        <textarea class="form-control" name="description" id="" cols="20"
                                  rows="2"><?php echo $patient['description']; ?></textarea>
                    </div>
                    <div class="col-lg-4">
                        <label for="title">Invoice No</label>
                        <input type="number" class="form-control" value="<?php echo $patient['invoice_no']; ?>"
                               name="invoice_no">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <label for="title">Invoice Type</label>
                        <select name="invoice_type" class="form-control">
                            <option>--Select--</option>
                            <?php
                            if ($patient['invoice_type'] == 'income') {
                                ?>
                                <option value="income" selected>Income</option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <input type="hidden" name="patient_id" value="<?php echo $patient['id']; ?>">
                <br>
                <hr>
                <div id="invoice_section">

                    <table class="table table-bordered">
                        <tr>
                            <th>Test Name</th>
                            <th>Test Qty</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>
                        <?php
                        $total = 0;
                        while ($invoice = mysqli_fetch_assoc($invoices)) {
                            $test_info = Sub_category::find_by_id($invoice['sub_test_id']);
                            ?>
                            <tr>
                                <td><?php echo $test_info->sub_test; ?></td>
                                <td><?php echo $invoice['qty']; ?></td>
                                <td><?php echo $test_info->sub_test_price; ?></td>
                                <td><?php echo $invoice['total']; ?></td>
                            </tr>
                            <?php $total += $invoice['total'];
                        } ?>
                        <tr>
                            <td colspan="3">Paid</td>
                            <td><input type="text" class="price pay" value="<?php echo $clear_payment['paid']; ?>"
                                       id="pay" name="paid"></td>
                        </tr>
                        <tr>
                            <td colspan="3">Due</td>
                            <td><input type="text" id="due" value="<?php echo $clear_payment['due']; ?>" readonly
                                       class="due_price" name="due"></td>
                        </tr>
                        <tr>
                            <td colspan="3">Total</td>
                            <td><?php echo $total; ?></td>
                        </tr>
                    </table>
                    <input type="hidden" value="<?php echo $total; ?>" name="total_price" id="total"
                           class="price total">
                    <?php ?>
                    <input type="hidden" name="pay_id" value="<?php echo $clear_payment['id']; ?>">
                </div>
                <div class="">
                    <input type="submit" class="btn btn-primary" name="submit" value="Confirm">
                </div>
            </form>
        </div>
    </div>
</div>