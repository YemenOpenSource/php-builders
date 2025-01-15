<?php

namespace Omaralalwi\PhpBuilders\Traits;

use Omaralalwi\PhpBuilders\FluentBuilder;

trait Buildable
{
    /**
     * Returns an instance of the builder class.
     *
     * This is a static factory method that creates a new instance of the class.
     *
     * @return static A new instance of the builder class.
     */
    public static function build(): self
    {
        return new static;
    }
}
