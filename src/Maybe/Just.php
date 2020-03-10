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
        return ($action)($this->value);
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
        return new self(($transformation)($this->value));
    }
}
