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
}
