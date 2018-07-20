<?php
require_once("db_object.php");

class Sub_category extends DB_object
{
    protected static $db_table = "tbl_sub_category";
    protected static $db_table_field = array('category_id', 'sub_test', 'lab_id', 'sub_test_price', 'status');

    public $id;
    public $category_id;
    public $sub_test;
    public $lab_id;
    public $sub_test_price;
    public $status;

    /*relation with test category table and select all values*/
    public static function select_all_sub_category()
    {
        global $database;

        $query = "SELECT tbl_sub_category.id, tbl_category.category_name AS category_name, sub_test, lab_id, sub_test_price, tbl_sub_category.status as status";
        $query .= " FROM tbl_sub_category";
        $query .= " INNER JOIN tbl_category ";
        $query .= "ON tbl_sub_category.category_id = tbl_category.id";
        //print_r($query);

        return $database->query($query);
    }

    /*select price with sub_category*/
    public static function sub_category_with_price()
    {
        $query = "SELECT id, sub_test, sub_test_price FROM tbl_sub_category WHERE status = 1";

        $the_result_array = self::find_by_query($query);

        return $the_result_array;
    }

    public static function sub_category_by_category_id($category_id)
    {
        $query = "SELECT id, sub_test, sub_test_price FROM tbl_sub_category WHERE category_id = {$category_id} AND status = 1";

        $the_result_array = self::find_by_query($query);

        return $the_result_array;
    }

    public static function select_demo($sub_test)
    {
        global $database;

        $query = "SELECT * FROM tbl_sub_category WHERE sub_test = '{$database->escape_string($sub_test)}'";
        //print_r($query);
        $result = $database->query($query);
        /*$row = mysqli_fetch_assoc($result);

        return $row;*/
        $i = 0;
        $data = '';
        $data .= '<tbody>';
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data .= '<td>' . $row['sub_test'] . '</td>';
                $data .= '<td>' . $row['sub_test_price'] . '</td>';
            }
        }
        $data .= '</tbody>';
        echo $data;
    }

    //check sub_category
    public static function check_sub_category($sub_category)
    {
        global $database;

        $data = $database->escape_string($sub_category);

        $query = "SELECT * FROM tbl_sub_category WHERE sub_test = '{$data}'";

        $result = $database->query($query);

        $row = mysqli_fetch_assoc($result);

        if ($row) {
            return true;
        } else {
            return false;
        }
    }
}