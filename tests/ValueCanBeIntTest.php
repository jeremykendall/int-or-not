<?php

require_once dirname(__FILE__) . '/../int-functions.php';

class ValueCanBeIntTest extends PHPUnit_Framework_TestCase
{

    public function testFloatThatCanBeIntegerReturnsTrue()
    {
        $this->assertTrue(valueCanBeInt(sqrt(16)));
    }

    public function testIntegerReturnsTrue()
    {
        $this->assertTrue(valueCanBeInt(1));
    }

    public function testIntegerStringReturnsTrue()
    {
        $var = "1";
        $this->assertTrue(valueCanBeInt($var));
        $this->assertEquals("1", $var);
    }

    public function testBooleanTrueReturnsFalse()
    {
        $var = true;
        $this->assertFalse(valueCanBeInt($var));
    }

    public function testBooleanFalseReturnsFalse()
    {
        $var = false;
        $this->assertFalse(valueCanBeInt($var));
    }

    public function testStringReturnsFalse()
    {
        $var = 'I should return false, yo.';
        $this->assertFalse(valueCanBeInt($var));
    }

    public function testFloatStringReturnsFalse()
    {
        $var = '12.2';
        $this->assertFalse(valueCanBeInt($var));
        $this->assertEquals('12.2', $var);
    }

    public function testFloatReturnsFalse()
    {
        $var = 12.2;
        $this->assertFalse(valueCanBeInt($var));
        $this->assertEquals(12.2, $var);
    }

}
