<?php
namespace Models\Display;

class display
{
    private $_padSize;

    public function __construct()
    {

        $this->_padSize = 15;
    }

    public function setPadSize($size)
    {
        $this->_padSize = $size;
    }

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

    public function printRow($row)
    {
        foreach($row AS $item)
        {
            print "|";
            print str_pad(" ". $item, $this->_padSize);
        }
        print "|\n";
    }

    public function printFooter()
    {
        print str_pad('+', $this->_padSize + 1, "-");
        print str_pad('+', $this->_padSize + 1, "-");
        print str_pad('+', $this->_padSize + 1, "-")."+\n";
    }
}