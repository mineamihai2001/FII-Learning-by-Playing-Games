<?php
class BaseController
{
    protected $model;
    protected $postArr;
    protected $headers;
    protected $error;


    function __construct()
    {
        $this->model = new MyModel();
        $this->headers = array(
            'success' => array('Content-Type: application/json', 'HTTP/1.1 200 OK'),
            'error' => array('Content-Type: application/json', 'HTTP/1.1 500 Internal Server Error'),
            'unkown' => 'HTTP/1.1 404 Not Found'
        );
        $this->error = array();
    }

    public function __call($name, $arguments)
    {
        $this->send_output('', $this->headers['unkown']);
    }

    protected function get_uri_segments()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = explode('/', $uri);

        return $uri;
    }

    protected function get_query_string_params()
    {
        $params = $_SERVER['QUERY_STRING'];
        $params = explode("&", $params);
        $result = array();
        foreach ($params as $p) {
            $p = explode("=", $p);
            $key = $p[0];
            $value = $p[1];
            $result[$key] = $value;
        }
        return $result;
    }


    protected function set_post()
    {
        $requestArr = file_get_contents('php://input');
        $this->postArr = json_decode($requestArr, true);
    }


    protected function post()
    {
        $this->set_post();
        return $this->postArr;
    }

    protected function send_output($data, $httpHeaders = array())
    {
        header_remove('Set-Cookie');

        if (is_array($httpHeaders) && count($httpHeaders)) {
            foreach ($httpHeaders as $httpHeader) {
                header($httpHeader);
            }
        }

        if (gettype($data) == "array")
            echo json_encode($data);
        else echo $data;
        exit;
    }
}
