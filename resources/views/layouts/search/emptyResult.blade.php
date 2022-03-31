<div class="card-body">
    <div class="row alert h-100"
         style="color: #9700ff;background-color: #f8fafc5e;border-color: #a402ff;"
         dir="rtl">
        <div class="col-12 col-lg-4 d-flex">
            <div class="my-auto">
                <img src="{{asset('images/img.png')}}" alt="pergas"
                     class="w-100">
            </div>
        </div>
        <div class="col-12 col-lg-8 border-lg-end ">
            <div class="text-center">
                <h4 class="alert-heading border-bottom pb-1">ثبت شرکت</h4>
                <p class="lead text-muted mb-4" dir="rtl">
                    شرکتی با این عنوان یافت نشد میتوانید درخواست خود را برای ثبت این
                    شرکت به راحتی ثبت کنید
                </p>
            </div>
            <div class="row" dir="ltr">
                <div class="col-12 col-lg-6 offset-lg-3">
                    <div class="text-end shadow-sm rounded border p-3">
                        <p class="text-center border-bottom">
                            جهت ثبت درخواست بر روی دکمه زیر کلیک نمایید
                        </p>
                        <a href="{{route('companies.create')}}" type="button"
                           class="btn btn-secondary w-100">
                            درخواست افزودن شرکت
                        </a>
                    </div>
                </div>
            </div>
            <p class="bg-wait text-center my-4" dir="rtl">
                توجه داشته باشید که اطلاعات اولیه که از شما گرفته میشود بررسی میشود و
                درصورت تایید نهایت تا ۲۴ ساعت شرکت به پایگاه داده ما اضافه خواهد شد، ممنونیم که در
                توسعه این پلتفرم کمک میکنید
            </p>
        </div>
    </div>
</div>
