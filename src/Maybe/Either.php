<?php

namespace monsieurluge\Optional\Maybe;

use monsieurluge\Optional\Maybe\Just;
use monsieurluge\Optional\Maybe\Maybe;
use monsieurluge\Optional\Maybe\Nothing;

class Either
{
    /**
     * Returns a "nothing".
     *
     * @return Maybe
     */
    public static function none(): Maybe
    {
        return new Nothing();
    }

    /**
     * Returns a "some value" object.
     *
     * @param mixed $value a <T> value
     *
     * @return Maybe a Maybe<T>
     */
    public static function some($value): Maybe
    {
        return new Just($value);
    }
}
