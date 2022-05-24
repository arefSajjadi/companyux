<?php


namespace App\Repositories;

use App\Models\Company;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

class CompanyRepository
{
    public function index(int $paginate = 30): LengthAwarePaginator
    {
        return Company::query()
            ->select('id', 'industry_id', 'name', 'brand', 'establishment_at', 'employees', 'url')
            ->where('status', Company::STATUS_ACTIVE)
            ->when(request()->filled('industry'), function (Builder $query) {
                $query->where('industry_id', request('industry'));
            })->orderBy('created_at')->paginate($paginate);
    }

    public function store(User $user, array $data): Model
    {
        return $user->companies()->create([
            'establishment_at' => $data['establishment_at'],
            'industry_id' => $data['industry_id'],
            'name' => $data['name'],
            'brand' => $data['brand'],
            'telephone' => $data['telephone'],
            'url' => $data['url'],
            'employees' => $data['employees'],
            'status' => Company::STATUS_WAITING
        ]);
    }

    public function delete(Company $company): void
    {
        $company->delete();
    }
}
