<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


class MyModel extends BaseModel
{
    function __construct()
    {
        parent::__construct();
    }
    public function get_data()
    {
        $sql = 'SELECT * FROM test';
        $data = $this->query($sql);
        print_r('<pre>');
        print_r($data);
    }
}