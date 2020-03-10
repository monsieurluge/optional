<?php

namespace monsieurluge\OptionalTests\Maybe;

use monsieurluge\Optional\Maybe\Nothing;
use PHPUnit\Framework\TestCase;

final class NothingTest extends TestCase
{
    /**
     * @covers Nothing::getOr
     */
    public function testDefaultValueIsExtracted()
    {
        // GIVEN nothing
        $nothing = new Nothing();

        // WHEN the value is extracted
        $value = $nothing->getOr('nothing in here');

        // THEN the value is as expected
        $this->assertSame('nothing in here', $value);
    }

    /**
     * @covers Nothing::getOr
     * @covers Nothing::map
     */
    public function testMapDoesNothing()
    {
        // GIVEN nothing
        $nothing = new Nothing();

        // WHEN a "to uppercase" transformation is mapped
        $uppercased = $nothing->map(function (string $origin) { return strtoupper($origin); });

        // THEN the origin is still nothing
        $this->assertSame('nothing in here', $nothing->getOr('nothing in here'));
        // AND the extracted text is the default one
        $this->assertSame('default value', $uppercased->getOr('default value'));
    }
}
