<?php

// set the required include paths
set_include_path(get_include_path() .
        PATH_SEPARATOR . '/home/sites/task'
);

// @todo Create an autoloader
$required = array('models/errorHandler');

// Grab each file
foreach($required as $file)
{
    include_once($file.'.php');
}

// Setup
errorHandler::setAppName('reportBuilder');



//TODO print formatted report

foreach ($merchant->getTransactions() as $transaction) {
    
}