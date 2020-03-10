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
}
