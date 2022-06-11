<?php
require_once UTILS . DS . "Response.php";
class Logout extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function action_logout(): Response
    {
        try{
            unset($_SESSION['username']);
            return new Response("success", "logout successful");
        }catch (Exception $e) {
            return new Response("error");
        }
    }
}