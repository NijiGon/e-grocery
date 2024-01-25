<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $faker = fake('id_ID');

        DB::table('roles')->insert([
            'name' => 'Admin',
        ]);
        DB::table('roles')->insert([
            'name' => 'User',
        ]);
        DB::table('genders')->insert([
            'desc' => 'Male',
        ]);
        DB::table('genders')->insert([
            'desc' => 'Female',
        ]);
        for ($i=0; $i < 100; $i++) {
            DB::table('items')->insert([
                'name' => $faker->name,
                'desc' => $faker->text(500),
                'price' => $faker->numberBetween(1000, 1000000),
            ]);
        }
        DB::table('users')->insert([
            'first_name' => 'test',
            'last_name' => 'test',
            'email' => 'test@admin.com',
            'display_picture' => 'pp.jpg',
            'password' => bcrypt('test1234'),
            'gender_id' => rand(1, 2),
            'role_id' => 1,
        ]);
        DB::table('users')->insert([
            'first_name' => 'test',
            'last_name' => 'test',
            'email' => 'test@gmail.com',
            'display_picture' => 'pp.jpg',
            'password' => bcrypt('test1234'),
            'gender_id' => rand(1, 2),
            'role_id' => 2,
        ]);
    }
}
