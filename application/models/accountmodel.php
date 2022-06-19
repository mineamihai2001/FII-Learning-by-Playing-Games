<?php

class AccountModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_progress($user_id)
    {
        try {
            $sql = "SELECT (SELECT count(*) from lessons) AS 'total_lessons', p.lesson_id AS 'current_lesson',
                    CONCAT(FLOOR(p.lesson_id * 100 / (SELECT count(*) FROM lessons)), '%') AS 'status'
                    FROM processes p
                    JOIN lessons l on l.id = p.lesson_id
                    WHERE p.user_id = '$user_id'";
            $data = $this->query($sql);
            if (count($data)) {
                $total = $data[0]['total_lessons'];
                $current = $data[0]['current_lesson'];
                $status = $data[0]['status'];
            } else return false;
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return array(
            'total_lessons' => $total,
            'current_lesson' => $current,
            'status' => $status
        );
    }

    public function get_leaderboards()
    {
        try {
            $sql = "SELECT p.lesson_id AS 'lesson_id', l.lesson_number AS 'lesson_number', l.chapter_id AS 'chapter_id',
                l.name AS 'lesson_name', u.email AS 'username', c.name AS 'chapter_name', 
                CONCAT(FLOOR(p.lesson_id * 100 / (SELECT count(*) FROM lessons)), '%') AS 'status' 
                FROM processes p
                JOIN lessons l on p.lesson_id = l.id
                JOIN users u on u.id = p.user_id
                JOIN chapters c on l.chapter_id = c.id
                ORDER BY status ASC";
            $data = $this->query($sql);
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return $data;
    }
}