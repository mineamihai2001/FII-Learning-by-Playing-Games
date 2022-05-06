<?php

class BaseModel
{
    public $db;
    protected $data;

    public function __construct()
    {
        $this->db = Database::get_connection();
    }
    public function query($sql)
    {
        if(!$sql) {
            throw new Exception("Empty SQL query");
        }

        echo $sql;
        $sth = $this->db->prepare($sql);
        $sth->execute();
        return $sth->fetchAll();
    }
}
