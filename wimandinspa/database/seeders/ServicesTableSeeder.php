<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            ['name' => 'นวดไทยสปา(ทั้งตัว)', 'description' => 'นวดไทยสปา(ทั้งตัว) เหมาะสำหรับคนที่ต้องการผ่อนคลายร่างกาย และให้ความผ่อนคลายในร่างกาย',
            'price' => 700,'duration' => '2 ชม.','image_url' => 'https://www.tria.co.th/upload/shutterstock_22449090911.jpg','service_type_id'=>1],
            ['name' => 'อบสมุนไพร & นวดไทยพรีเมี่ยม', 'description' => 'อบสมุนไพร & นวดไทยพรีเมี่ยม เหมาะสำหรับคนที่ต้องการผ่อนคลายร่างกายแบบครบทุกส่วนแบบพรีเมียม และให้ความผ่อนคลายในร่างกาย',
            'price' => 850,'duration' => '2 ชม.','image_url' => 'https://img.kapook.com/u/patcharin/Health/Spa/spa1.jpg','service_type_id'=>2],
            ['name' => 'สปาพอกผิวกาย', 'description' => 'สปาพอกผิวกาย เหมาะสำหรับคนที่ต้องการผ่อนคลายร่างกาย และให้ความผ่อนคลายในร่างกาย',
            'price' => 300,'duration' => '30 นาที','image_url' => 'https://img.freepik.com/free-photo/young-attractive-woman-having-massage-relaxing-spa-salon_176420-7572.jpg','service_type_id'=>3],
            ['name' => 'นวดเท้า & นวดอโรม่า', 'description' => 'นวดเท้า & นวดอโรม่า เหมาะสำหรับคนที่ต้องการผ่อนคลายเท้า และให้ความผ่อนคลายในร่างกาย',
            'price' => 990,'duration' => '2 ชม.','image_url' => 'https://thaihandmassage.com/blogs/wp-content/uploads/2020/07/physiotherapy-2133286_1280.jpg','service_type_id'=>4],
            ['name' => 'สปาหน้าวิมานดิน', 'description' => 'สปาหน้าวิมานดิน เหมาะสำหรับคนที่ต้องการผ่อนคลายผิวหน้า และให้ความผ่อนคลายในจากความเครียด',
            'price' => 800,'duration' => '70 นาที.','image_url' => 'https://img.freepik.com/free-photo/beautician-with-brush-applies-white-moisturizing-mask-face-young-girl-client-spa-beauty-salon_343596-4246.jpg','service_type_id'=>5]                    
            ];
            foreach( $data as $item){
                $item['status'] = 1;
                DB::table('services')->insert($item);
            }

    }
}
