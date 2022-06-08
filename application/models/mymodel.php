<?php
require_once 'basemodel.php';

class MyModel extends BaseModel
{
    protected $data;
    protected $questions_counter;
    protected $lessons_counter;

    function __construct()
    {
        parent::__construct();
        $this->data = array();
    }

    public function set_counters()
    {
        $lessons_sql = "SELECT count(*) FROM lessons";
        $questions_sql = "SELECT count(*) FROM questions";

        $lessons_data = $this->query($lessons_sql);
        $questions_data = $this->query($questions_sql);

        $this->lessons_counter = $lessons_data[0]['count(*)'];
        $this->questions_counter = $questions_data[0]['count(*)'];
    }

    public function get_counter()
    {
        $this->set_counters();
        return array(
            'lessons_number' => $this->lessons_counter,
            'questions_number' => $this->questions_counter
        );
    }

    public function get_data($type, $id = null)
    {
        // $sql = "SELECT * FROM {$type} WHERE id=$id";
        $sql = "SELECT l.id, l.name, c.id AS 'chapter_id', c.name AS 'chapter_name', l.content FROM {$type} l JOIN chapters c ON l.chapter_id = c.id WHERE l.id=$id";
        // echo $sql;
        $this->data = $this->query($sql);
        // $this->print_data();
        return $this->data;
    }

    public function add_lesson($type, $question_array = null)
    {
        $sql = "INSERT INTO {$type} (name) VALUES('mihai')";
        $this->data = $this->query($sql);
    }

    public function add_question($type, $question_array = null)
    {
        $sql = "INSERT INTO {$type} (name) VALUES(mihai)";
        $this->data = $this->query($sql);
    }

    public function print_data()
    {
        print_r('<pre>');
        print_r($this->data);
        print_r('</pre>');
    }
}
