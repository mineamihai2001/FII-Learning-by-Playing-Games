<?php
require_once "basecontroller.php";

class Login extends BaseController
{
    private User $user;
    private $data;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        parent::__construct();
        $this->action_login();
    }

    public function get_data($data): bool
    {
        if (isset($data['username']) && isset($data['password'])) {
            $this->data = $data;
            return true;
        } else {
            return false;
        }
    }

    /**
     * @throws Exception
     */
    public function action_login(): Response
    {
        $data = $_POST;
        $this->user = new User($data);
        if (!$this->get_data($data)) {
            return new Response('error', 'incomplete data', $data);
        }
        if ($this->user->login()) {
            return new Response('success', 'success');
        }
        return new Response('error', 'invalid username/ password', $data);
    }

    /**
     * @throws Exception
     */
    public function api_login(): bool
    {
        if(!isset($_POST['email'])) {
//            $this->send_output(array(
//                'status' => 'error',
//                'msg' => 'no email'
//            ), $this->headers['error']);
            return false;
        }
        if(isset($_POST['image'])) {
            $user_data = array(
                'username' => $_POST['email'],
                'image' => $_POST['image'],
            );
        } else {
            $user_data = array(
                'username' => $_POST['email']
            );
        }
        $this->user = new User($user_data);
        if($this->user->api_login()) {
            $this->send_output(array(
                'status'=>'success',
                'msg' =>'login successful'
            ), $this->headers['success']);
            return true;
        } else {
            $this->send_output(array(
                'status'=>'error',
                'msg' =>'login error'
            ), $this->headers['error']);
            return false;
        }

    }
}

