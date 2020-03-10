<?php

namespace monsieurluge\OptionalTests\Maybe;

use monsieurluge\Optional\Maybe\Just;
use monsieurluge\Optional\Maybe\Nothing;

use PHPUnit\Framework\TestCase;

final class JustAndNothingTest extends TestCase
{
    /**
     * @covers Just::bind
     * @covers Just::getOr
     * @covers Nothing::getOr
     */
    public function testCanBindActionWhichReturnsNothingOnJustWrapper()
    {
        // GIVEN a "just a text"
        $just = new Just('foo bar');
        // AND the function to bind to, which returns a "nothing"
        $action = function () { return new Nothing(); };

        // WHEN the action is binded
        $final = $just->bind($action);

        // THEN the origin has not been altered
        $this->assertSame('foo bar', $just->getOr('nothing in here'));
        // AND the final value is a default one
        $this->assertSame('nothing in here', $final->getOr('nothing in here'));
    }
}
