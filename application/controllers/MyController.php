<?php
require_once 'basecontroller.php';


class MyController extends BaseController
{
    private $queryParams;
    private $requestMethod;
    private $responseData;

    function __construct()
    {
        parent::__construct();
        $this->strErrorDesc = '';
        $this->requestMethod = $_SERVER["REQUEST_METHOD"];
    }

    public function request()
    {
        if (strtoupper($this->requestMethod) == 'POST') {
            $this->add();
        } elseif (strtoupper($this->requestMethod) == 'GET') {
            $this->list();
        } else {
            $this->send_output(json_encode(array(
                'status' => 'error',
                'body' => 'wrong request method'
            )), $this->headers['error']);
        }
    }

    /* use to add a lesson/quiz in DB */
    public function add()
    {
        try {
            $data = $this->post();
            // $this->model->add_lesson();
            $this->responseData = json_encode(array(
                'status' => 'sucess',
                'body' => $data
            ));
        } catch (Error $e) {
            $this->error['message'] = $e->getMessage();
            $this->error['header'] = $this->headers['error'];
        }
        $this->send_output($this->responseData, $this->headers['success']);
    }

    /* use to get a lesson/quiz from DB */
    public function list()
    {
        try {
            // $data = $this->get_uri_segments();
            $request = $this->get_query_string_params();
            $counters = $this->model->get_counter();
            if (!(isset($request) && $request)) {
                $this->responseData = array(
                    'status' => 'error',
                    'body' => 'no body'
                );
                $this->send_output($this->responseData, $this->headers['success']);
            }
            if (!isset($request['type'])) {
                $this->responseData = array(
                    'status' => 'error',
                    'body' => 'enter a type: [lesson]/ [question]'
                );
                $this->send_output($this->responseData, $this->headers['success']);
            }
            $type = $request['type'];
            if ($type == 'lesson') {
                $type = "lessons";
                $id = random_int(1, $counters['lessons_number']);

                if (isset($request['id'])) {
                    if ($request['id'] <= $counters['lessons_number']) {
                        $id = $request['id'];
                    } else {
                        $this->responseData = array(
                            'status' => 'error',
                            'body' => "unkown id"
                        );
                        $this->send_output($this->responseData, $this->headers['success']);
                    }
                }
            } else {
                $type = "questions";
                $id = random_int(1, $counters['questions_number']);
                if (isset($request['id'])) {
                    if ($request['id'] <= $counters['questions_number']) {
                        $id = $request['id'];
                    } else {
                        $this->responseData = array(
                            'status' => 'error',
                            'body' => "unkown id"
                        );
                        $this->send_output($this->responseData, $this->headers['success']);
                    }
                }
            }

            $data = $this->model->get_data($type, $id);


            $this->responseData = json_encode(array(
                'status' => 'sucess',
                'body' => $data
            ));
        } catch (Error $e) {
            $this->error['message'] = $e->getMessage();
            $this->error['header'] = $this->headers['error'];
        }
        $this->send_output($this->responseData, $this->headers['success']);
    }
}
