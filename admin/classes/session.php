<?php

class Session
{
    private $signed_in = false;
    public $admin_id;

    function __construct()
    {
        session_start();
        $this->check_the_login();
    }

    public function is_signed_in()
    {
        return $this->signed_in;
    }

    public function login($admin)
    {
        if ($admin) {
            //var_dump($user);
            $this->admin_id = $_SESSION['admin_id'] = $admin->id;
            $this->signed_in = true;
            //header("Location:index.php");
        }
    }

    public function logout()
    {
        unset($_SESSION['admin_id']);
        unset($this->admin_id);
        $this->signed_in = false;
        if (isset($_SESSION['test_cart'])) {
            unset($_SESSION['test_cart']);
        }
    }

    private function check_the_login()
    {
        if (isset($_SESSION['admin_id'])) {
            $this->admin_id = $_SESSION['admin_id'];
            $this->signed_in = true;
        } else {
            unset($this->admin_id);
            $this->signed_in = false;
        }
    }
}

$session = new Session();

?>