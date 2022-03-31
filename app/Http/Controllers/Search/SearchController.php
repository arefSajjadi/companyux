<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Models\Company;
use Illuminate\Database\Eloquent\Builder;

class SearchController extends Controller
{
    public function suggestionSearch(SearchRequest $request)
    {
        return $request->key;
    }

    public function searchResult(SearchRequest $request)
    {
        $breadcrumb = [
            'items' => [
                [
                    'title' => 'جستجو'
                ],
                [
                    'title' => $request->key
                ]
            ]
        ];

        $reservedSymbols = ['-', '+', '<', '>', '@', '(', ')', '~'];
        $searchTerm = str_replace($reservedSymbols, ' ', $request->key);
        $searchValues = preg_split('/\s+/', $searchTerm, -1, PREG_SPLIT_NO_EMPTY);

        $companies = Company::query()
            ->where('status', Company::STATUS_ACTIVE)
            ->when($request->filled('industry'), function (Builder $query) use ($request) {
                $query->where('industry_id', $request->industry);
            })
            ->where(function (Builder $query) use ($searchValues, $searchTerm) {
                $query->orWhere('name', 'like', "%{$searchTerm}%");
                $query->orWhere('brand', 'like', "%{$searchTerm}%");
            })
            ->where(function (Builder $query) use ($searchValues) {
                foreach ($searchValues as $value) {
                    $query->orWhere('name', 'like', "%{$value}%");
                    $query->orWhere('brand', 'like', "%{$value}%");
                }
            })->paginate(30);

        return view('search.index', [
            'breadcrumb' => $breadcrumb,
            'companies' => $companies
        ]);
    }
}
