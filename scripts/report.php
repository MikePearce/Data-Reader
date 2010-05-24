<?php

// set the required include paths
set_include_path(get_include_path() .
        PATH_SEPARATOR . '/home/sites/datareader'
);

// @todo Create an autoloader
// Note: The order is important (for injecting dependecies)
include('models/BaseClass.php');

$required = array(
    'ErrorHandler'      => FALSE,
    'TransactionTable'  => TRUE,
    'Merchant'          => TRUE,
    'Display'           => FALSE,
    'CurrencyConverter' => FALSE,
    'CurrencyWebservice' => FALSE
);

// Grab each file
foreach($required as $file => $inject)
{

    include_once('models/'.$file.'.php');
    ${$file} = new $file;

    // Inject some dependencis (if they exist)
    // @todo replace this suppression
    if($inject)
    {
        ${$file}->ErrorHandler      = $ErrorHandler;
        ${$file}->TransactionTable  = $TransactionTable;
    }
    
}

// Some other injections
$CurrencyConverter->setCurrencyWebService($CurrencyWebservice);
$Merchant->setCurrencyConverter($CurrencyConverter);

// Setup
$ErrorHandler->setAppName('reportBuilder');

// Get an instance and print
$Merchant->setDataFile('/home/sites/datareader/data.csv');
$Merchant->printReport();
