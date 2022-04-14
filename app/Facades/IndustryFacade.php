<?php

namespace App\Facades;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Facade;

/**
 * @method static Collection index()
 */
class IndustryFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'industry';
    }
}
