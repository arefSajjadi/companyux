@extends('layouts.app')

@section('content')
    @includeWhen($breadcrumb,'layouts.breadcrumb.breadcrumb',$breadcrumb)

    @include('layouts.companies.show.sections.companyInfo')

    @include('layouts.companies.show.sections.companyComments')
@endsection

@section('scripts')
    @include('layouts.plugins.validateScript')
@endsection
