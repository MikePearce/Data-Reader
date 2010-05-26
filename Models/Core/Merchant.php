<?php
namespace Models\Core;
use \Models\Display\Display;
/**
 * @desc the meat of the application. Handles the runner
 * @author Mike Pearce <mike@mikepearce.net>
 * @package data-reader
 * @since 23/05/10
 */

class Merchant extends \Models\Core\abstractCore
{
    /**
     * @desc The datafile is where the data is located. Could be expanded
     * to be an sqlite file with little effort and some sniffing
     */
    private $_dataFile;

    /**
     * @desc Just set some defaults
     */
    public function __construct()
    {
        $this->_dataFile = NULL;
    }

    /**
     * @desc set the location of the datafile
     * @param string $f
     */
    public function setDataFile($f)
    {
        $this->_dataFile = $f;
    }

    /**
     * @desc get the data file
     * @return string
     */
    public function getDataFile()
    {
        return $this->_dataFile;
    }

    /**
     * @desc The job runner. When passed a merchant ID, it will grab
     *       all the data it needs and print to the screen
     */
    public function printReport()
    {
        $ret = FALSE;

        // Make this global, otherwise we can't access it
        global $argv;

        // Check we've got a merchant ID
        if ( !isset($argv[1]) OR $argv[1] == '--help' )
        {
            $this->_eHand->logError('Merchant ID not passed');
            $this->_eHand->showUsage();
        }
        else {
            if ($trans = $this->getTransactions($argv[1]))
            {
                $display = new display();

                // Print a header
                $display->printHeader();

                // For each transaction..
                foreach($trans as $row)
                {
                    $display->printRow($row);
                }
                $display->printFooter();
                $ret = TRUE;
            }

        }

        return $ret;

    }

    /**
     * @desc    Get all the transaction based on a given ID
     * @param int $id
     * @return mixed FALSE on error or an array
     */
    public function getTransactions($id)
    {
        $ret = FALSE;
        if ( 
                $file_array = $this->_transTable->getDataFromFile(
                    $this->getDataFile()
                )
            )
        {
            $ret = array();

            $header = FALSE;
            // If the ID matches, let's grab them!
            foreach ($file_array AS $row)
            {
                if ($id == $row->id OR $id == 'all')
                {
                    // If all, we don't want the head row
                    if ($id == 'all' AND $header == FALSE)
                    {
                        $header = TRUE;
                        continue;
                    }
                    // Do a little conversion
                    $row->value =  $this->_converter->convert($row->value);
                    array_push($ret, $row);
                }
            }
        }

        return $ret;
        
    }


}