<?php require_once("db_object.php"); ?>
<?php

class Category extends DB_object
{
    protected static $db_table = "tbl_category";
    protected static $db_table_field = array('category_name', 'status');

    public $id;
    public $category_name;
    public $status;

    /*select active category function*/
    public static function select_all_category()
    {
        global $database;

        $query = "SELECT * FROM tbl_category WHERE status = 1";

        return $database->query($query);
    }

    //check category already exists or not
    public static function check_category($category)
    {
        global $database;

        $data = $database->escape_string($category);

        $query = "SELECT * FROM tbl_category WHERE category_name = '{$data}'";

        $result = $database->query($query);

        $row = mysqli_fetch_assoc($result);

        if ($row) {
            return true;
        } else {
            return false;
        }
    }
}