<div class="card-body">
    <div class="row alert h-100"
         style="color: #9700ff;background-color: #f8fafc5e;border-color: #a402ff;"
         dir="rtl">
        <div class="col-lg-4 col-12 d-flex">
            <div class="my-auto">
                <img src="{{asset('images/img.png')}}" alt="pergas"
                     class="w-100">
            </div>
        </div>
        <div class="col-lg-8 col-12 border-lg-end ">
            <div class="text-center">
                <h4 class="alert-heading border-bottom pb-1">برای این شرکت هنوز تجربه ای ثبت نشده است</h4>
                <p class="lead text-muted mb-4" dir="rtl">
                    اگر شما به هرنوعی با این شرکت ارتباط داشته اید و میتوانید تجربه خود را برای دیگران به اشتراک بگذارید
                </p>
            </div>
            <div class="row" dir="ltr">
                <div class="col-12 col-lg-6 offset-lg-3">
                    <div class="text-end shadow-sm rounded border p-3">
                        <p class="text-center border-bottom">
                            جهت ثبت تجربه خود بر روی دکمه زیر کلیک نمایید
                        </p>
                        <a href="{{route('comments.create', $company->id)}}" type="button"
                           class="btn btn-secondary w-100">
                            ثبت تجربه یا نظر
                        </a>
                    </div>
                </div>
            </div>
            <p class="bg-wait text-center my-4" dir="rtl">
                توجه داشته باشید که اطلاعات اولیه که از شما گرفته میشود بررسی میشود و درصورت تایید، نهایت تا ۲۴ ساعت در
                کنار تجربه دیگران قرار میگیرد، ممنونیم که در توسعه این پلتفرم کمک میکنید!
            </p>
        </div>
    </div>
</div>
