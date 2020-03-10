<?php

namespace monsieurluge\OptionalTests\Maybe;

use monsieurluge\Optional\Maybe\Either;
use PHPUnit\Framework\TestCase;

final class EitherTest extends TestCase
{
    /**
     * @covers Either::some
     */
    public function testCanCreateSomethingAndExtractTheValue()
    {
        // GIVEN some text
        $someText = Either::some('foo bar');

        // WHEN the value is extracted
        $value = $someText->getOr('nothing in here');

        // THEN the value is as expected
        $this->assertSame('foo bar', $value);
    }

    /**
     * @covers Either::none
     */
    public function testCanCreateNothing()
    {
        // GIVEN "a nothing"
        $none = Either::none();

        // WHEN the value is extracted
        $value = $none->getOr('nothing in here');

        // THEN the value is the default one
        $this->assertSame('nothing in here', $value);
    }
}
