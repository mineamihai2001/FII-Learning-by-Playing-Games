<?php
require "basecontroller.php";
class SignUp extends BaseController
{

    private $user;
    private $data;

    public function __construct()
    {
        parent::__construct();
        $this->action_signup();
    }

    public function get_data($data): bool
    {
        if (isset($data['username']) && isset($data['password']) && isset($data['confirm_password'])) {
            if ($data['password'] != $data['confirm_password'] || $data['username'] == "") return false;
            $this->data = $data;
            return true;
        }
        return false;
    }

    public function action_signup(): bool
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
