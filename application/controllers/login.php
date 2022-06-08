<?php
require_once "basecontroller.php";

class Login extends BaseController
{
    private User $user;
    private $data;

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

    public function action_login(): Response
    {
        $data = $_POST;
        $this->user = new User($data);
        if (!$this->get_data($data)) {
            return new Response('error', 'incomplete data', $data);
        }
        if ($this->user->login())
            return new Response('success', 'success');
        return new Response('error', 'invalid username/ password', $data);
    }
}

