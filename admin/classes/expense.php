<?php

class Expense extends DB_object
{
    protected static $db_table = "tbl_expense";
    protected static $db_table_field = array('expense_name', 'expense_desc', 'status');

    public $id;
    public $expense_name;
    public $expense_desc;
    public $status;

    /*select active expenses*/
    public static function get_all_expenses()
    {
        $query = "SELECT * FROM tbl_expense WHERE status = 1";

        $the_result_array = self::find_by_query($query);

        return $the_result_array;
    }

    //check expense
    public static function check_expense($expense)
    {
        global $database;

        $data = $database->escape_string($expense);

        $query = "SELECT * FROM tbl_expense WHERE expense_name = '{$data}'";

        $result = $database->query($query);

        $row = mysqli_fetch_assoc($result);

        if ($row) {
            return true;
        } else {
            return false;
        }
    }

    //check expense and description
    public static function check_expense_description($expense, $description)
    {
        global $database;

        $expense_name = $database->escape_string($expense);
        $expense_description = $database->escape_string($description);

        $query = "SELECT * FROM tbl_expense WHERE expense_name = '{$expense_name}' AND expense_desc = '{$expense_description}'";

        $result = $database->query($query);

        $row = mysqli_fetch_assoc($result);

        if ($row) {
            return true;
        } else {
            return false;
        }
    }
}