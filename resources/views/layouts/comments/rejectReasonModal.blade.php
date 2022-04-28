<!-- Modal -->
<div class="modal fade" id="reject-reason{{$comment->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content " dir="rtl">
            <div class="modal-header">
                دلیل رد درخواست
            </div>
            <div class="modal-body  text-center">
                <p class="alert alert-secondary mt-2">
                    {{$comment->reason}}
                </p>
            </div>
            <div class="modal-footer justify-content-between">
                <small class="bg-wait">
                    <i class="bi-info-circle"></i>
                    شما میتوانید با ویرایش اطلاعات تجربه خود مجدد درخواست ثبت را ارسال نمایید
                </small>
            </div>
        </div>
    </div>
</div>
