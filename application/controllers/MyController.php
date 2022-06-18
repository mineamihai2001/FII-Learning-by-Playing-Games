<?php
require_once 'basecontroller.php';

/**
 * REST API controller
 * GET: get a lesson from the DB
 * POST: add a lesson to the DB
 * PUT: modify a lesson from the DB
 * DELETE: delete a lesson from the DB
 */
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
        if (!$this->validate_key())
            $this->send_output(json_encode(array(
                'status' => 'error',
                'body' => 'missing/ wrong api-key'
            )), $this->headers['error']);

        switch (strtoupper($this->requestMethod)) {
            case "GET":
                $this->list();
                break;
            case "POST":
                $this->add();
                break;
            case "PUT":
                 $this->modify();
                break;
            case "DELETE":
                 $this->delete();
                break;
            default:
                $this->send_output(json_encode(array(
                    'status' => 'error',
                    'body' => 'wrong request method'
                )), $this->headers['error']);
                break;
        }
    }

    /* use to add a lesson/quiz in DB */
    public function add()
    {
        try {
            $data = $this->post();
            if (!isset($data['body']) || !isset($data['type']) || !isset($data['chapter']) || !isset($data['name'])) {
                $this->responseData = json_encode(array(
                    'status' => 'error',
                    'body' => 'missing body/ type/ chapter/ name'
                ));
                $this->send_output($this->responseData, $this->headers['error']);
                return;
            }

            if (!($data['type'] == "lessons" || $data['type'] == 'questions')) {
                $this->responseData = json_encode(array(
                    'status' => 'error',
                    'body' => 'type must be lesson or question'
                ));
                $this->send_output($this->responseData, $this->headers['error']);
                return;
            }

            $this->model->add_lesson($data['type'], $data['body'], $data['chapter'], $data['name']);
            $this->responseData = json_encode(array(
                'status' => 'success',
                'body' => $data['type'] . ' successfully added'
            ));
        } catch (Exception $e) {
            $this->error['message'] = $e->getMessage();
            $this->error['header'] = $this->headers['error'];
            $this->responseData = json_encode(array(
                'status' => 'error',
                'body' => $this->error['message']
            ));
            $this->send_output($this->responseData, $this->headers['error']);
            return;
        }
        $this->send_output($this->responseData, $this->headers['success']);
    }

    public function modify() {
        try {
            $data = $this->post();
            if (!isset($data['body']) || !isset($data['type']) || !isset($data['id'])) {
                $this->responseData = json_encode(array(
                    'status' => 'error',
                    'body' => 'missing body/ type/ chapter/ name'
                ));
                $this->send_output($this->responseData, $this->headers['error']);
                return;
            }

            if (!($data['type'] == "lessons" || $data['type'] == 'questions')) {
                $this->responseData = json_encode(array(
                    'status' => 'error',
                    'body' => 'type must be lessons or questions'
                ));
                $this->send_output($this->responseData, $this->headers['error']);
                return;
            }

            $this->model->update_lesson($data['type'], $data['id'], $data['body']);
            $this->responseData = json_encode(array(
                'status' => 'success',
                'body' => $data['type'] . ' '. $data['id'] . ' ' . ' successfully updated'
            ));
        } catch (Exception $e) {
            $this->error['message'] = $e->getMessage();
            $this->error['header'] = $this->headers['error'];
            $this->responseData = json_encode(array(
                'status' => 'error',
                'body' => $this->error['message']
            ));
            $this->send_output($this->responseData, $this->headers['error']);
            return;
        }
        $this->send_output($this->responseData, $this->headers['success']);
    }

    public function delete() {
        try {
            $data = $this->post();
            if (!isset($data['type']) || !isset($data['id'])) {
                $this->responseData = json_encode(array(
                    'status' => 'error',
                    'body' => 'missing body/ type/ chapter/ name'
                ));
                $this->send_output($this->responseData, $this->headers['error']);
                return;
            }

            if (!($data['type'] == "lessons" || $data['type'] == 'questions')) {
                $this->responseData = json_encode(array(
                    'status' => 'error',
                    'body' => 'type must be lessons or questions'
                ));
                $this->send_output($this->responseData, $this->headers['error']);
                return;
            }

            $this->model->delete_lesson($data['type'], $data['id']);
            $this->responseData = json_encode(array(
                'status' => 'success',
                'body' => $data['type'] . ' '. $data['id'] . ' ' . ' successfully deleted'
            ));
        } catch (Exception $e) {
            $this->error['message'] = $e->getMessage();
            $this->error['header'] = $this->headers['error'];
            $this->responseData = json_encode(array(
                'status' => 'error',
                'body' => $this->error['message']
            ));
            $this->send_output($this->responseData, $this->headers['error']);
            return;
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
                'status' => 'success',
                'body' => $data
            ));
        } catch (Error $e) {
            $this->error['message'] = $e->getMessage();
            $this->error['header'] = $this->headers['error'];
        }
        $this->send_output($this->responseData, $this->headers['success']);
    }
}
