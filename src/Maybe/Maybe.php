<?php

namespace monsieurluge\Optional\Maybe;

use Closure;

interface Maybe
{
    /**
     * Binds the action to the optional value, returning a new optional value.
     *
     * @param Closure $action a function as follows: <T> -> Maybe<U>
     *
     * @return Maybe a Maybe<U>
     */
    public function bind(Closure $action): Maybe;

    /**
     * Returns either the optional value or the default one.
     *
     * @param mixed $default
     *
     * @return mixed
     */
    public function getOr($default);

    /**
     * Transforms the optional value.
     *
     * @param Closure $transformation a function as follows: <T> -> <U>
     *
     * @return Maybe a Maybe<U>
     */
    public function map(Closure $transformation): Maybe;
}
