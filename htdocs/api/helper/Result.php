<?php namespace Avalihub;
class Result
{
    /**
     * Http response code.
     * @var int
     */
    public int $error = 501;

    /**
     * Http response. Will be JSON encoded and sent.
     * @var object|array
     */
    public object|array $result;

    /**
     * Should result be sent?
     * @var bool default: true
     */
    public bool $sendResult = true;

    /**
     * Sends the result.
     */
    public function sendResult()
    {
        http_response_code($this->error);
        if ($this->sendResult && isset($this->result)) {
            echo json_encode($this->result);
        }
    }
}
