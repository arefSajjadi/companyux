<!-- filters -->
<div class="card shadow-sm mb-3">
    <div class="card-header text-center">فیلتر ها</div>
    <div class="card-body" dir="rtl">
        <!-- industry filter -->
        <form action="{{url()->full()}}" method="get">
            @if(request()->exists('key'))
                <input title="search" class="invisible" name="key" value="{{request('key')}}" hidden>
            @endif
            <div class="form-floating">
                <select class="form-select" required id="brands" name="industry" onchange="this.form.submit()">
                    <option value=" ">انتخاب کنید</option>
                    @foreach($companies->unique('industry_id') as $company)
                        <option value="{{$company->industry->id}}"
                                @if(request('industry') == $company->industry->id) selected @endif>
                            {{$company->industry->title}}
                        </option>
                    @endforeach
                </select>
                <label for="brands">زمینه شغلی</label>
            </div>
        </form>
    </div>
</div>
