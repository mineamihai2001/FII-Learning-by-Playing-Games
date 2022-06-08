<?php

class Response
{
    private string $status;
    private string $message;
    private array $data;

    public function __construct($status = null, $message = null, $data = null)
    {
        if ($status)
            $this->status = $status;
        if ($message)
            $this->message = $message;
        if ($data)
            $this->data = $data;
    }

    public function toArray(): array
    {
        $response = array();
        foreach($this as $key => $value) {
            if($value) {
                $response[$key] = $value;
            }
        }
        return $response;
    }

    /**
     * @param mixed|string|null $data
     */
    public function setData(mixed $data): void
    {
        $this->data = $data;
    }

    /**
     * @param mixed|string|null $message
     */
    public function setMessage(mixed $message): void
    {
        $this->message = $message;
    }

    /**
     * @param mixed|string|null $status
     */
    public function setStatus(mixed $status): void
    {
        $this->status = $status;
    }

    /**
     * @return mixed|string|null
     */
    public function getData(): mixed
    {
        return $this->data;
    }

    /**
     * @return mixed|string|null
     */
    public function getMessage(): mixed
    {
        return $this->message;
    }

    /**
     * @return mixed|string|null
     */
    public function getStatus(): mixed
    {
        return $this->status;
    }

}