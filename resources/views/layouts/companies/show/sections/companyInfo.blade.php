<section class="container-fluid">
    <div class="card">
        <div class="row card-body" dir="rtl">
            <div class="col-xl-2 d-none d-sm-block" dir="ltr">
                <img src="{{$company->logo}}" class="d-block w-100" alt="{{$company->name}}">
            </div>
            <div class="col-xl-6 col-12 border-lg-end border-lg-start">
                <div class="text-center">
                    <h1 class="card-title">{{ $company->title }}</h1>
                    @include('layouts.companies.Indicators')
                </div>
            </div>
            <div class="col-xl-4 col-12">
                <div class="text-center">
                    <div class="alert"
                         style="color: #6c757d;background-color: #d5f9e11a;border-color: #d2f1d5;"
                         role="alert">
                        <h4 class="alert-heading">تجربه ای دارید؟</h4>
                        <p>
                            اگر شما با این شرکت تجربه همکاری یا مصاحبه و..
                            دارید میتوانید آنرا با دیگران به اشتراک بگذارید
                        </p>
                    </div>
                    <ul class="list-group list-group-flush px-0">
                        <li class="list-group-item">
                            <a href="{{route('comments.create', $company->id)}}"
                               class="btn btn-outline-secondary w-100">
                                ثبت تجربه یا نظر
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
