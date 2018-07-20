<?php

class Admin extends DB_object
{
    protected static $db_table = "tbl_admin";
    protected static $db_table_field = array('admin_name', 'admin_email', 'password', 'role', 'status');

    public $id;
    public $admin_name;
    public $admin_email;
    public $password;
    public $role;
    public $status;


    /*login function start*/
    public static function verify_admin($username, $password)
    {
        global $database;

        $username = $database->escape_string($username);
        $password = $database->escape_string($password);

        $sql = "SELECT * FROM " . self::$db_table . " WHERE admin_email = '{$username}' AND role = 'admin' AND status = 1";
        $result = $database->query($sql);
        //print_r($result);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                if (password_verify($password, $row['password'])) {
                    $the_result_array = self::find_by_query($sql);
                    //print_r($the_result_array);
                    return !empty($the_result_array) ? array_shift($the_result_array) : false;
                }
            }
        } else {
            return false;
        }
    }
    /*login function finish*/

    //check admin email
    public static function check_admin_email($email)
    {
        global $database;

        $data = $database->escape_string($email);

        $query = "SELECT * FROM tbl_admin WHERE admin_email = '{$data}'";

        $result = $database->query($query);

        $row = mysqli_fetch_assoc($result);

        if ($row) {
            return true;
        } else {
            return false;
        }
    }

    //check expense and description
    public static function check_admin_details($name, $email, $role)
    {
        global $database;

        $admin_name = $database->escape_string($name);
        $admin_email = $database->escape_string($email);
        $admin_role = $database->escape_string($role);

        $query = "SELECT * FROM tbl_admin WHERE admin_name = '{$admin_name}' AND admin_email = '{$admin_email}' AND role = '{$admin_role}'";

        $result = $database->query($query);

        $row = mysqli_fetch_assoc($result);

        if ($row) {
            return true;
        } else {
            return false;
        }
    }
}