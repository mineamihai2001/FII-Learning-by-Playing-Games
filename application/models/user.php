<?php
require_once 'basemodel.php';

class User extends BaseModel
{
    private string $usertype = "username";
    private string $username;
    private string $password;
    private string $user_id;
    private string $image;
    private $data;

    public function __construct($data)
    {
        parent::__construct();
        $this->data = $data;
        $this->image = "";
    }

    /**
     * @throws Exception
     */
    public function create(): bool
    {
        try {
            $this->username = $this->data['username'];
            if (isset($this->data['password']))
                $this->password = $this->data['password'];
            else $this->password = ""; // add random secure password
        } catch (Error $e) {
            return false;
        }
        if (filter_var($this->username)) {
            $this->usertype = "email";
        }
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO users ($this->usertype, password, photo) VALUES('$this->username', '$this->password', '$this->image')";
        $this->query($sql);

        // add user in the processes table
        $this->user_id = $this->get_user_id($this->username);
        if(!$this->user_id) return false;
        $sql = "INSERT INTO processes (user_id, lesson_id, created, updated) VALUES ($this->user_id, 1, NOW(), NOW())";
        $this->query($sql);
        $_SESSION['user_id'] = $this->user_id;

        return true;
    }

    /**
     * @throws Exception
     */
    public function login(): bool
    {
        try {
            $this->username = $this->data['username'];
            $this->password = $this->data['password'];
        } catch (Error $e) {
            return false;
        }

        $sql = "SELECT * FROM users 
                WHERE username LIKE '$this->username'
                OR email LIKE '$this->username'";
        $users = $this->query($sql);

        if ($users && count($users)) {
            if (isset($users[0]['password']) && password_verify($this->password, $users[0]['password'])) {
                if (isset($users[0]['username']) && $users[0]['username'])
                    $_SESSION['username'] = $users[0]['username'];
                if(isset($users[0]['photo']) && $users[0]['photot'])
                    $_COOKIE['image'] = $users[0]['photo'];
                elseif (isset($users[0]['email']) && $users[0]['email'])
                    $_SESSION['username'] = $users[0]['email'];
                $_SESSION['user_id'] = $users[0]['id'];
                $this->user_id = $users[0]['id'];
                return true;
            }
            return false;
        } else return false;
    }

    /**
     * @throws Exception
     */
    public function get_user_id($username = null){
        $sql = "SELECT * FROM users WHERE username LIKE '$username' OR email LIKE '$username'";
        $users = $this->query($sql);
        if(count($users) && isset($users[0]['id'])) {
            return $users[0]['id'];
        }
        return null;
    }

    /**
     * @throws Exception
     */
    public function api_login(): bool
    {
        try {
            $this->username = $this->data['username'];
            if (isset($this->data['image'])) {
                $this->image = $this->data['image'];
            }
            $sql = "SELECT * FROM users 
                WHERE username LIKE '$this->username'
                OR email LIKE '$this->username'";
            $users = $this->query($sql);
            if (count($users)) {
                $_SESSION['username'] = $this->username;
                $_SESSION['user_id'] = $users[0]['id'];
                $_COOKIE['image'] = $this->image;
            } else {
                $_SESSION['username'] = $this->username;
                $_COOKIE['image'] = $this->image;
                $this->create();
            }
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
