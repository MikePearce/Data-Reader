<?php
namespace Models\Display;

/**
 * @desc This class will print the various data to the screen in an formatted
 * table
 * @author Mike Pearce <mike@mikepearce.net>
 * @package data-reader
 * @since 23/05/10
 */
class display
{
    private $_padSize;

    /**
     * @desc Just set some defaults
     */
    public function __construct()
    {
        $this->_padSize = 15;
    }

    /**
     * @desc How much padding, sir?
     * @param int $size
     */
    public function setPadSize($size)
    {
        $this->_padSize = $size;
    }

    /**
     * @desc print the header with formatted column headings
     */
    public function printHeader()
    {
        print str_pad('+', $this->_padSize + 1, "-");
        print str_pad('+', $this->_padSize + 1, "-");
        print str_pad('+', $this->_padSize + 1, "-")."+\n";
        print "|". str_pad('ID', $this->_padSize, " ", STR_PAD_BOTH);
        print "|". str_pad('Date', $this->_padSize, " ", STR_PAD_BOTH);
        print "|". str_pad('Value', $this->_padSize, " ", STR_PAD_BOTH) ."|\n";
        print str_pad('+', $this->_padSize + 1, "-");
        print str_pad('+', $this->_padSize + 1, "-");
        print str_pad('+', $this->_padSize + 1, "-")."+\n";
    }

    /**
     * @desc Print the row as formatted
     * @param stdClass $row
     */
    public function printRow($row)
    {
        foreach($row AS $item)
        {
            print "|";
            print str_pad(" ". $item, $this->_padSize);
        }
        print "|\n";
    }

    /**
     * @desc Print the formatted footer
     */
    public function printFooter()
    {
        print str_pad('+', $this->_padSize + 1, "-");
        print str_pad('+', $this->_padSize + 1, "-");
        print str_pad('+', $this->_padSize + 1, "-")."+\n";
    }
}