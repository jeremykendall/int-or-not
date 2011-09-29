<?php

require_once dirname(__FILE__) . '/../int-functions.php';

class IsReallyIntTest extends PHPUnit_Framework_TestCase
{
    /**
     * Although the error is "only" an E_STRICT, this behavior is undesirable IMHO.  
     * Do you really want to have to assign the value you want to test to a 
     * variable and then test it?  Sounds like more work than it's worth to me.
     * 
     * I would also test for passing a value directly to the function, 
     * except that causes a Fatal error.  Not cool.
     */
    public function testPassingValueByReferenceIsFatalError()
    {
        $this->setExpectedException('PHPUnit_Framework_Error', 'Only variables should be passed by reference');
        is_really_int(sqrt(16));
    }
    
    public function testIntegerReturnsTrue()
    {
        $var = sqrt(16);
        $this->assertTrue(is_really_int($var));
        $this->assertEquals(4, $var);
    }
    
    public function testIntegerStringReturnsTrue()
    {
        $var = "1";
        $this->assertTrue(is_really_int($var));
        $this->assertEquals(1, $var);
    }
    
    public function testBooleanTrueReturnsFalse()
    {
        $var = true;
        $this->assertFalse(is_really_int($var));
    }
    
    public function testBooleanFalseReturnsFalse()
    {
        $var = false;
        $this->assertFalse(is_really_int($var));
    }
    
    public function testStringCharactersReturnsFalse()
    {
        $var = 'I should return false, yo.';
        $this->assertFalse(is_really_int($var));
    }
    
    public function testFloatStringReturnsFalse()
    {
        $var = '12.2';
        $this->assertFalse(is_really_int($var));
        $this->assertEquals('12.2', $var);
    }
    
    public function testFloatReturnsFalse()
    {
        $var = 12.2;
        $this->assertFalse(is_really_int($var));
        $this->assertEquals(12.2, $var);
    }
}
