<?php
require_once 'basemodel.php';

class LessonModel extends BaseModel
{
    protected $data;

    public function __construct()
    {
        parent::__construct();
        $this->data = array();
    }

    public function get_lesson($token) {
        $sql = "SELECT t.user_id AS 'user_id', p.lesson_id AS 'lesson_id' 
                FROM user_tokens t
                JOIN processes p ON p.user_id = t.user_id
                WHERE t.token = $token";
        $this->data = $this->query($sql);
        return $this->data;
    }
}
