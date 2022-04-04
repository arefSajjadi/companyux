<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Models\Company;
use App\Repositories\CompanyRepository;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function __construct(CompanyRepository $companyRepository)
    {
        $this->repository = $companyRepository;
    }

    private CompanyRepository $repository;

    public function index()
    {
        $companies = $this->repository->getCompanies();

        return view('companies.index', [
            'breadcrumb' => $this->breadcrumb(['شرکت ها']),
            'companies' => $companies
        ]);
    }

    public function myCompanies()
    {
        $breadcrumb = $this->breadcrumb(
            ['حساب کاربری', route('profile.dashboard')],
            ['لیست درخواست های افزودن شرکت']
        );

        $companies = $this->repository->getUsersProprety(Auth::user());

        return view('companies.myCompanies', [
            'breadcrumb' => $breadcrumb,
            'companies' => $companies
        ]);
    }

    public function create()
    {
        $breadcrumb = $this->breadcrumb(
            ['حساب کاربری', route('profile.dashboard')],
            ['درخواست ثبت شرکت']
        );

        $industries = $this->repository->getIndustry();
        return view('companies.create', [
            'breadcrumb' => $breadcrumb,
            'industries' => $industries,
        ]);
    }



    public function store(StoreCompanyRequest $request)
    {
        $data = [
            'establishment_at' => $request->establishment_at,
            'industry_id' => $request->industry_id,
            'name' => $request->name,
            'brand' => $request->brand,
            'telephone' => $request->telephone,
            'url' => $request->url,
            'employees' => $request->employees,
            'status' => Company::STATUS_WAITING
        ];

        $company = $this->repository->store($data, Auth::user());

        session()->flash('company_store', ['title' => $company->name]);

        return redirect()->route('companies.myCompanies');
    }


    public function show(Company $company)
    {
        $breadcrumb = $this->breadcrumb(
            ['شرکت ها', route('companies.index')],
            [$company->name]
        );
    
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

        $this->repository->delete($company);
        session()->flash('company_destroy');

        return back();
    }


    protected function breadcrumb(array ...$items): array
    {
        //get array of items and set them as breadcrumb items
        foreach ($items as $key => $item) {
            $breadcrumb['items'][$key] = [
                'title' => $item[0],
                'link' => $item[1] ?? null //if it was undefine set null value
            ];
        }
        return $breadcrumb;
    }
}
