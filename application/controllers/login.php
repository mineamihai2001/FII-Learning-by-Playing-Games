<?php
require_once "basecontroller.php";

class Login extends BaseController
{
    private $user;
    private $data;

    public function __construct()
    {
        // print_r('construct');exit;
        $this->action_login();
    }

    public function get_data($data)
    {
        if (isset($data['username']) && isset($data['password'])) {
            $this->data = $data;
            return true;
        } else {
            return false;
        }
    }

    public function action_login()
    {
        $data = $_POST;
        $this->user = new User($data);
        if (!$this->get_data($data)) {
            echo json_encode(array(
                'status' => 'error',
                'message' => 'no username/ password found'
            ));
            return false;
        }

        if ($this->user->login()) {
            return true;
        } else return false;
    }
}

