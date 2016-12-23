<?php

require './vendor/autoload.php';

class ParenthesisParserTest extends PHPUnit_Framework_TestCase
{
    public function testStringProvider()
    {
        return [
            ['texto (de prueba) para probar', true],
            ['texto (de prueba para probar', false],
            ['Este (texto (de prueba) (sirve) para probar (si)) anda', true],
            ['Este (texto (de prueba (sirve) para (probar (si) anda).', false]
        ];
    }

    /**
     * @expectedException Exception
     * @expectedExceptionMessage Not a string.
     */
    public function testExceptionWhenNotString()
    {
        $parenParser = new ParenthesisParser(1);
    }

    /**
     * @expectedException Exception
     * @expectedExceptionMessage Cannot parse empty string.
     */
    public function testExceptionWhenEmpty()
    {
        $parenParser = new ParenthesisParser('');
    }

    /**
     * @dataProvider testStringProvider
     */
    public function testAreClosedCorrectly($string, $expected)
    {
        $parenParser = new ParenthesisParser($string);
        $result = $parenParser->areClosedCorrectly();
        $this->assertEquals($expected, $result);
    }
}