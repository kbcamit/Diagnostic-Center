<?php

class Expense_invoice extends DB_object
{
    protected static $db_table = "tbl_expense_invoice";
    protected static $db_table_field = array('invoice_no', 'date', 'expense_id', 'description', 'amount', 'admin_id');

    public $id;
    public $invoice_no;
    public $date;
    public $expense_id;
    public $description;
    public $amount;
    public $admin_id;

    public static function get_expense_details($from_date, $to_date)
    {
        global $database;
        $query = "SELECT * FROM tbl_expense_invoice WHERE date BETWEEN '{$from_date}' AND '{$to_date}'";
        return $database->query($query);
    }
}