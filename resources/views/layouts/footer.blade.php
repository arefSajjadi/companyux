@unless(request()->route()->named('index') or request()->route()->named('login'))
    <footer class="footer shadow">
        <div class="row g-0 gy-3 text-center">
            <!-- left and btn -->
            <div class="col-lg-3">
            </div>
            <!-- mid and logo -->
            <div class="col-lg-6">
                <a href="{{route('index')}}" class="link">@include('layouts.logo.simple')</a>
            </div>
            <!-- right and author -->
            <div class="col-lg-3">
                — created by <cite title="athena"><a href="https://athena.group" class="link">athena</a></cite>
            </div>
        </div>
    </footer>
@endunless
