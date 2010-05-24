<?php

class Merchant
{
    private $_csvFields;



    /**
     * @Desc    Open a file and construct an arrya of objects
     * @param   string $file
     * @param   string $mode
     * @return  mixed FALSE on error, or a file handle
     */
    public function getDataFromFile($file = 'data.csv', $mode = 'r')
    {
        $ret = FALSE;

        if ( ($fh = fopen($file, $mode)) )
        {
            $ret = array();

            //@todo Run a check to see if it's actually a CSV file.
            while ( ($row = fgetcsv($fh, 1000, ";")) )
            {
                $o          = new stdClass;
                $o->id      = $row[0];
                $o->date    = $row[1];
                $o->value   = $row[2];
                array_push($ret, $o);
            }
            
        }
        else {
            errorHandler::logError('Unable to open '. $file);
        }

        return $ret;
    }

    public function

    /**
     * @desc    Get all the transaction based on a given ID
     */
    public function getTransactions()
    {
        $ret = FALSE;
        if ( ($file_array = $this->getDataFromFile()) )
        {
            $ret = array();
            
            // If the ID matches, let's grab them!
            foreach ($file_array AS $row)
            {
                if ($id == $row->id)
                {
                    array_push($ret, $row);
                }
            }
        }

        return $ret;

        
    }
}