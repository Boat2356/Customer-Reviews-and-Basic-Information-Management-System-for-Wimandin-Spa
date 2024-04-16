<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaqsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            ['question' => 'เวลาเปิด-ปิดของร้านคือช่วงไหน', 
            'answer' => 'เวลาเปิด-ปิดของร้านคือ 10:00-20:00 น. ของทุกวัน ยกเว้นวันหยุดราชการ'],
            ['question' => 'ร้านมีบริการจองล่วงหน้าหรือไม่', 
            'answer' => 'สามารถจองล่วงหน้าได้ไม่เกิน 1 เดือน โดยสามารถติดต่อผ่านทางโทรศัพท์หรือทางเฟสบุ๊คได้เลยค่ะ']                      
            ];
            foreach( $data as $item){
                $item['status'] = 1;
                DB::table('faqs')->insert($item);
            }

    }
}
