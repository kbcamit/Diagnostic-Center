<?php
require_once("db_object.php");

class Doctor extends DB_object
{
    protected static $db_table = "tbl_doctor";
    protected static $db_table_field = array('image', 'doctor_name', 'father_name', 'mother_name', 'email', 'doc_dob', 'mobile_no', 'contact_address', 'designation', 'doc_join_date', 'status');

    public $id;
    public $image;
    public $doctor_name;
    public $father_name;
    public $mother_name;
    public $email;
    public $doc_dob;
    public $mobile_no;
    public $contact_address;
    public $designation;
    public $doc_join_date;
    public $status;

    public function image_path()
    {
        $location = 'images/';
        return $location . $this->image;
    }

    public static function get_image($file)
    {
        $image = $file['name'];
        return $image;
    }

    /*select active doctor*/
    public static function get_doctor()
    {
        global $database;

        $query = "SELECT * FROM tbl_doctor WHERE status = 1";

        return $database->query($query);
    }
}