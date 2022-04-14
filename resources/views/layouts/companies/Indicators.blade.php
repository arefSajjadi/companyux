<ul class="list-group list-group-flush px-0" style="color: #6c757d!important;" dir="rtl">
    <li class="list-group-item">
        برند :
        {{$company->brand}}
    </li>
    @empty(!$company->establishment_at)
        <li class="list-group-item">
            سال تاسیس :
            {{$company->establishment_at}}
        </li>
    @endempty
    @empty(!$company->employees)
        <li class="list-group-item">
            تعداد کارمندان :
            {{$company->employees}}
        </li>
    @endempty
    @empty(!$company->url)
        <li class="list-group-item">
            وبسایت :
            <a href="{{$company->url}}" class="link" target="_blank">{{$company->url}}</a>
        </li>
    @endempty
    <li class="list-group-item">
        حوزه فعالیت :
        {{$company->industry->title}}
    </li>

    <li class="list-group-item">
        نظرات :
        {{$company->activeComments()->count()}}
    </li>
</ul>
