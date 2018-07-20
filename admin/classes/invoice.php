<?php

class Invoice extends DB_object
{
    protected static $db_table = "tbl_patient_info";
    //protected static $db_table_field = array('patient_name', 'age', 'sex', 'mobile_no', 'delivery_date', 'time', 'doctor_id', 'description', 'invoice_no', 'total_pay', 'invoice_type', 'admin_id');
    protected static $db_table_field = array('patient_name', 'age', 'sex', 'mobile_no', 'delivery_date', 'time', 'doctor_id', 'description', 'invoice_no', 'invoice_type');

    public $id;
    public $patient_name;
    public $age;
    public $sex;
    public $mobile_no;
    public $delivery_date;
    public $time;
    public $doctor_id;
    public $description;
    public $invoice_no;
    public $total_pay;
    public $invoice_type;
    public $admin_id;

    public static function get_all_invoice_info()
    {
        global $database;

        $date = date("Y-m-d");

        $query = "SELECT tbl_payment_info.invoice_no, delivery_date, invoice_type, patient_name, sub_test, total, doctor_name, admin_name FROM tbl_payment_info
                  INNER JOIN tbl_patient_info ON tbl_payment_info.patient_id = tbl_patient_info.id
                  INNER JOIN tbl_sub_category ON tbl_payment_info.sub_test_id = tbl_sub_category.id
                  INNER JOIN tbl_doctor ON tbl_patient_info.doctor_id = tbl_doctor.id
                  INNER JOIN tbl_admin ON tbl_payment_info.admin_id = tbl_admin.id WHERE delivery_date = '{$date}'";

        return $database->query($query);
    }

    public static function get_all_invoice_by_date($from_date, $to_date)
    {
        global $database;

        $query = "SELECT tbl_payment_info.invoice_no, delivery_date, invoice_type, patient_name, sub_test, total, doctor_name, admin_name FROM tbl_payment_info
                  INNER JOIN tbl_patient_info ON tbl_payment_info.patient_id = tbl_patient_info.id
                  INNER JOIN tbl_sub_category ON tbl_payment_info.sub_test_id = tbl_sub_category.id
                  INNER JOIN tbl_doctor ON tbl_patient_info.doctor_id = tbl_doctor.id
                  INNER JOIN tbl_admin ON tbl_payment_info.admin_id = tbl_admin.id WHERE delivery_date BETWEEN '{$from_date}' AND '$to_date'";
        //print_r($query);

        return $database->query($query);
    }

    public static function get_all_invoice_by_doctor($from_date, $to_date, $doc_id)
    {
        global $database;

        $query = "SELECT tbl_payment_info.invoice_no, delivery_date, invoice_type, patient_name, sub_test, total, doctor_name, admin_name FROM tbl_payment_info
                  INNER JOIN tbl_patient_info ON tbl_payment_info.patient_id = tbl_patient_info.id
                  INNER JOIN tbl_sub_category ON tbl_payment_info.sub_test_id = tbl_sub_category.id
                  INNER JOIN tbl_doctor ON tbl_patient_info.doctor_id = tbl_doctor.id
                  INNER JOIN tbl_admin ON tbl_payment_info.admin_id = tbl_admin.id 
                  WHERE delivery_date BETWEEN '{$from_date}' AND '{$to_date}' AND tbl_doctor.id = {$doc_id}";

        // print_r($query);

        return $database->query($query);
    }

    public static function get_information_by_invoice_no($invoice_no)
    {
        global $database;

        $query = "SELECT invoice_no, patient_name, age, sex, tbl_patient_info.mobile_no, delivery_date, time, doctor_name FROM tbl_patient_info
                  INNER JOIN tbl_doctor 
                  ON tbl_patient_info.doctor_id = tbl_doctor.id WHERE invoice_no = {$invoice_no}";

        $result = $database->query($query);

        $row = mysqli_fetch_assoc($result);

        return $row;
    }

    public static function get_payment_info($invoice_no)
    {
        global $database;

        $query = "SELECT tbl_payment_info.invoice_no, sub_test, lab_id, qty, tbl_sub_category.sub_test_price, total FROM tbl_payment_info
                  INNER JOIN tbl_sub_category ON tbl_payment_info.sub_test_id = tbl_sub_category.id
                  INNER JOIN tbl_patient_info ON tbl_payment_info.patient_id = tbl_patient_info.id WHERE tbl_payment_info.invoice_no = {$invoice_no}";
        //print_r($query);

        return $database->query($query);
    }

    public static function get_test_payment_details($invoice_no)
    {
        global $database;
        $query = "SELECT * FROM tbl_payment_info WHERE invoice_no = '{$invoice_no}'";
        return $database->query($query);
    }

    public static function find_all_invoices()
    {
        global $database;
        $query = "SELECT * FROM tbl_payment_info";
        return $database->query($query);
    }

    public static function find_patient_info($invoice_no)
    {
        global $database;
        $query = "SELECT * FROM tbl_patient_info WHERE invoice_no = '{$invoice_no}'";
        $result = $database->query($query);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    public static function find_payment_info($invoice_no)
    {
        global $database;
        $query = "SELECT * FROM tbl_clear_payment WHERE invoice_no = '{$invoice_no}'";
        $result = $database->query($query);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    public static function delete_patient($invoice_no)
    {
        global $database;
        $query = "DELETE FROM tbl_patient_info WHERE invoice_no = '{$invoice_no}'";
        return $database->query($query);
    }
}