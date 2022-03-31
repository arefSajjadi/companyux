<!-- Modal -->
<div class="modal fade" id="editComment{{$comment->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content" dir="rtl">
            <div class="modal-body  text-center">
                <form action="{{route('comments.update', [$comment->company->id, $comment->id])}}" method="post"
                      class="needs-validation" novalidate>
                    @csrf @method('PATCH')
                    <div class="row g-3">
                        <!-- display_name -->
                        <div class="col-12">
                            <div class="form-floating">
                                <input name="display_name" class="form-control" id="display_name"
                                       value="{{$comment->display_name}}" required>
                                <label for="display_name">نام شما جهت انتشار *</label>
                            </div>
                        </div>
                        <!-- requested_wage -->
                        <div class="col-12 col-lg-6">
                            <div class="form-floating">
                                <input name="requested_wage" id="price" type="text" class="form-control"
                                       value="{{number_format($comment->requested_wage)}}" required>
                                <label for="price">حقوق درخواستی ~ تومان *</label>
                            </div>
                        </div>
                        <!-- received_wage -->
                        <div class="col-12 col-lg-6">
                            <div class="form-floating">
                                <input name="received_wage" id="price" type="text" class="form-control"
                                       value="{{number_format($comment->received_wage)}}" required>
                                <label for="price">حقوق دریافتی (موافقت شده) ~ تومان *</label>
                            </div>
                        </div>
                        <!-- job -->
                        <div class="col-12 col-lg-6">
                            <div class="form-floating">
                                <select class="form-select" id="type" name="job_id" aria-label="job_id" required>
                                    @foreach($jobs as $job)
                                        <option value="{{$job->id}}" @if($job->id == $comment->job_id) selected @endif>
                                            {{$job->title}}
                                        </option>
                                    @endforeach
                                </select>
                                <label for="job_id">عنوان شغلی *</label>
                            </div>
                        </div>
                        <!-- type -->
                        <div class="col-12 col-lg-6">
                            <div class="form-floating">
                                <select class="form-select" id="type" name="type" required>
                                    @foreach(\App\Models\Comment::types as $type)
                                        <option value="{{$type}}" @if($type == $comment->type) selected @endif>
                                            {{commentType($type)}}
                                        </option>
                                    @endforeach
                                </select>
                                <label for="type">نوع همکاری *</label>
                            </div>
                        </div>
                        <!-- comment -->
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea name="comment" id="comment" type="text" class="form-control" required
                                          style="min-height: 200px">{!! $comment->comment ?? old('comment') !!}</textarea>
                                <label for="comment">تجربه خود را با این شرکت برای ما بنویسید *</label>
                            </div>
                        </div>
                        <!-- hire -->
                        <div class="form-group col-md-4">
                            <div class="form-check float-end">
                                <input class="form-check-input" type="checkbox" value="1"
                                       name="hire" {{ $comment->hire ? 'checked' : '' }} id="hire">
                                <label class="form-check-label" for="hire">استخدام شده ام</label>
                            </div>
                        </div>
                        <!-- submit -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-outline-secondary w-100">ویرایش نظر</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
