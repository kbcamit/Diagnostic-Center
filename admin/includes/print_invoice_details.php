<?php
$company_info = Company::find_by_id(1);
if (isset($_GET['invoice_no'])) {
    $invoice_no = $_GET['invoice_no'];
    $information = Invoice::get_information_by_invoice_no($_GET['invoice_no']);
    $clear_payment_info = clear_payment::clear_payment_info($_GET['invoice_no']);
    //print_r($clear_payment_info);
}
?>
<div id="invoiceReport">
    <table class="table" style="border: hidden">
        <tr>
            <td width="70%" style="padding-top: 8%"><h4 style="font-weight: bold">INVOICE
                    #<?php echo $information['invoice_no']; ?></h4></td>
            <td>
                <table>
                    <tr>
                        <td>
                            <img src="<?php echo $company_info->image_path(); ?>" width="100px" height="150px">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo $company_info->name; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo $company_info->address; ?></td>
                    </tr>
                    <tr>
                        <td>Phone: <?php echo $company_info->phone_no; ?></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <hr style="border-top: 1px solid #8c8b8b">
    <table class="table" style="border: hidden">
        <tr>
            <td>
                <table>
                    <tr>
                        <td><h5 style="font-weight: bold">Invoices To</h5></td>
                    </tr>
                    <tr>
                        <td>Name: <?php echo $information['patient_name']; ?></td>
                    </tr>
                    <tr>
                        <td>Age: <?php echo $information['age']; ?></td>
                    </tr>
                    <tr>
                        <td>Sex: <?php echo $information['sex']; ?></td>
                    </tr>
                    <tr>
                        <td>Mobile: <?php echo $information['mobile_no']; ?></td>
                    </tr>
                    <tr>
                        <td>Ref. By: <?php echo $information['doctor_name']; ?></td>
                    </tr>
                </table>
            </td>
            <td>
                <table class="table table-bordered tab-content tab-pane">
                    <tr>
                        <td>INVOICE#</td>
                        <td><?php echo $information['invoice_no']; ?></td>
                    </tr>
                    <tr>
                        <td>Invoice Date</td>
                        <td><?php echo $information['delivery_date']; ?></td>
                    </tr>
                    <tr>
                        <td>Delivery Date</td>
                        <td><?php echo $information['delivery_date']; ?></td>
                    </tr>
                    <tr>
                        <td>Time</td>
                        <td><?php echo $information['time']; ?></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <hr style="border-top: 1px solid #8c8b8b">
    <table class="table table-bordered">
        <tr>
            <th width="60%">Test Name</th>
            <th>Lab ID</th>
            <th>QTY</th>
            <th>Price</th>
            <th>Total</th>
        </tr>
        <?php
        $payment_info = Invoice::get_payment_info($information['invoice_no']);
        //print_r($payment_info);
        $sum = 0;
        while ($row = mysqli_fetch_assoc($payment_info)) {
            ?>
            <tr>
                <td width="60%"><?php echo $row['sub_test']; ?></td>
                <td><?php echo $row['lab_id']; ?></td>
                <td><?php echo $row['qty']; ?></td>
                <td><?php echo $row['sub_test_price']; ?></td>
                <td><?php echo $row['total'];
                    $sum += $row['total']; ?></td>
            </tr>
        <?php } ?>
        <tr>
            <td></td>
            <td colspan="3" align="center">Paid</td>
            <td><?php echo $clear_payment_info['paid']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td colspan="3" align="center">Due</td>
            <td><?php echo $clear_payment_info['due']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td colspan="3" align="center">Invoice Total</td>
            <td><?php echo $company_info->currency . ' ' . $sum; ?></td>
        </tr>
    </table>
</div>
<div style="text-align: center">
    <button onclick="printContent('invoiceReport');"><span class="glyphicon glyphicon-print"></span>Print</button>
</div>