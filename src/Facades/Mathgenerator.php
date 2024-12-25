<?php

namespace Teguhpermadi\Mathgenerator\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Teguhpermadi\Mathgenerator\Mathgenerator
 */
class Mathgenerator extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Teguhpermadi\Mathgenerator\Mathgenerator::class;
    }
}
