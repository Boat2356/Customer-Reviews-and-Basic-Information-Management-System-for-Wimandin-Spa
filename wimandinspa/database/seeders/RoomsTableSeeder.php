<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            ['name'=> 'Single Room','size' => '1 คน','description' => 'ห้องเดี่ยวออกแบบมาสำหรับลูกค้าที่ต้องการความเป็นส่วนตัวสูงสุด ภายในจะสร้างบรรยากาศแห่งความเงียบ ปลอดภัย และอบอุ่น เสมือนคุณกำลังพักผ่อนอยู่ที่บ้านอย่างเงียบสงบ ห่างไกลจากการจราจรและฝูงชน','image_url' => 'https://img.hotimg.com/room1.jpeg'],
            ['name'=> 'Couple Room','size' => '1-2 คน','description' => 'ห้องคู่ออกแบบมาสำหรับคู่รักหรือลูกค้าสำหรับมาไม่เกิน 2 ท่าน ภายในจะสร้างบรรยากาศแห่งความเงียบ ปลอดภัย และอบอุ่น','image_url' => 'https://img.hotimg.com/room2.jpeg'],
            ['name'=> 'Family Room','size' => '1-4 คน','description' => 'ห้องแบบครอบครัวออกแบบมาสำหรับครอบครัวหรือลูกค้าสำหรับมาเกิน 2 ท่าน ภายในจะสร้างบรรยากาศแห่งความเงียบ ปลอดภัย และอบอุ่น','image_url' => 'https://img.hotimg.com/room3.jpeg']
            ];
            foreach( $data as $item){
                #$item['status'] = rand(0,1);
                DB::table('rooms')->insert($item);
            }
    }
}
