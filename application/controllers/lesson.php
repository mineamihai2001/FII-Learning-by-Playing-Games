<?php

class Lesson extends BaseController
{
    private string $user_id;
    private LessonModel $lessonModel;

    public function __construct()
    {
        parent::__construct();
        $this->user_id = $_SESSION['user_id'];
        $this->lessonModel = new LessonModel($this->user_id);
    }

    /**
     * @throws Exception
     */
    public function get_lesson() {
        $data = $this->lessonModel->get_current_lesson();
        $this->send_output($data, $this->headers['success']);
    }

    /**
     * @throws Exception
     */
    public function next_lesson() {
        $data = $this->lessonModel->get_next_lesson();
        $this->send_output($data, $this->headers['success']);
    }
}