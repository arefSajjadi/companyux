<?php

use App\Models\Comment;
use App\Models\Company;

function convert_date($date, $timeLess = false)
{
    if ($timeLess)
        return \Morilog\Jalali\CalendarUtils::strftime('Y/m/d', strtotime($date));
    else
        return \Morilog\Jalali\CalendarUtils::strftime('Y/m/d H:m:s', strtotime($date));
}

function isActiveRoute($routeName, $output = 'active')
{
    if (request()->route()->named($routeName))
        return $output;
    return null;
}

function loopWithPaginate($loop, $items)
{
    return $loop->iteration + (($items->currentPage() - 1) * $items->perPage());
}

function companyStatus(string $status)
{
    return match ($status) {
        Company::STATUS_ACTIVE => 'منتشر شده',
        default => 'درحال بررسی'
    };
}

function commentType(string $type)
{
    return match ($type) {
        Comment::type_employ => 'کارمند',
        Comment::type_interviewee => 'مصاحبه شونده',
        default => 'سایر',
    };
}

function commentStatus(string $status)
{
    return match ($status) {
        Comment::STATUS_ACTIVE => 'منتشر شده',
        default => 'درحال بررسی'
    };
}

function price(int $price)
{
    return number_format($price) . ' تومان';
}
