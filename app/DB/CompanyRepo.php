<?php


namespace App\DB;

use App\Models\Company;
use App\Models\Industry;
use Illuminate\Contracts\Database\Eloquent\Builder;

class CompanyRepo
{
    public function getCompanies()
    {
        return Company::query()->where('status', Company::STATUS_ACTIVE)
            ->when(request()->filled('industry'), function (Builder $query) {
                $query->where('industry_id', request('industry'));
            })->orderBy('created_at')->paginate(30);
    }

    public function getUserCompanies($user)
    {
        return $user->companies()->paginate(10);
    }

    public function getIndustry()
    {
        return Industry::all();
    }


    public function storeCompany($request, $user)
    {
        return $user->companies()->create([
            'establishment_at' => $request->establishment_at,
            'industry_id' => $request->industry_id,
            'name' => $request->name,
            'brand' => $request->brand,
            'telephone' => $request->telephone,
            'url' => $request->url,
            'employees' => $request->employees,
            'status' => Company::STATUS_WAITING
        ]);
    }

    public function deleteCompany($company)
    {
        $company->delete();
    }
}
