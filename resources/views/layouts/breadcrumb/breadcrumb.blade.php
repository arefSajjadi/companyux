<nav aria-label="breadcrumb" class="container-fluid py-3">
    <ol class="breadcrumb mb-0 " dir="rtl">
        <li class="breadcrumb-item"><a href="{{route('index')}}">خانه</a></li>
        @foreach($items as $item)
            @isset($item['title'])
                <li class="breadcrumb-item @if($loop->last) active @endif"
                    @if($loop->last)
                    aria-current="page"
                    @endif>
                    @isset($item['link'])
                        <a href="{{$item['link']}}">{{$item['title']}}</a>
                    @else
                        {{$item['title']}}
                    @endisset
                </li>
            @endisset
        @endforeach
    </ol>
</nav>
