<?php
set_include_path(get_include_path() .
        PATH_SEPARATOR . '/home/sites/datareader/Models'
);
function __autoload($class) {
    // convert namespace to full file path
    $class = '/home/sites/datareader/'.str_replace('\\', '/', $class).'.php';
    if (file_exists($class))
    {
        require_once($class);
    }
    else {
        
        print $class .' does not exist. Cannot load it man!s';
    }
}