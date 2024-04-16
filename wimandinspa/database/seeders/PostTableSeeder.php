<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            ['title' => 'โปรโมชันหน้าร้อนมาแรง แซงทางโค้ง', 'content' => 
            'พลาดไม่ได้กับโปรโมชันหน้าร้อน ช่วงเมษายนนี้ ทุกบริการนวดลดสูงสุด 30%', 'post_type_id' => 2, 'image_url' => 
            'https://img.freepik.com/free-photo/young-beautiful-woman-getting-hot-stone-spa-treatment_1150-3088.jpg'],
            ['title' => 'เรื่องน่ารู้เกี่ยวกับการนวดแผนไทย', 'content' => 
            'นวดไทย การนวดแผนไทย หรือ การนวดแผนโบราณ เป็นการนวดชนิดหนึ่งในแบบไทย ซึ่งเป็นศาสตร์บำบัดและรักษาโรคแขนงหนึ่งของการแพทย์แผนไทย 
            โดยจะเน้นในลักษณะการกด การคลึง การบีบ การดัด การดึง และการอบ ประคบ ซึ่งรู้จักกันโดยทั่วไปในชื่อ นวดแผนโบราณ', 'post_type_id' => 3, 'image_url' => 
            'https://img.freepik.com/free-photo/spa-massage-shoulder-young-beautiful-woman-beauty-salon_186202-1916.jpg'],
            ['title' => 'ข่าวสารเปิดตัวบริการสปาใหม่', 'content' => 
            'สปาแผนอนาคต ใช้เวลานวดแค่ 1-2 ชั่วโมงเท่านั้น ราคาย่อมเยาว์แค่ 300 บาทต่อท่านเท่านั้น ', 'post_type_id' => 1, 'image_url' => 
            'https://img.freepik.com/free-photo/beauty-care-with-electric-device_1098-21975.jpg']                     
            ];
            foreach( $data as $item){
                $item['status'] = 1;
                DB::table('post')->insert($item);
            }
                       
            
    }
}
