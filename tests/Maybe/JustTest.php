<?php

namespace monsieurluge\OptionalTests\Maybe;

use monsieurluge\Optional\Maybe\Just;
use PHPUnit\Framework\TestCase;

final class JustTest extends TestCase
{
    /**
     * @covers Just::getOr
     */
    public function testCanExtractTheValue()
    {
        // GIVEN "just a text"
        $just = new Just('foo bar');

        // WHEN the text is extracted
        $value = $just->getOr('nothing in here');

        // THEN the text is as expected
        $this->assertSame('foo bar', $value);
    }

    /**
     * @covers Just::getOr
     * @covers Just::map
     */
    public function testCanTransformTheValue()
    {
        // GIVEN "just a text"
        $just = new Just('foo bar');

        // WHEN a "to uppercase" transformation is mapped
        $uppercased = $just->map(function (string $origin) { return strtoupper($origin); });

        // THEN the origin has not been altered
        $this->assertSame('foo bar', $just->getOr('nothing in here'));
        // AND the extracted text is as expected
        $this->assertSame('FOO BAR', $uppercased->getOr('nothing in here'));
    }

    /**
     * @covers Just::bind
     * @covers Just::getOr
     */
    public function testCanBindJustAnotherValue()
    {
        // GIVEN "just a text"
        $just = new Just('foo bar');
        // AND the function to bind to, which returns a "just an uppercased text"
        $action = function (string $text) { return new Just(strtoupper($text)); };

        // WHEN the action is binded to the text
        $binded = $just->bind($action);

        // THEN the origin has not been altered
        $this->assertSame('foo bar', $just->getOr('nothing in here'));
        // AND the extracted text is as expected
        $this->assertSame('FOO BAR', $binded->getOr('nothing in here'));
    }
}
