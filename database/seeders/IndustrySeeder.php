<?php

namespace Database\Seeders;

use App\Models\Industry;
use Illuminate\Database\Seeder;

class IndustrySeeder extends Seeder
{
    public function run(): void
    {
        Industry::query()->insert([
            ['created_at' => now(), 'updated_at' => now(), 'title' => 'تبلیغات، بازاریابی و برندسازی'],
            ['created_at' => now(), 'updated_at' => now(), 'title' => 'کامپیوتر، فناوری اطلاعات و اینترنت'],
            ['created_at' => now(), 'updated_at' => now(), 'title' => 'تولید و صنایع'],
            ['created_at' => now(), 'updated_at' => now(), 'title' => 'فروشگاهی'],
            ['created_at' => now(), 'updated_at' => now(), 'title' => 'استاندارد و کنترل کیفیت'],
            ['created_at' => now(), 'updated_at' => now(), 'title' => 'املاک و مستغلات'],
            ['created_at' => now(), 'updated_at' => now(), 'title' => 'معماری و عمران'],
            ['created_at' => now(), 'updated_at' => now(), 'title' => 'منابع انسانی'],
            ['created_at' => now(), 'updated_at' => now(), 'title' => 'رسانه و انتشارات'],
            ['created_at' => now(), 'updated_at' => now(), 'title' => 'آموزش، مدارس و دانشگاه ها'],
            ['created_at' => now(), 'updated_at' => now(), 'title' => 'خدمات درمانی، پزشکی و سلامت'],
            ['created_at' => now(), 'updated_at' => now(), 'title' => 'حمل و نقل، لاجستیک و انبارداری'],
            ['created_at' => now(), 'updated_at' => now(), 'title' => 'کالای مصرفی و خوراکی'],
            ['created_at' => now(), 'updated_at' => now(), 'title' => 'گردشگری و هتل ها'],
            ['created_at' => now(), 'updated_at' => now(), 'title' => 'واردات و صادرات'],
            ['created_at' => now(), 'updated_at' => now(), 'title' => 'مالی و اعتباری'],
            ['created_at' => now(), 'updated_at' => now(), 'title' => 'مخابرات و ارتباطات'],
            ['created_at' => now(), 'updated_at' => now(), 'title' => 'فرهنگی و ورزشی'],
            ['created_at' => now(), 'updated_at' => now(), 'title' => 'غذا و رستوران ها'],
            ['created_at' => now(), 'updated_at' => now(), 'title' => 'نفت و گاز'],
            ['created_at' => now(), 'updated_at' => now(), 'title' => 'دسته بندی نشده'],
            ['created_at' => now(), 'updated_at' => now(), 'title' => 'سازمان های مردم نهاد (NGO)'],
            ['created_at' => now(), 'updated_at' => now(), 'title' => 'سرمایه گذاری و تحلیل کسب وکار'],
            ['created_at' => now(), 'updated_at' => now(), 'title' => 'خودروسازی'],
            ['created_at' => now(), 'updated_at' => now(), 'title' => 'وکالت و حقوقی'],
            ['created_at' => now(), 'updated_at' => now(), 'title' => 'بیمه'],
            ['created_at' => now(), 'updated_at' => now(), 'title' => 'کشاورزی'],
            ['created_at' => now(), 'updated_at' => now(), 'title' => 'نیرو'],
            ['created_at' => now(), 'updated_at' => now(), 'title' => 'بانکی'],
            ['created_at' => now(), 'updated_at' => now(), 'title' => 'دولتی']
        ]);
    }
}
