@extends('layouts.app')

@section('content')
    <section class="container py-5">
        <div class="col-lg-6 offset-lg-3 text-center">
            <h1 id="Slogan">یک شرکت و چند تجربه</h1>
            <form action="{{route('search.result')}}" method="get">
                <div class="input-group mt-3">
                    <button class="btn btn-outline-secondary" id="search">
                        <i class="bi bi-search"></i>
                    </button>
                    <input title="search" placeholder="نام شرکتی که میخواهید در مورد آن بدانید را بنویسید"
                           class="form-control" id="search" name="key" aria-describedby="search" dir="rtl" autofocus>
                </div>
            </form>
        </div>
    </section>
@endsection
