@extends('layouts.app')

@section('content')
    <section class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <ul class="nav nav-tabs p-0" id="myTab" role="tablist" dir="rtl">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active authentication" id="login-tab" data-bs-toggle="tab"
                                data-bs-target="#login"
                                type="button" role="tab" aria-controls="login" aria-selected="true">ورود
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link authentication" id="register-tab" data-bs-toggle="tab"
                                data-bs-target="#register"
                                type="button" role="tab" aria-controls="register" aria-selected="false">ثبت نام
                        </button>
                    </li>
                </ul>
                <div class="card border-top-0 rounded-0">
                    <div class="card-body" dir="rtl">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane show active" id="login" role="tabpanel"
                                 aria-labelledby="login-tab">
                                <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <!-- username -->
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control @error('username') is-invalid @enderror"
                                               id="floatingEmailInput" placeholder=":)" required
                                               value="{{ old('username') }}" name="username"
                                               autocomplete="username">
                                        <label for="floatingEmailInput">{{ __('نام کاربری') }}</label>
                                        @error('username')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <!-- password -->
                                    <div class="form-floating mb-1">
                                        <input type="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               name="password" autocomplete="current-password"
                                               id="floatingPasswordInput"
                                               required placeholder="Password">
                                        <label for="floatingPasswordInput">رمزعبور</label>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <!-- rememberMe -->
                                    <div class="form-group row mt-3">
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input float-end" type="checkbox"
                                                       name="remember" {{ old('remember') ? 'checked' : '' }}
                                                       id="remember">
                                                <label class="form-check-label mx-4" for="remember">
                                                    مرا بخاطر بسپار
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- submit -->
                                    <div class="form-group row mt-4">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-secondary w-100">ورود</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <!-- username -->
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control @error('username') is-invalid @enderror"
                                               id="floatingUsernameInput" placeholder=":)" required
                                               value="{{ old('username') }}" name="username"
                                               autocomplete="username">
                                        <label for="floatingUsernameInput">نام کاربری</label>
                                        @error('username')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <!-- password -->
                                    <div class="form-floating mb-3">
                                        <input type="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               name="password" autocomplete="current-password"
                                               id="floatingPasswordInput"
                                               required placeholder="Password">
                                        <label for="floatingPasswordInput">رمزعبور</label>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <!-- password confirmation -->
                                    <div class="form-floating  mb-3">
                                        <input type="password"
                                               class="form-control @error('password_confirmation') is-invalid @enderror"
                                               name="password_confirmation" autocomplete="current-password"
                                               id="floatingPasswordConfirmationInput"
                                               required placeholder="Password">
                                        <label for="floatingPasswordConfirmationInput">تکرار رمزعبور</label>
                                        @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <!-- submit -->
                                    <div class="form-group row mt-4">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-secondary w-100">ثبت نام</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection
