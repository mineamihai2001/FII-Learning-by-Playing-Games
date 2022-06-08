<?php
require "basecontroller.php";
class SignUp extends BaseController
{

    private $user;
    private $data;

    public function __construct()
    {
        $this->action_signup();
    }

    public function get_data($data)
    {
        if (isset($data['username']) && isset($data['password']) && isset($data['confirm_password'])) {
            if ($data['password'] != $data['confirm_password']) return false;
            $this->data = $data;
            return true;
        }
        return false;
    }

    public function action_signup()
    {
        $data = $_POST;
        $this->user = new User($data);
        if (!$this->get_data($data)) {
            // echo json_encode(array(
            //     'status' => 'error',
            //     'message' => 'passwords do not match'
            // ));
            return false;
        }

        if ($this->user->create()) {
            return true;
        }
        return false;
    }
}
