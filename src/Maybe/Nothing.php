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
        throw new \RuntimeException(sprintf('method %s::%s not implemented', __CLASS__, __FUNCTION__));
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
        throw new \RuntimeException(sprintf('method %s::%s not implemented', __CLASS__, __FUNCTION__));
    }
}
