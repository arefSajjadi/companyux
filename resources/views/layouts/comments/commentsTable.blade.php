<section>
    <div>
        <p>
            <span class="bi-arrow-bar-left"></span>
            لیست تمامی تجربه های شما
        </p>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-light table-bordered">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">شرکت</th>
                <th scope="col">نام نمایشی</th>
                <th scope="col">حقوق درخواستی</th>
                <th scope="col">حقوق دریافتی</th>
                <th scope="col">عنوان شغلی</th>
                <th scope="col">نوع همکاری</th>
                <th scope="col">استخدام شده اید؟</th>
                <th scope="col">نظر</th>
                <th scope="col">وضعیت</th>
                <th scope="col">تاریخ ثبت</th>
                <th scope="col">تنظیمات</th>
            </tr>
            </thead>
            <tbody>
            @foreach($comments as $comment)
                <tr>
                    <th scope="row">{{loopWithPaginate($loop, $comments)}}</th>
                    <td><a href="{{route('companies.show', $comment->company->id)}}">{{$comment->company->name}}</a></td>
                    <td>{{$comment->display_name}}</td>
                    <td>{{number_format($comment->requested_wage)}}</td>
                    <td>{{number_format($comment->received_wage)}}</td>
                    <td>{{$comment->job->title}}</td>
                    <td>{{$comment->fa_type}}</td>
                    <td>{{$comment->fa_hire}}</td>
                    <td>{!! substr($comment->comment, 0, 130) . ' ...' !!}</td>
                    <td>
                        @switch($comment->status)
                            @case(\App\Models\Comment::STATUS_ACTIVE) @php($textColor = 'text-success')
                            @break
                            @case(\App\Models\Comment::STATUS_WAITING) @php($textColor = 'text-warning')
                            @break
                            @case(\App\Models\Comment::STATUS_REJECT) @php($textColor = 'text-danger')
                            @break
                            @default @php($textColor = 'text-warning')
                        @endswitch
                        <span class="{{$textColor}}">
                            {{$comment->fa_status}}
                        </span>
                    </td>
                    <td>{{convert_date($comment->created_at, true)}}</td>
                    <td>
                        <div class="btn-group btn-group-sm" dir="ltr">
                            @if ($comment->status !== \App\Models\Comment::STATUS_ACTIVE and !empty($comment->reason))
                                <a class="btn btn-outline-secondary" title="حذف" data-bs-toggle="modal"
                                   data-bs-target="#reject-reason{{$comment->id}}" data-backdrop="false">
                                    <i class="bi-info-circle"></i>
                                </a>
                                @include('layouts.comments.rejectReasonModal')
                            @endif
                            <a class="btn btn-outline-secondary" title="حذف" data-bs-toggle="modal"
                               data-bs-target="#deleteComment{{$comment->id}}" data-backdrop="false">
                                <i class="bi-trash"></i>
                            </a>
                            @includeWhen($comment, 'layouts.comments.deleteCommentsModal')
                            <a class="btn btn-outline-secondary" title="مشاهده" data-bs-toggle="modal"
                               data-bs-target="#editComment{{$comment->id}}" data-backdrop="false">
                                <i class="bi-pencil"></i>
                            </a>
                            @includeWhen($comment, 'comments.editCommentsModal')
                            <a href="{{route('companies.show', $comment->company->id)}}" class="btn btn-outline-secondary"
                               title="نمایش">
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
