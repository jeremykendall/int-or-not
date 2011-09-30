<?php

require_once dirname(__FILE__) . '/../int-functions.php';

class IsReallyIntTest extends PHPUnit_Framework_TestCase
{

    /**
     * Works as intended. Solves the can't-test-float-as-int problem
     * described by developer.
     */
    public function testFloatThatCanBeIntegerReturnsTrue()
    {
        $var = sqrt(16);
        $this->assertTrue(is_really_int($var));
        // Works as intended, but this should still be a float, IMHO.
        $this->assertEquals(4, $var);
    }
    
    /**
     * Works as one might expect
     */
    public function testIntegerReturnsTrue()
    {
        $var = 1;
        $this->assertTrue(is_really_int($var));
    }
    
    public function testIntegerStringReturnsTrue()
    {
        $var = "1";
        $this->assertTrue(is_really_int($var));
        // Works as intended, but this should still be a float, IMHO.
        $this->assertEquals(1, $var);
    }

    public function testBooleanTrueReturnsFalse()
    {
        $var = true;
        $this->assertFalse(is_really_int($var), 'Uh oh');
    }
    
    public function testBooleanFalseReturnsFalse()
    {
        $var = false;
        $this->assertFalse(is_really_int($var), 'Crap!');
    }
    
    public function testStringReturnsFalse()
    {
        $var = 'I should return false, yo.';
        $this->assertFalse(is_really_int($var), 'Seriously?  WTF?');
        
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
    
    /**
     * An example of the kind of behavior that will have your app acting
     * all wild and crazy, with the fun side effect of being near impossible to
     * troubleshoot.
     */
    public function testHolyCrapDidMyStringJustGetConvertedToZeroByThisDisaster()
    {
        $var = 'I should return false, yo.';
        is_really_int($var);
        $this->assertEquals(0, $var);
    }
}
