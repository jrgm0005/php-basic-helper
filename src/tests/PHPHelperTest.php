<?php

use PHPUnit\Framework\TestCase;
use PHPHelper\PHPHelper as PHPHelper;

class PHPHelperTest extends TestCase
{

    /**
     * Get a private method for testing/documentation purposes.
     * How to use for MyClass->foo():
     *      $cls = new MyClass();
     *      $foo = PHPUnitUtil::getPrivateMethod($cls, 'foo');
     *      $foo->invoke($cls, $...);
     * @param object $obj The instantiated instance of your class
     * @param string $method The name of your private/protected method
     * @return ReflectionMethod The method you asked for
     */
    public static function getProtectedMethod($obj, $name) {
        $class = new ReflectionClass($obj);
        $method = $class->getMethod($name);
        $method->setAccessible(true);
        return $method;
    }

    protected function setUp() : void
    {
        parent::setUp();
        $this->helper = new PHPHelper;

    }

    public function test_strEndsWith_whenStringEndsWithSearchedPart_shouldReturnTrue()
    {
        //Given
        $text = "TEST";
        $ending = "T";
        //When
        $result = $this->helper->str_ends_with($text, $ending);
        //Then
        $expectedValue = true;
        $this->assertEquals($expectedValue, $result);
    }

    public function test_strEndsWith_whenStringNotEndsWithSearchedPart_shouldReturnFalse()
    {
        //Given
        $text = "TEST";
        $ending = "Z";
        //When
        $result = $this->helper->str_ends_with($text, $ending);
        //Then
        $expectedValue = false;
        $this->assertEquals($expectedValue, $result);
    }

    public function test_strStartsWith_whenStringStartsWithSearchedPart_shouldReturnTrue()
    {
        //Given
        $text = "TEST";
        $ending = "TE";
        //When
        $result = $this->helper->str_starts_with($text, $ending);
        //Then
        $expectedValue = true;
        $this->assertEquals($expectedValue, $result);
    }

    public function test_strStartsWith_whenStringNotStartsWithSearchedPart_shouldReturnFalse()
    {
        //Given
        $text = "TEST";
        $ending = "Z";
        //When
        $result = $this->helper->str_starts_with($text, $ending);
        //Then
        $expectedValue = false;
        $this->assertEquals($expectedValue, $result);
    }

    public function test_strContains_whenStringIncludesSearchedPart_shouldReturnTrue()
    {
        //Given
        $text = "TEST";
        $ending = "ES";
        //When
        $result = $this->helper->str_contains($text, $ending);
        //Then
        $expectedValue = true;
        $this->assertEquals($expectedValue, $result);
    }

    public function test_strContains_whenStringNotIncludesSearchedPart_shouldReturnFalse()
    {
        //Given
        $text = "TEST";
        $ending = "Z";
        //When
        $result = $this->helper->str_contains($text, $ending);
        //Then
        $expectedValue = false;
        $this->assertEquals($expectedValue, $result);
    }

}
