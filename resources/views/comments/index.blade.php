@extends('profile.index')

@section('card-header')
    <div class="card-header">
        <h5>
            <i class="bi bi-messenger"></i>
            لیست تجربه های ثبت شده شما
        </h5>
    </div>
@endsection

@section('card-body')
    <div class="card-body">
        @includeWhen(session('comment_store'),'layouts.comments.alert.store')
        @includeWhen(session('comment_update'),'layouts.comments.alert.update')
        @includeWhen(session('comment_destroy'),'layouts.comments.alert.destroy')

        @includeWhen($comments->isEmpty(), 'layouts.comments.empty')

        @includeWhen($comments->isNotEmpty(),'layouts.comments.commentsTable')
    </div>
@endsection

@section('card-footer')
    @if($comments->total() > $comments->perPage())
        <div class="card-footer">
            {{$comments->links()}}
        </div>
    @endif
@endsection

@section('scripts')
    @include('layouts.plugins.inputMaskScript')
    @include('layouts.plugins.validateScript')
@endsection
