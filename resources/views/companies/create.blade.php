@extends('profile.index')

@section('card-header')
    <div class="card-header">
        <h5>
            <i class="bi bi-building"></i>
            درخواست افزودن شرکت
        </h5>
    </div>
@endsection

@section('card-body')
    <div class="card-body">
        <section>
            <form action="{{route('companies.store')}}" class="needs-validation" method="post" novalidate>
                @csrf
                <div class="row g-3">
                    <!-- name -->
                    <div class="col-12 col-lg-6">
                        <div class="form-floating">
                            <input name="name" class="form-control" id="name" value="{{old('name')}}" required>
                            <label for="name">نام رسمی شرکت *</label>
                        </div>
                    </div>
                    <!-- brand -->
                    <div class="col-12 col-lg-6">
                        <div class="form-floating">
                            <input name="brand" class="form-control" id="brand" value="{{old('brand')}}" required>
                            <label for="brand">نام برند شرکت *</label>
                        </div>
                    </div>
                    <!-- telephone -->
                    <div class="col-12 col-lg-6">
                        <div class="form-floating">
                            <input name="telephone" type="number" class="form-control" id="telephone"
                                   value="{{old('telephone')}}">
                            <label for="telephone">شماره تماس</label>
                        </div>
                        <sub>
                            مثال :
                            <span dir="ltr">021xxxxx</span>
                        </sub>
                    </div>
                    <!-- url -->
                    <div class="col-12 col-lg-6">
                        <div class="form-floating">
                            <input name="url" type="text" class="form-control" id="url" value="{{old('url')}}">
                            <label for="url">آدرس وبسایت</label>
                        </div>
                        <sub>مثال : companyux.com</sub>
                    </div>
                    <!-- employees -->
                    <div class="col-12 col-lg-6">
                        <div class="form-floating">
                            <input name="employees" type="number" class="form-control" id="employees"
                                   value="{{old('employees')}}">
                            <label for="employees">تعداد کارمندان</label>
                        </div>
                    </div>
                    <!-- establishment_at -->
                    <div class="col-12 col-lg-6">
                        <div class="form-floating">
                            <input name="establishment_at" type="number" class="form-control" id="establishment_at"
                                   value="{{old('establishment_at')}}">
                            <label for="establishment_at">سال تاسیس</label>
                        </div>
                        <sub>مثال : 1378</sub>
                    </div>
                    <!-- industry_id -->
                    <div class="col-12">
                        <div class="form-floating">
                            <select class="form-select" id="industry_id" name="industry_id" aria-label="industry_id"
                                    required>
                                @foreach($industries as $industry)
                                    <option value="{{$industry->id}}" selected>{{$industry->title}}</option>
                                @endforeach
                            </select>
                            <label for="industry_id">انتخاب زمینه شغلی</label>
                        </div>
                    </div>
                    <!-- submit -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-outline-secondary w-100">ثبت درخواست</button>
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection

@section('scripts')
    @include('layouts.plugins.validateScript')
@endsection
