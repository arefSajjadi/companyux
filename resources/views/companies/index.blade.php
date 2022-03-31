@extends('layouts.app')

@section('content')
    @includeWhen($breadcrumb,'layouts.breadcrumb.breadcrumb',$breadcrumb)
    <section class="container-fluid">
        <div class="row g-2" dir="rtl">
            <div class="col-lg-2">
                @include('layouts.search.filters.card')
                @includeWhen($companies?->count(), 'layouts.search.helpUs')
            </div>
            <div class="col-lg-10">
                <div class="card shadow">
                    <div class="card-header text-center">
                         لیست شرکت ها ~
                        {{$companies?->count()}}
                    </div>
                    <div class="card-body">
                        <div class="row g-2" dir="rtl">
                            @forelse($companies as $company)
                                <div class="col-12 col-lg-2 col-md-4 col-sm-6" dir="ltr">
                                    @include('layouts.companies.item.card', ['company' => $company])
                                </div>
                            @empty
                                @include('layouts.search.emptyResult')
                            @endforelse
                        </div>
                    </div>
                    @if($companies->total() > $companies->perPage())
                        <div class="card-footer">
                            {{$companies->links()}}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
