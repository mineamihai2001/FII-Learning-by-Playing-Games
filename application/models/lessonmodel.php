<?php
require_once 'basemodel.php';

class LessonModel extends BaseModel
{
    protected string $user_id;

    public function __construct($user_id)
    {
        parent::__construct();
        $this->user_id = $user_id;
    }

    /** Returns the current lesson_id of the stored user
     * @return void
     * @throws Exception
     */
    public function get_status() {
        $sql = "SELECT lesson_id FROM processes WHERE user_id = $this->user_id";
        $processes = $this->query($sql);
        $lesson_id = null;
        if(count($processes)) {
            $current_process = $processes[0];
            $lesson_id = $current_process['lesson_id'];
        }
        $_SESSION['lesson_id'] = $lesson_id;
        return $lesson_id;
    }

    /**
     * @throws Exception
     */
    public function update_status() {
        $prev_lesson = $_SESSION['lesson_id'];
        $current_lesson = ++$prev_lesson;

        $sql = "SELECT count(*) AS 'total_lessons' FROM lessons";
        $data = $this->query($sql);
        if($current_lesson > $data[0]['total_lessons']) {
            return false;
        }

        $sql = "UPDATE processes SET lesson_id = $current_lesson WHERE user_id = $this->user_id";
        $this->query($sql);
        return true;
    }

    /**
     * @throws Exception
     */
    public function get_current_lesson() {
        $lesson_id = $this->get_status();
        if(!$lesson_id) {
            return null;
        }
        $my_model = new MyModel();
        return $my_model->get_data('lessons', $lesson_id);
    }

    /**
     * @throws Exception
     */
    public function get_next_lesson(): ?array
    {
        if(!$this->update_status()) {
            $result[] = array(
                'status' => 'error',
                'content' => 'All Done'
            );
            return $result;
        }
        return $this->get_current_lesson();
    }

}
