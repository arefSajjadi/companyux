<?php

namespace App\Facades;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Facade;

/**
 * @method static Collection jobs()
 */
class JobFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'job';
    }
}
