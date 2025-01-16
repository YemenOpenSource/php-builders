<?php

namespace Omaralalwi\PhpBuilders\Traits;

trait Jsonable
{
    public function toJson(): string
    {
        $properties = [];
        $reflection = new \ReflectionClass($this);
        foreach ($reflection->getProperties() as $property) {
            $property->setAccessible(true);
            $properties[$property->getName()] = $property->getValue($this);
        }
        return json_encode($properties);
    }
}
