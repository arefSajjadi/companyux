@auth
    <li class="nav-item dropdown" dir="rtl">
        <a id="navbarDropdown" class="nav-link dropdown-toggle py-0 pe-0" href="#" role="button"
           data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://ui-avatars.com/api/?name={{auth()->user()->username}}"
                 width="35" height="35" alt="user_avatar" class="rounded-circle">
            <span>{{ auth()->user()->username }}</span>
        </a>

        <div class="dropdown-menu dropdown-menu-right text-end" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{route('profile.dashboard')}}">
                <i class="bi-person-circle"></i>
                حساب کاربری
            </a>
            <hr class="dropdown-divider">
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();document.getElementById('logout-form').submit()">
                <i class="bi bi-power"></i>
                خروج
            </a>
            @include('auth.logoutForm')
        </div>
    </li>
@else
    <a class="btn btn-outline-secondary btn-sm ms-2"
       href="{{route('login')}}">
        ورود به حساب کاربری
    </a>
@endauth
