<?php

class payment extends DB_object
{
    protected static $db_table = "tbl_payment_info";
    protected static $db_table_field = array('patient_id', 'sub_test_id', 'date', 'qty', 'total', 'invoice_no', 'admin_id');

    public $id;
    public $patient_id;
    public $sub_test_id;
    public $date;
    public $qty;
    public $total;
    public $invoice_no;
    public $admin_id;

    public static function delete_invoice($invoice_no)
    {
        global $database;
        $query = "DELETE FROM tbl_payment_info WHERE invoice_no = '{$invoice_no}'";
        return $database->query($query);
    }

    public static function get_income_info($from_date, $to_date)
    {
        global $database;
        $query = "SELECT * FROM tbl_payment_info WHERE date BETWEEN '{$from_date}' AND '{$to_date}'";
        return $database->query($query);
    }
}