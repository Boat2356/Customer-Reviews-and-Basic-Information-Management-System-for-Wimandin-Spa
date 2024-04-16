<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PostTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [            
            ['name'=> 'News'],
            ['name'=> 'Promotion'],
            ['name'=> 'Article']           
            ];
            DB::table('post_types')->insert($data);
    }
}
