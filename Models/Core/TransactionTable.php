<?php
namespace Models\Core;
/**
 * Source of transactions, can read data.csv directly for simplicty sake, 
 * should behave like a database (read only)
 *
 */
class TransactionTable extends \Models\BaseClass
{

    /**
     * @Desc    Open a file and construct an arrya of objects
     * @param   string $file
     * @param   string $mode
     * @return  mixed FALSE on error, or a file handle
     */
    public function getDataFromFile($file = 'data.csv', $mode = 'r')
    {
        $ret = FALSE;

        if ( $file AND ($fh = @fopen($file, $mode)) )
        {
            $ret = array();

            //@todo Run a check to see if it's actually a CSV file.
            while ( ($row = fgetcsv($fh, 1000, ";")) )
            {
                $o          = new \stdClass;
                $o->id      = $row[0];
                $o->date    = $row[1];
                $o->value   = $row[2];
                array_push($ret, $o);
            }

        }
        else {
           $this->_eHand->logError('Unable to open '. $file);
        }

        return $ret;
    }
    
}