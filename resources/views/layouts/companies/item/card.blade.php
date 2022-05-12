<div class="card shadow-sm h-100" style="color: #9700ff; background-color: #f8fafc5e; border-color: #a402ff;">
    <div>
        <div class="card-body">
            <h5 class="card-title text-center text-truncate" dir="rtl">
                <a href="{{route('companies.show', [$company->id])}}" target="_blank"
                   class="link-primary">{{$company->name}}</a>
            </h5>
        </div>

        <div class="text-center">
            @include('layouts.companies.Indicators')
        </div>
    </div>
    <div class="mt-auto">
        <div class="card-body btn-group btn-group-sm w-100">
            <a class="card-link btn btn-outline-secondary"
               href="{{route('comments.create', $company->id)}}">ثبت تجربه</a>
            <a class="card-link btn btn-outline-secondary"
               href="{{route('companies.show', $company->id)}}" target="_blank">مشاهده</a>
        </div>
    </div>
</div>
