<!-- Modal -->
<div class="modal fade" id="reject-reason{{$company->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content " dir="rtl">
            <div class="modal-header">
                دلیل رد درخواست
            </div>
            <div class="modal-body  text-center">
                <p class="alert alert-secondary mt-2">
                    {{$company->reason}}
                </p>
            </div>
            <div class="modal-footer justify-content-between">
                <small class="bg-wait">
                    <i class="bi-info-circle"></i>
                    شما با حذف درخواست خود و بازنگری اطلاعات شرکت مورد نظر
                    میتوانید درخواست خود را مجددا ثبت نمایید.
                </small>
            </div>
        </div>
    </div>
</div>
