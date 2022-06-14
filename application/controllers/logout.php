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
            unset($_SESSION['user_id']);
            unset($_COOKIE['image']);
            return new Response("success", "logout successful");
        }catch (Exception $e) {
            return new Response("error");
        }
    }
}