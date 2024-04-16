<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            ['address' => 'เลขที่ 892 หมู่ 12 หมู่บ้าน - ซอย - ถนน มข-บ้านวัดป่าโนนม่วง อำเภอเมืองขอนแก่น ขอนแก่น 40000', 
            'phone' => '086-346-0587', 'email' => 'mthaimassage@hotmail.com', 'facebook' => 'วิมานดิน สปาขอนแก่น', 'line' => 'wimandinkku','openTime' => 'จันทร์ - อาทิตย์ 10:00 น. - 20:00 น.']                              
            ];
            foreach( $data as $item){
                $item['status'] = 1;
                DB::table('contacts')->insert($item);
            }
    }
}
