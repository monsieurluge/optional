<?php

namespace monsieurluge\Optional\Maybe;

use Closure;
use monsieurluge\Optional\Maybe\Maybe;

class Nothing implements Maybe
{
    /**
     * @inheritDoc
     */
    public function bind(Closure $action): Maybe
    {
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getOr($default)
    {
        return $default;
    }

    /**
     * @inheritDoc
     */
    public function map(Closure $transformation): Maybe
    {
        return $this;
    }
}
