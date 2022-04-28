<section>
    <div>
        <p>
            <span class="bi-arrow-bar-left"></span>
            لیست تمامی درخواست های شما -
            <a href="{{route('companies.create')}}" class="btn btn-outline-secondary btn-sm">درخواست افزودن شرکت</a>
        </p>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-light table-bordered">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">نام</th>
                <th scope="col">برند</th>
                <th scope="col">تلقن</th>
                <th scope="col">وبسایت</th>
                <th scope="col">تعداد کارمندان</th>
                <th scope="col">سال تاسیس</th>
                <th scope="col">حوزه فعالیت</th>
                <th scope="col">تعداد نظرات</th>
                <th scope="col">وضعیت</th>
                <th scope="col">تنظیمات</th>
            </tr>
            </thead>
            <tbody>
            @foreach($companies as $company)
                <tr>
                    <th scope="row">{{loopWithPaginate($loop, $companies)}}</th>
                    <td>{{$company->name}}</td>
                    <td>{{$company->brand}}</td>
                    <td>{{$company->telephone}}</td>
                    <td>{{$company->url}}</td>
                    <td>{{$company->employees}}</td>
                    <td>{{$company->establishment_at}}</td>
                    <td>{{$company->industry->title}}</td>
                    <td>{{$company->activeComments()->count()}}</td>
                    <td>
                        @switch($company->status)
                            @case(\App\Models\Company::STATUS_ACTIVE) @php($textColor = 'text-success')
                            @break
                            @case(\App\Models\Company::STATUS_WAITING) @php($textColor = 'text-warning')
                            @break
                            @case(\App\Models\Company::STATUS_REJECT) @php($textColor = 'text-danger')
                            @break
                            @default @php($textColor = 'text-warning')
                        @endswitch
                        <span class="{{$textColor}}">
                            {{$company->fa_status}}
                        </span>
                    </td>
                    <td>
                        <div class="btn-group btn-group-sm" dir="ltr">
                            @if ($company->status !== \App\Models\Company::STATUS_ACTIVE and !empty($company->reason))
                                <a class="btn btn-outline-secondary" title="حذف" data-bs-toggle="modal"
                                   data-bs-target="#reject-reason{{$company->id}}" data-backdrop="false">
                                    <i class="bi-info-circle"></i>
                                </a>
                                @include('layouts.companies.rejectReasonModal')
                            @endif
                            <a class="btn btn-outline-secondary @if ($company->activeComments()->count()) disabled @endif"
                               title="حذف" data-bs-toggle="modal"
                               data-bs-target="#deleteCompany{{$company->id}}" data-backdrop="false">
                                <i class="bi-trash"></i>
                            </a>
                            @includeWhen($company and !$company->activeComments()->count(), 'layouts.companies.deleteCompaniesModal')
                            <a href="{{route('companies.show', $company->id)}}" class="btn btn-outline-secondary"
                               title="مشاهده">
                                <i class="bi-eye"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</section>
