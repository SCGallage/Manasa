<?php


namespace core;


class Request
{

    /**
     * returns path requested
     * @return mixed|string
     */
    public function getPath(){

        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');
        if ($position === false){
            return $path;
        }
        return substr($path, 0, $position);
    }

    /**
     * returns the request method
     * @return string
     */
    public function method(){
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    /**
     * returns true if request method is get
     * @return bool
     */
    public function isGet(){
        return $this->method() === 'get';
    }

    /**
     * returns true if request method is post
     * @return bool
     */
    public function isPost(){
        return $this->method() === 'post';
    }

    /**
     * returns request body according to request method
     * @return array
     */
    public function getBody()
    {
        $body = [];
        if ($this->method() === 'get'){
            foreach ($_GET as $key => $value){
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        if ($this->method() === 'post'){
            foreach ($_POST as $key => $value){
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        return $body;
    }

    public function get_file(): FileHandler
    {
        return new FileHandler();
    }

}