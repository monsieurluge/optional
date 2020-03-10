<?php

namespace monsieurluge\Optional\Maybe;

use Closure;
use InvalidArgumentException;
use monsieurluge\Optional\Maybe\Maybe;

class Just implements Maybe
{
    /** @var mixed */
    private $value;

    public function __construct($value)
    {
        if (true === is_null($value)) {
            throw new InvalidArgumentException('null value is not accepted');
        }

        $this->value = $value;
    }

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
        return $this->value;
    }

    /**
     * @inheritDoc
     */
    public function map(Closure $transformation): Maybe
    {
        throw new \RuntimeException(sprintf('method %s::%s not implemented', __CLASS__, __FUNCTION__));
    }
}
