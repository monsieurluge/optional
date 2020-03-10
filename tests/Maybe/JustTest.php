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
        // GIVEN "just a value"
        $just = new Just('foo bar');

        // WHEN the value is extracted
        $value = $just->getOr('nothing in here');

        // THEN the value is as expected
        $this->assertSame('foo bar', $value);
    }
}
