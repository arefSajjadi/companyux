<!-- Modal -->
<div class="modal fade" id="deleteCompany{{$company->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content" dir="rtl">
            <div class="modal-body  text-center">
                <p>
                    حذف این شرکت بصورت
                    <span class="bg-wait">دائمی</span>
                    میباشد.
                    <br>
                    آیا از اینکار اطمینان دارید؟
                </p>
            </div>
            <div class="modal-footer justify-content-between">
                <form action="{{route('companies.destroy', $company->id)}}"
                      method="post">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-secondary btn-sm">
                        <i class="fa fa-warning"></i>
                        حذف
                    </button>
                    <button type="reset" class="btn btn-default btn-sm" data-bs-dismiss="modal">لغو</button>
                </form>
            </div>
        </div>
    </div>
</div>
