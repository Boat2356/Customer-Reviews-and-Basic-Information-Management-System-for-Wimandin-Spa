<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [            
            ['name'=> 'รายการนวดผ่อนคลาย'],
            ['name'=> 'รายการมิกซ์อบสมุนไพร'],
            ['name'=> 'รายการปรนนิบัติผิว'],            
            ['name'=> 'มิกซ์แอนด์แมซ์รายการนวดและปรนนิบัติผิว'],
            ['name'=> 'รายการมินิทรีตเมนต์']                 
            ];
            DB::table('service_types')->insert($data);
    }
}
