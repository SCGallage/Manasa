<?php

namespace util;

class CustomMessage
{
    public function SetMessage($title, $message, $messageType){
        $params = [
            'title' => $title,
            'errorMessage' => $message,
            'messageType' => $messageType,
        ];

    }
}