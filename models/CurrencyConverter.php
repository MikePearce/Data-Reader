<?php

/**
 * Uses CurrencyWebservice
 *
 */
class CurrencyConverter
{

    private $_currWebService;

    /**
     * @desc    This is a PITA. As the file isn't UTF-8 encoded, I have to
     *          add this hacky chunk
     * @todo    Write a library that will do this with a greater degree of accuracy
     *          and lesss suckyness
     * @param   float $amount
     * @return  float
     */
    public function convert($amount, $percentage = '1')
    {
        // Is it a dollar
        if ($amount[0] == '$')
        {
            $curr = '$';
            $amount = substr($amount, 1);
        }
        else {
            $x = utf8_decode(substr($amount, 0, 2));
            if ($x == '?')
            {
                $curr = 'e';
                $amount = substr($amount, 3);
            }
            else {
                $curr = $x;
                $amount = substr($amount, 2);
            }
        }
        $exchange = $this->_currWebService->getExchangeRate($curr);

        return $curr.number_format($amount/$exchange, 2);
    }

    /**
     * @desc for injection
     * @param CurrencyWebservice $o
     */
    public function setCurrencyWebService($o)
    {
        $this->_currWebService = $o;
    }

}