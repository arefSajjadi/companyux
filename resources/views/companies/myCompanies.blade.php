@extends('profile.index')

@section('card-header')
    <div class="card-header">
        <h5>
            <i class="bi bi-building"></i>
            شرکت ها
        </h5>
    </div>
@endsection

@section('card-body')
    <div class="card-body">
        @includeWhen(session('company_store'),'layouts.companies.alert.store')
        @includeWhen(session('company_destroy'),'layouts.companies.alert.destroy')

        @includeWhen($companies->isEmpty(), 'layouts.companies.empty')

        @includeWhen($companies->isNotEmpty(),'layouts.companies.companiesTable')
    </div>
@endsection

@section('card-footer')
    @if($companies->total() > $companies->perPage())
        <div class="card-footer">
            {{$companies->links()}}
        </div>
    @endif
@endsection

@section('scripts')
    @include('layouts.plugins.validateScript')
@endsection
