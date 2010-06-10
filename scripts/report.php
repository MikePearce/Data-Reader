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

$required = array(
    'Models\BaseClass'                      => FALSE,
    'Models\Error\ErrorHandler'             => FALSE,
    'Models\Core\TransactionTable'          => TRUE,
    'Models\Currency\CurrencyConverter'     => TRUE,
    'Models\Currency\CurrencyWebservice'    => TRUE,
    'Models\Display\Display'                => TRUE,
    'Models\Core\Merchant'                  => TRUE,
);

// Grab each file
foreach($required as $file => $inject)
{
    $className = array_pop(explode("\\", $file));
    ${$className} = new $file;

    // Inject some dependencis (if they exist)
    // @todo replace this suppression
    if($inject)
    {
        ${$className}->ErrorHandler      = $ErrorHandler;
        ${$className}->TransactionTable  = $TransactionTable;
    }
    
}

// Some other injections
$CurrencyConverter->setCurrencyWebService($CurrencyWebservice);
$Merchant->setCurrencyConverter($CurrencyConverter);

// Setup
$ErrorHandler->setAppName('reportBuilder');

// Get an instance and print
$Merchant->setDataFile('./data.csv');
$Merchant->printReport();
