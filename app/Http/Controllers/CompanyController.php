<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Models\Company;
use App\Models\Industry;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function index()
    {
        $breadcrumb = [
            'items' => [
                [
                    'title' => 'شرکت ها'
                ]
            ]
        ];

        $companies = Company::query()->where('status', Company::STATUS_ACTIVE)
            ->when(request()->filled('industry'), function (Builder $query) {
                $query->where('industry_id', request('industry'));
            })->orderBy('created_at')->paginate(30);

        return view('companies.index', [
            'breadcrumb' => $breadcrumb,
            'companies' => $companies
        ]);
    }

    public function myCompanies()
    {
        $breadcrumb = [
            'items' => [
                [
                    'title' => 'حساب کاربری',
                    'link' => route('profile.dashboard'),
                ],
                [
                    'title' => 'لیست درخواست های افزودن شرکت',
                ],
            ]
        ];

        $companies = Auth::user()->companies()->paginate(10);

        return view('companies.myCompanies', [
            'breadcrumb' => $breadcrumb,
            'companies' => $companies
        ]);
    }

    public function create()
    {
        $breadcrumb = [
            'items' => [
                [
                    'title' => 'حساب کاربری',
                    'link' => route('profile.dashboard'),
                ],
                [
                    'title' => 'درخواست ثبت شرکت',
                ],
            ]
        ];

        $industries = Industry::all();
        return view('companies.create', [
            'breadcrumb' => $breadcrumb,
            'industries' => $industries,
        ]);
    }

    public function store(StoreCompanyRequest $request)
    {
        /** @var company $company */
        $company = Auth::user()->companies()->create([
            'establishment_at' => $request->establishment_at,
            'industry_id' => $request->industry_id,
            'name' => $request->name,
            'brand' => $request->brand,
            'telephone' => $request->telephone,
            'url' => $request->url,
            'employees' => $request->employees,
            'status' => Company::STATUS_WAITING
        ]);

        session()->flash('company_store', ['title' => $company->name]);

        return redirect()->route('companies.myCompanies');
    }

    public function show(company $company)
    {
        if ($company->status !== Company::STATUS_ACTIVE)
            abort(404);

        $breadcrumb = [
            'items' => [
                [
                    'title' => 'شرکت ها',
                    'link' => route('companies.index')
                ],
                [
                    'title' => $company->name
                ]
            ]
        ];

        return view('companies.show', [
            'breadcrumb' => $breadcrumb,
            'company' => $company
        ]);
    }

    public function destroy(company $company)
    {
        $this->authorize('delete', $company);

        if ($company->activeComments()->count())
            abort(401);

        $company->delete();

        session()->flash('company_destroy');

        return back();
    }
}
