<?php

namespace App\Http\Controllers;

use App\DB\CompanyRepo;
use App\Http\Requests\StoreCompanyRequest;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function index()
    {
        $companyRepo = new CompanyRepo;
        $breadcrumb = [
            'items' => [
                [
                    'title' => 'شرکت ها'
                ]
            ]
        ];

        $companies = $companyRepo->getCompanies();

        return view('companies.index', [
            'breadcrumb' => $breadcrumb,
            'companies' => $companies
        ]);
    }

    public function myCompanies()
    {
        $companyRepo = new CompanyRepo;
        $breadcrumb = $this->breadcrumb('حساب کاربری',  route('profile.dashboard'), 'لیست درخواست های افزودن شرکت');
        $companies = $companyRepo->getUserCompanies(Auth::user());

        return view('companies.myCompanies', [
            'breadcrumb' => $breadcrumb,
            'companies' => $companies
        ]);
    }

    public function create()
    {
        $companyRepo = new CompanyRepo;

        $breadcrumb = $this->breadcrumb('حساب کاربری',  route('profile.dashboard'), 'درخواست ثبت شرکت');

        $industries = $companyRepo->getIndustry();
        return view('companies.create', [
            'breadcrumb' => $breadcrumb,
            'industries' => $industries,
        ]);
    }



    public function store(StoreCompanyRequest $request)
    {
        $companyRepo = new CompanyRepo;
        $company = $companyRepo->storeCompany($request, Auth::user());

        session()->flash('company_store', ['title' => $company->name]);

        return redirect()->route('companies.myCompanies');
    }


    public function show(Company $company)
    {
        $breadcrumb = $this->breadcrumb('شرکت ها',  route('companies.index'), $company->name);

        return view('companies.show', [
            'breadcrumb' => $breadcrumb,
            'company' => $company
        ]);
    }


    public function destroy(company $company)
    {
        $companyRepo = new CompanyRepo;
        $this->authorize('delete', $company);
        if ($company->activeComments()->count())
            abort(401);

        $companyRepo->deleteCompany($company);
        session()->flash('company_destroy');

        return back();
    }


    protected function breadcrumb($title1, $link, $title2): array
    {
        return [
            'items' => [
                [
                    'title' => $title1,
                    'link' => $link
                ],
                [
                    'title' => $title2
                ]
            ]
        ];
    } 

}
