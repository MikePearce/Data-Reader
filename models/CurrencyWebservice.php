<?php

/**
 * Dummy web service returning random exchange rates
 * @author Mike Pearce <mike@mikepearce.net>
 * @package data-reader
 * @since 23/05/10
 */
class CurrencyWebservice
{

    /**
     * @todo return random value here for basic currencies like GBP USD EUR (simulates real API)
     *
     */
    public function getExchangeRate($currency)
    {
        // Return random float
        return (1+lcg_value()*(abs(2-1)));
    }
}