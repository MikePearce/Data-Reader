<?php
namespace Models\Core;

//require_once 'autoload.php';
require_once 'PHPUnit/Framework.php';

use Models\Error\ErrorHandler;

/**
 * Test class for TransactionTable.
 * Generated by PHPUnit on 2010-05-24 at 22:35:15.
 */
class TransactionTableTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var TransactionTable
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new TransactionTable;
        $this->object->setErrorHandler(new ErrorHandler());


    }

    /**
     * @todo Implement testGetDataFromFile().
     */
    public function testGetDataFromFile()
    {
        $this->assertTrue(
            is_array(
                $this->object->getDataFromFile('data.csv')
            )
        );
          
    }
}
?>
