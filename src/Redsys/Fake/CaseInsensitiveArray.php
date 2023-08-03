<?php

namespace Redsys\Fake;

use ArrayAccess;

class CaseInsensitiveArray implements ArrayAccess
{
    private $_container;

    public function __construct( Array $initial_array = [] ) {
        $this->_container = array_map( "strtolower", $initial_array );
    }

    public function offsetSet($offset, $value): void {
        if( is_string( $offset ) ) $offset = strtolower($offset);
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    public function offsetExists($offset): bool
    {
        if( is_string( $offset ) ) $offset = strtolower($offset);
        return isset($this->_container[$offset]);
    }

    public function offsetUnset($offset): void
    {
        if( is_string( $offset ) ) $offset = strtolower($offset);
        unset($this->container[$offset]);
    }

    public function offsetGet($offset): mixed
    {
        if( is_string( $offset ) ) $offset = strtolower($offset);
        return $this->container[$offset] ?? null;
    }
}