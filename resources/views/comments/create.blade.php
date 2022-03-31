@extends('profile.index')

@section('card-header')
    <div class="card-header">
        <h5>
            <i class="bi bi-messenger"></i>
            ثبت تجربه
        </h5>
    </div>
@endsection

@section('card-body')
    <div class="card-body">
        <section>
            <form action="{{route('comments.store', $company->id)}}" class="needs-validation"
                  method="post" novalidate>
                @csrf
                <div class="row g-3">
                    <!-- display_name -->
                    <div class="col-12">
                        <div class="form-floating">
                            <input name="display_name" class="form-control" id="display_name"
                                   value="{{old('display_name')}}" required>
                            <label for="display_name">نام شما جهت انتشار *</label>
                        </div>
                    </div>
                    <!-- requested_wage -->
                    <div class="col-12 col-lg-6">
                        <div class="form-floating">
                            <input name="requested_wage" id="price" type="text" class="form-control"
                                   value="{{old('requested_wage')}}" required>
                            <label for="price">حقوق درخواستی ~ تومان *</label>
                        </div>
                    </div>
                    <!-- received_wage -->
                    <div class="col-12 col-lg-6">
                        <div class="form-floating">
                            <input name="received_wage" id="price" type="text" class="form-control"
                                   value="{{old('received_wage')}}" required>
                            <label for="price">حقوق دریافتی (موافقت شده) ~ تومان *</label>
                        </div>
                    </div>
                    <!-- job -->
                    <div class="col-12 col-lg-6">
                        <div class="form-floating">
                            <select class="form-select" id="type" name="job_id" aria-label="job_id" required>
                                @foreach($jobs as $job)
                                    <option value="{{$job->id}}" @if($job->id == 82) selected @endif>{{$job->title}}</option>
                                @endforeach
                            </select>
                            <label for="job_id">عنوان شغلی *</label>
                        </div>
                    </div>
                    <!-- type -->
                    <div class="col-12 col-lg-6">
                        <div class="form-floating">
                            <select class="form-select" id="type" name="type" aria-label="type"
                                    required>
                                @foreach(\App\Models\Comment::types as $type)
                                    <option value="{{$type}}">{{commentType($type)}}</option>
                                @endforeach
                            </select>
                            <label for="type">نوع همکاری *</label>
                        </div>
                    </div>
                    <!-- comment -->
                    <div class="col-12">
                        <div class="form-floating">
                                            <textarea name="comment" id="comment" type="text" class="form-control"
                                                      required
                                                      style="min-height: 200px">{{old('comment')}}</textarea>
                            <label for="comment">تجربه خود را با این شرکت برای ما بنویسید *</label>
                        </div>
                    </div>
                    <!-- hire -->
                    <div class="form-group col-md-4">
                        <div class="form-check float-end">
                            <input class="form-check-input" type="checkbox" value="1"
                                   name="hire" {{ old('hire') ? 'checked' : '' }} id="hire">
                            <label class="form-check-label" for="hire">استخدام شده ام</label>
                        </div>
                    </div>
                    <!-- submit -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-outline-secondary w-100">ثبت نظر</button>
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection

@section('scripts')
    @include('layouts.plugins.inputMaskScript')
    @include('layouts.plugins.validateScript')
@endsection
