<?php

namespace App\Facades;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Facade;

/**
 * @method static LengthAwarePaginator Comments(int $paginate = 10)
 * @method static LengthAwarePaginator companies(int $paginate = 10)
 */
class UserFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'user';
    }
}
