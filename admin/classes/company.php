<?php

class Company extends DB_object
{
    protected static $db_table = "tbl_project";
    protected static $db_table_field = array('name', 'address', 'email', 'phone_no', 'logo_image', 'currency', 'choose_currency', 'initial_balance');

    public $id;
    public $name;
    public $address;
    public $email;
    public $phone_no;
    public $logo_image;
    public $currency;
    public $choose_currency;
    public $initial_balance;

    /*retrieve image from image folder*/
    public function image_path()
    {
        $location = 'images/';
        return $location . $this->logo_image;
    }

    /*retrieve image name */
    public static function get_image($file)
    {
        $image = $file['name'];
        return $image;
    }
}