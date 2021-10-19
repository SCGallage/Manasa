<?php
spl_autoload_register(function ($classname) {

    $path = "..\\";
    $extension = ".php";

    include_once $path . $classname . $extension;

});
