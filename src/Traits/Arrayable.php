<?php

namespace Omaralalwi\PhpBuilders\Traits;

trait Arrayable
{
    public function toArray(): array
    {
        $properties = [];
        $reflection = new \ReflectionClass($this);
        foreach ($reflection->getProperties() as $property) {
            $property->setAccessible(true);
            $properties[$property->getName()] = $property->getValue($this);
        }
        return $properties;
    }
}
