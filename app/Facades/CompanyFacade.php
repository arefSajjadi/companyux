<?php

namespace App\Facades;

use App\Models\Company;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Facade;

/**
 * @method static LengthAwarePaginator index(int $paginate = 30)
 * @method static Company store(Authenticatable|User $user, array $data)
 * @method static void delete(Company $company)

 */
class CompanyFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'company';
    }
}
