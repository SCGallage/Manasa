<?php


namespace core;


class Response
{
    /**
     * set status code of the response
     * @param int $code
     */
    public function setStatusCode(int $code){
        http_response_code($code);
    }

    public function setContentTypeJson() {
        header('Content-Type: application/json; charset=utf-8');
    }
}