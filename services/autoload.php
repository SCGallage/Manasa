<?php
spl_autoload_register(function ($classname) {

    //$path = "..\\";
    $path = '\mnt\d\Projects\Manasa\\';
    $extension = ".php";

    include_once $path . $classname . $extension;

});
