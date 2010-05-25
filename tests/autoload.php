<?php
function __autoload($class) {
    // convert namespace to full file path
    $class = str_replace('\\', '/', $class).'.php';
    if (file_exists($class))
    {
        require_once($class);
    }
    else {
        print $class .' does not exist';
    }
}