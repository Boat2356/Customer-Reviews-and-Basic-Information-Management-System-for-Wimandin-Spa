<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            ['comment' => 'บรรยากาศร้านดีมากค่ะ พี่พนักงานและคุณหมอนวดน่ารัก บริการดีมากๆค่ะ', 
            'rating' => 5,'users_id' => 1]                                 
            ];
            foreach( $data as $item){
                $item['status'] = 1;
                DB::table('reviews')->insert($item);
            }
    }
}
