<?php

namespace Redsys\Fake;

class CaseInsensitiveArray implements \ArrayAccess, \Countable, \IteratorAggregate
{
    private $container = [];

    public function __construct($initial_array = [])
    {
        $this->container = \array_change_key_case($initial_array, \CASE_LOWER);
    }

    /**
     * @return int
     */
    #[\ReturnTypeWillChange]
    public function count()
    {
        return \count($this->container);
    }

    /**
     * @return \ArrayIterator
     */
    #[\ReturnTypeWillChange]
    public function getIterator()
    {
        return new \ArrayIterator($this->container);
    }

    /**
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function offsetSet($offset, $value)
    {
        $offset = self::maybeLowercase($offset);
        if (null === $offset) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * @return bool
     */
    #[\ReturnTypeWillChange]
    public function offsetExists($offset)
    {
        $offset = self::maybeLowercase($offset);

        return isset($this->container[$offset]);
    }

    /**
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function offsetUnset($offset)
    {
        $offset = self::maybeLowercase($offset);
        unset($this->container[$offset]);
    }

    /**
     * @return mixed
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        $offset = self::maybeLowercase($offset);

        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    private static function maybeLowercase($v)
    {
        if (\is_string($v)) {
            return \strtolower($v);
        }

        return $v;
    }
}