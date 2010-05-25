<?php
namespace Models\Display;

require_once 'autoload.php';
require_once 'PHPUnit/Framework.php';

/**
 * Test class for Display.
 */
class DisplayTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Display
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Display;
    }

    public function testSetPadSize()
    {
        $this->object->setPadSize(10);
        $this->assertEquals(10, $this->object->getPadSize(10));
    }


}
?>
