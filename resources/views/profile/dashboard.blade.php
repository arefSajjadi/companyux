@extends('profile.index')

@section('card-header')
    <div class="card-header">
        <h5>
            <i class="bi bi-person-circle"></i>
           پروفایل
        </h5>
    </div>
@endsection

@section('card-body')
    <div class="card-body" dir="ltr">
        <blockquote class="blockquote mb-0">
            <p></p>
            <footer class="blockquote-footer">
                {{Illuminate\Foundation\Inspiring::quote()}}
            </footer>
        </blockquote>
    </div>
@endsection
