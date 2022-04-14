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

function loopWithPaginate($loop, $items): float|int
{
    return $loop->iteration + (($items->currentPage() - 1) * $items->perPage());
}

function companyStatus(string $status): string
{
    return match ($status) {
        Company::STATUS_ACTIVE => 'منتشر شده',
        default => 'درحال بررسی'
    };
}

function commentType(string $type): string
{
    return match ($type) {
        Comment::type_employ => 'کارمند',
        Comment::type_interviewee => 'مصاحبه شونده',
        default => 'سایر',
    };
}

function commentStatus(string $status): string
{
    return match ($status) {
        Comment::STATUS_ACTIVE => 'منتشر شده',
        default => 'درحال بررسی'
    };
}

function price(int $price): string
{
    return number_format($price) . ' تومان';
}

function breadcrumb(array ...$items): array
{
    foreach ($items as $key => $item) {
        $breadcrumb['items'][$key] = [
            'title' => $item[0],
            'link' => $item[1] ?? null
        ];
    }
    return $breadcrumb ?? [];
}
