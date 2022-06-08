<?php
require_once 'basemodel.php';
class User extends BaseModel
{
    private $usertype = "username";
    private $username;
    private $password;
    private $data; 

    public function __construct($data)
    {
        parent::__construct();
        $this->data = $data;
    }

    public function create() {
        try{
            $this->username = $this->data['username'];
            $this->password = $this->data['password'];
        }catch(Error $e) {
            return false;
        }
        if(filter_var($this->username)) {
            $this->usertype = "email";
        }
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO users ($this->usertype, password) VALUES('$this->username', '$this->password')";
        $this->query($sql);
        return true;
    }

    public function login()
    {
        try{
            $this->username = $this->data['username'];
            $this->password = $this->data['password'];
        }catch(Error $e) {
            return false;
        }
        
        $sql = "SELECT * FROM users 
                WHERE username LIKE '$this->username'
                OR email LIKE '$this->username'";
        $users = $this->query($sql);

        if ($users && count($users) == 1) {
            if(isset($users[0]['password']) && password_verify($this->password, $users[0]['password'])) {
                return true;
            } 
            return false; exit;
        } else return false;
    }
}
