<?php


namespace App\Repositories;


use App\Models\Company;
use App\Models\Industry;
use App\Repositories\Interfaces\RepositoryInterface;
use Illuminate\Contracts\Database\Eloquent\Builder;

class CompanyRepository implements RepositoryInterface
{
    public function getCompanies()
    {
        return Company::query()->where('status', Company::STATUS_ACTIVE)
            ->when(request()->filled('industry'), function (Builder $query) {
                $query->where('industry_id', request('industry'));
            })->orderBy('created_at')->paginate(30);
    }

    public function getUsersProprety($user)
    {
        return $user->companies()->paginate(10);
    }

    public function getIndustry()
    {
        return Industry::all();
    }


    public function store($data, $user, $relate = null)
    {
        return $user->companies()->create($data);
    }

    public function delete($company)
    {
        $company->delete();
    }
    
}
