<?php
//require_once 'basecontroller.php';
//
//class LessonController extends BaseController
//{
//    private $lesson_model;
//    private $lesson_id;
//
//    public function __construct()
//    {
//        parent::__construct();
//        $this->lesson_model = new LessonModel();
//    }
//
//    public function set_current_lesson() {
//        $token = $_SESSION['token'];
//        $data = $this->lesson_model->get_lesson($token);
//
//        if(isset($data['lesson_id'])) {
//            $this->lesson_id = $data['lesson_id'];
//        } else {
//            echo json_encode(array(
//                'status' => 'error',
//                'body' => 'error at setting lesson_id'
//            ));
//            exit;
//        }
//    }
//
//    public function get_current_lesson() {
//        $data = $this->model->get_data("lesson", $this->lesson_id);
//        if(isset($data)) {
//            echo json_encode(array(
//                'status' => 'success',
//                'body' => $data
//            ));
//            exit;
//        } else {
//            echo json_encode(array(
//                'status' => 'error',
//                'body' => 'no data found'
//            ));
//            exit;
//        }
//    }
//}
