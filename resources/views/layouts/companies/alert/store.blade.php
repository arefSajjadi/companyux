<div class="alert alert-success alert-dismissible fade show" role="alert">
    <a type="button" class="btn-close" data-bs-dismiss="alert"
       aria-label="Close"></a>
    <br>
    <h4 class="alert-heading">
        <i class="bi-check2-circle"></i>
        درخواست شما با موفقیت ثبت شد
    </h4>
    @if(is_array(session('company_store')))
        <hr>
        <ul>
            <li class="mb-1">
                تبریک، درخواست شما  جهت ثبت شرکت
                <span class="bg-wait">{{session('company_store')['title']}}</span>
                با موفقیت ثبت شد، ممنونیم که در توسعه این پلتفرم کمک میکنید.
            </li>
        </ul>
        <sub>توجه داشته باشید که این درخواست حداکثر تا ۴۸ ساعت آینده بررسی خواهد شد!</sub>
    @endif
</div>
