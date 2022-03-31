@extends('layouts.app')

@section('content')
    <section class="container min-vh-100">
        @includeWhen($breadcrumb,'layouts.breadcrumb.breadcrumb',$breadcrumb)

        <div class="row" dir="rtl">
            <div class="col-12 col-lg-3 d-flex">
                @include('layouts.profile.sidebar')
            </div>
            <div class="col-12 col-lg-9 mt-4 mt-lg-0">
                <div class="card">
                    @yield('card-header')
                    @yield('card-body')
                    @yield('card-footer')
                </div>
            </div>
        </div>
    </section>
@endsection
