<div class="account-nav flex-grow-1">
    <h4 class="account-nav__title">حساب کاربری</h4>
    <ul>
        <li class="account-nav__item {{isActiveRoute('profile*', 'account-nav__item--active')}}">
            <a href="{{route('profile.dashboard')}}" class="link">
                <i class="bi bi-person-circle"></i>
                پروفایل
            </a>
        </li>
        <li class="account-nav__item {{isActiveRoute('companies*', 'account-nav__item--active')}}">
            <a href="{{route('companies.myCompanies')}}" class="link">
                <i class="bi bi-building"></i>
                شرکت ها
            </a>
        </li>
        <li class="account-nav__item {{isActiveRoute('comments*', 'account-nav__item--active')}}">
            <a href="{{route('comments.index')}}" class="link">
                <i class="bi bi-messenger"></i>
                تجربه ها
            </a>
        </li>
        <li class="account-nav__item">
            <a class="link" href="{{ route('logout') }}"
               onclick="event.preventDefault();document.getElementById('logout-form').submit()">
                <i class="bi bi-power"></i>
                خروج
            </a>
            @include('auth.logoutForm')
        </li>
    </ul>
</div>
