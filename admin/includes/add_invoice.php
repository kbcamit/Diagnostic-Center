<?php

if (!$session->is_signed_in()) {
    header("Location: ../");
}

$doctors = Doctor::get_doctor();
$sub_categories = Sub_category::sub_category_with_price();
$categories = Category::select_all_category();

if (isset($_POST['add_sub_category'])) {
    if (isset($_SESSION['test_cart'])) {
        $is_available = 0;
        foreach ($_SESSION['test_cart'] as $keys => $value) {
            if ($_SESSION['test_cart'][$keys]['test_id'] == $_POST['test_id']) {
                $is_available++;
                $_SESSION['test_cart'][$keys]['qty'] = $_SESSION['test_cart'][$keys]['qty'] + $_POST['qty'];
            }
        }
        if ($is_available < 1) {
            $item_array = array(
                'test_id' => $_POST['test_id'],
                'test_name' => $_POST['test_name'],
                'test_price' => $_POST['test_price'],
                'qty' => $_POST['qty']
            );
            $_SESSION['test_cart'][] = $item_array;
        }
    } else {
        $item_array = array(
            'test_id' => $_POST['test_id'],
            'test_name' => $_POST['test_name'],
            'test_price' => $_POST['test_price'],
            'qty' => $_POST['qty']
        );
        $_SESSION['test_cart'][] = $item_array;
    }
}

if (isset($_GET['source'])) {
    if ($_GET['source'] == 'dlt') {
        foreach ($_SESSION['test_cart'] as $keys => $value) {
            if ($value['test_id'] == $_GET['id']) {
                unset($_SESSION['test_cart'][$keys]);
                //header("Location: add_invoice.php");
            }
        }
    }
}

//add patient info
$insert_id = '';
$message = '';
if (isset($_POST['submit'])) {
    $patient = new Invoice();
    $patient->patient_name = $_POST['patient_name'];
    $patient->age = $_POST['age'];
    $patient->sex = $_POST['sex'];
    $patient->mobile_no = $_POST['mobile_no'];
    $patient->delivery_date = $_POST['delivery_date'];
    $patient->time = $_POST['time'];
    $patient->doctor_id = $_POST['doctor_id'];
    $patient->description = $_POST['description'];
    $patient->invoice_no = $_POST['invoice_no'];
    $patient->invoice_type = $_POST['invoice_type'];

    if ($patient->save()) {
        $insert_id = $database->the_insert_id();
    }

    if (isset($_SESSION['test_cart'])) {
        if (!empty($_SESSION['test_cart'])) {
            foreach ($_SESSION['test_cart'] as $keys => $value) {
                $payment = new payment();
                $payment->patient_id = $insert_id;
                $payment->sub_test_id = $value['test_id'];
                $payment->date = $_POST['delivery_date'];
                $payment->qty = $value['qty'];
                $payment->total = $value['qty'] * $value['test_price'];
                $payment->invoice_no = $_POST['invoice_no'];
                $payment->admin_id = $_SESSION['admin_id'];

                $payment->save();
            }
        }
    }
    unset($_SESSION['test_cart']);
    $clear_payment = new clear_payment();
    $clear_payment->patient_id = $insert_id;
    $clear_payment->invoice_no = $_POST['invoice_no'];
    $clear_payment->paid = $_POST['paid'];
    $clear_payment->due = $_POST['due'];
    if ($clear_payment->save()) {
        $message = "<div class='alert alert-success'>Record Insert Successfully</div>";
        header("Location: manage_invoice.php?source=print_invoice_details&invoice_no=" . $_POST['invoice_no']);
    }
}

?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Set Test & Patient Information</h1>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <?php //echo $message;
            //echo $insert_id; ?>
            <div>
                <?php echo $message; ?>
            </div>
            <!-- /.col-lg-12 -->
            <form id="" action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="row">
                    <div class="col-lg-4">
                        <div>
                            <label for="title">Patient Name</label>
                            <input type="text" class="form-control" name="patient_name">
                        </div>
                        <div>
                            <label for="title">Mobile No</label>
                            <input type="text" class="form-control" name="mobile_no">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div>
                            <label for="title">Age</label>
                            <input type="number" class="form-control" name="age">
                        </div>
                        <div>
                            <label for="title">Delivery Date</label>
                            <input type="text" id="datepicker" class="form-control" name="delivery_date">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div>
                            <label for="title">Sex</label>
                            <select name="sex" class="form-control">
                                <option>--Select Gender--</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div>
                            <label for="title">Time</label>
                            <input type="text" id="basicExample" class="form-control" name="time">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <label for="title">Referred By</label>
                        <select name="doctor_id" class="form-control">
                            <option>--Select Doctor--</option>
                            <?php while ($row = mysqli_fetch_assoc($doctors)) { ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['doctor_name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label for="title">Description</label>
                        <textarea class="form-control" name="description" id="" cols="20"
                                  rows="2"></textarea>
                    </div>
                    <div class="col-lg-4">
                        <label for="title">Invoice No</label>
                        <input type="number" class="form-control" name="invoice_no">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <label for="title">Invoice Type</label>
                        <select name="invoice_type" class="form-control">
                            <option>--Select--</option>
                            <option value="income">Income</option>
                        </select>
                    </div>
                </div>
                <br>
                <hr>
                <div id="invoice_section">
                    <?php
                    $total = 0;
                    if (!empty($_SESSION['test_cart'])) { ?>
                        <table class="table table-bordered">
                            <tr>
                                <th>Test Name</th>
                                <th>Test Qty</th>
                                <th>Price</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                            <?php
                            foreach ($_SESSION['test_cart'] as $keys => $value) {
                                ?>
                                <tr>
                                    <td><?php echo $value['test_name']; ?></td>
                                    <td width="20%"><input readonly type="text" name="qty"
                                                           value="<?php echo $value['qty']; ?>"
                                                           id="test_qty<?php echo $value['test_id']; ?>"
                                                           class="form-control qty"
                                                           data-test-id="<?php echo $value['test_id']; ?>"></td>
                                    <td><?php echo $value['test_price']; ?></td>
                                    <td><?php echo($value['qty'] * $value['test_price']); ?></td>
                                    <td>
                                        <a href="invoices.php?source=dlt&id=<?php echo $value['test_id']; ?>"
                                           class="btn btn-danger btn-xs">Remove</a>
                                    </td>
                                </tr>
                                <?php $total += ($value['qty'] * $value['test_price']);
                            }
                            ?>
                            <tr>
                                <td colspan="3">Paid</td>
                                <td><input type="text" class="price pay" id="pay" name="paid"></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="3">Due</td>
                                <td><input type="text" id="due" readonly class="due_price" name="due"></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="3">Total</td>
                                <td><?php echo $total; ?></td>
                                <td></td>
                            </tr>
                        </table>
                        <input type="hidden" value="<?php echo $total; ?>" name="total_price" id="total"
                               class="price total">
                    <?php } ?>
                </div>
                <div class="">
                    <input type="submit" class="btn btn-primary" name="submit" value="Confirm">
                </div>
            </form>
        </div>

        <div class="col-lg-4">
            <!--<div class="form-group">
                    <select name="test-name" id="test-name" class="form-control">
                        <option>--Select Sub Category--</option>
                        <?php /*foreach ($sub_categories as $sub_category): */ ?>
                            <option value="<?php /*echo $sub_category->id; */ ?>"><?php /*echo $sub_category->sub_test . ' ' . $sub_category->sub_test_price; */ ?></option>
                        <?php /*endforeach; */ ?>
                    </select>
                </div>-->
            <div class="form-group">
                <?php while ($row = mysqli_fetch_assoc($categories)) { ?>
                    <label for="title"><h4><span
                                    class="glyphicon glyphicon-hand-right"></span> <?php echo $row['category_name']; ?>
                        </h4>
                    </label>
                    <?php echo '<br>';
                    $sub_category_list = Sub_category::sub_category_by_category_id($row['id']);
                    foreach ($sub_category_list as $list):
                        ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="test_id" value="<?php echo $list->id; ?>">
                            <input type="hidden" name="qty" id="qty<?php echo $list->id; ?>" value="1">
                            <input type="hidden" name="test_name" id="name<?php echo $list->id; ?>"
                                   value="<?php echo $list->sub_test; ?>">
                            <input type="hidden" name="test_price" id="price<?php echo $list->id; ?>"
                                   value="<?php echo $list->sub_test_price; ?>">
                            <input type="submit" class="cb btn btn-success btn-sm"
                                   style="margin-right: 5px; margin-bottom: 5px;" name="add_sub_category"
                                   id="<?php echo $list->id; ?>"
                                   value="&#43"><?php echo $list->sub_test . ' ' . $list->sub_test_price . '<br>'; ?>
                        </form>
                    <?php endforeach;
                } ?>
            </div>

        </div>
    </div>
</div>
