<nav class="navbar navbar-expand-md navbar-light bg-light shadow-sm">
    <div class="container">
        <!-- navbar brand -->
        <a class="navbar-brand" href="{{route('index')}}">@include('layouts.logo.simple')</a>

        <!-- navbar toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- navbar -->
        <div class="collapse navbar-collapse text-end" id="navbarSupportedContent">
            <!-- navbar items -->
            <div class="navbar-nav ms-auto" dir="rtl">
                <a class="nav-link {{isActiveRoute('index')}}" href="{{route('index')}}">خانه</a>
                <a class="nav-link {{isActiveRoute('companies*')}}" href="{{route('companies.index')}}">شرکت ها</a>
            </div>
            <!-- profile -->
            <div class="navbar-nav border-lg-left">
                @include('layouts.navigation.profile')
            </div>
        </div>
    </div>
</nav>
