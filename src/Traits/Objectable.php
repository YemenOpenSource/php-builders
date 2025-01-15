<?php

namespace Omaralalwi\PhpBuilders\Traits;

trait Objectable
{
    public function toObject(): object
    {
        $object = new \stdClass();
        $reflection = new \ReflectionClass($this);
        foreach ($reflection->getProperties() as $property) {
            $property->setAccessible(true);
            $object->{$property->getName()} = $property->getValue($this);
        }
        return $object;
    }
}
