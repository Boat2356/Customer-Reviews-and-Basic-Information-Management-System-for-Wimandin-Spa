<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User
        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user1234'),
            'phone' => '066-666-6666',            
            'user_type' => '0'
        ]);

        // Admin
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin1234'),
            'phone' => '099-999-9999',
            'user_type' => '1'
        ]);


        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
       /* \App\Models\User::factory()->create([
            'name' => 'Chonlaphat',
            'email' => 'chonlaphat290646@gmail.com',
            'password' => Hash::make('boat290646'),
            ]);
            */

        $this->call([
            PostTypesTableSeeder::class,
            PostTableSeeder::class,
            ServiceTypesTableSeeder::class,
            ServicesTableSeeder::class,
            ContactsTableSeeder::class,
            FaqsTableSeeder::class,
            ReviewsTableSeeder::class,
            RoomsTableSeeder::class
            ]);
        
    }
}
