<?php

class clear_payment extends DB_object
{
    protected static $db_table = "tbl_clear_payment";
    protected static $db_table_field = array('patient_id', 'due', 'paid', 'invoice_no');

    public $id;
    public $patient_id;
    public $due;
    public $paid;
    public $invoice_no;

    public static function clear_payment_info($invoice_no)
    {
        global $database;
        $query = "SELECT * FROM tbl_clear_payment WHERE invoice_no = '{$invoice_no}'";
        $result = $database->query($query);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    public static function delete_payment($invoice_no)
    {
        global $database;
        $query = "DELETE FROM tbl_clear_payment WHERE invoice_no = '{$invoice_no}'";
        return $database->query($query);
    }
}