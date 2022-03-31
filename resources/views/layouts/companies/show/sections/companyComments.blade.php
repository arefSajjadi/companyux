<section class="container-fluid mt-5 min-vh-90" style="margin-bottom: 250px">
    <div class="card">
        <div class="card-body">
            <div class="row">
                @forelse($company->activeComments as $comment)
                    <div class="col-12">
                        <div class="card-body @unless($loop->last) border-bottom @endunless">
                            <div class="alert h-100"
                                 style="color: #9700ff;background-color: #f8fafc5e;border-color: #a402ff;" dir="rtl">
                                <div class="row text-end">
                                    <div class="col-lg-10 col-12 border-start">
                                        <h4 class="alert-heading border-bottom pb-1">
                                            {{$comment->display_name}}
                                            @if(auth()->check() and auth()->user()->id === $comment->user_id)
                                                -
                                                <a href="{{route('comments.index')}}"
                                                   class="btn btn-outline-secondary btn-sm">
                                                    ویرایش
                                                </a>
                                            @endif
                                        </h4>
                                        <p class="lead text-muted mb-4" dir="rtl">{!! $comment->comment !!}</p>
                                    </div>
                                    <div class="col-lg-2 col-12">
                                        <ul class="list-group px-0 rounded">
                                            <li class="list-group-item list-group-item-secondary">
                                                تاریخ ثبت :
                                                <span dir="ltr">{{convert_date($comment->created_at, true)}}</span>
                                            </li>
                                            <li class="list-group-item list-group-item-secondary">
                                                عنوان شغلی :
                                                {{$comment->job->title}}
                                            </li>
                                            <li class="list-group-item list-group-item-secondary">
                                                نوع همکاری :
                                                {{$comment->fa_type}}
                                            </li>
                                            <li class="list-group-item list-group-item-secondary">
                                                حقوق درخواستی :
                                                {{price($comment->requested_wage)}}
                                            </li>
                                            <li class="list-group-item list-group-item-secondary">
                                                حقوق دریافتی :
                                                {{price($comment->received_wage)}}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    @include('layouts.companies.show.sections.emptyComments')
                @endforelse
            </div>
        </div>
    </div>
</section>
