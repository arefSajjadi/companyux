<?php

namespace App\Http\Controllers;

use App\Facades\CompanyFacade;
use App\Facades\IndustryFacade;
use App\Facades\UserFacade;
use App\Http\Requests\StoreCompanyRequest;
use App\Models\Company;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function index(): Factory|View|Application
    {
        $breadcrumb = breadcrumb(['شرکت ها']);

        $companies = CompanyFacade::index(30);

        return view('companies.index', [
            'breadcrumb' => $breadcrumb,
            'companies' => $companies
        ]);
    }

    public function myCompanies(): Factory|View|Application
    {
        $breadcrumb = breadcrumb(
            ['حساب کاربری', route('profile.dashboard')],
            ['لیست درخواست های افزودن شرکت']
        );

        $companies = UserFacade::companies(10);

        return view('companies.myCompanies', [
            'breadcrumb' => $breadcrumb,
            'companies' => $companies
        ]);
    }

    public function create(): Factory|View|Application
    {
        $breadcrumb = breadcrumb(
            ['حساب کاربری', route('profile.dashboard')],
            ['درخواست ثبت شرکت']
        );

        $industries = IndustryFacade::index();

        return view('companies.create', [
            'breadcrumb' => $breadcrumb,
            'industries' => $industries,
        ]);
    }

    public function store(StoreCompanyRequest $request): RedirectResponse
    {
        $data = [
            'establishment_at' => $request->establishment_at,
            'industry_id' => $request->industry_id,
            'name' => $request->name,
            'brand' => $request->brand,
            'telephone' => $request->telephone,
            'url' => $request->url,
            'employees' => $request->employees,
        ];

        $company = CompanyFacade::store(Auth::user(), $data);

        session()->flash('company_store', ['title' => $company->name]);

        return redirect()->route('companies.myCompanies');
    }

    public function show(Company $company): Factory|View|Application
    {
        if ($company->status !== Company::STATUS_ACTIVE)
            abort(404);

        $breadcrumb = breadcrumb(
            ['شرکت ها', route('companies.index')],
            [$company->name]
        );

        return view('companies.show', [
            'breadcrumb' => $breadcrumb,
            'company' => $company
        ]);
    }

    public function destroy(company $company): RedirectResponse
    {
        $this->authorize('delete', $company);

        if ($company->activeComments()->count())
            abort(401);

        CompanyFacade::delete($company);

        session()->flash('company_destroy');

        return back();
    }
}
