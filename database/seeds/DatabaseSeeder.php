<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'name' => 'Admin Asji',
            'email' => 'admin@asji.com',
            'email_verified_at' => now(),
            'password' => Hash::make('asji_admin@123'),
            'is_admin' => '1',
            'is_member' => '0',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'Dummy Member 1',
            'email' => 'member1@asji.com',
            'email_verified_at' => now(),
            'password' => Hash::make('asji_member1@123'),
            'is_admin' => '0',
            'is_member' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'Dummy Member 2',
            'email' => 'member2@asji.com',
            'email_verified_at' => now(),
            'password' => Hash::make('asji_member2@123'),
            'is_admin' => '0',
            'is_member' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'Dummy Guest 1',
            'email' => 'guest1@asji.com',
            'email_verified_at' => now(),
            'password' => Hash::make('asji_guest1@123'),
            'is_admin' => '0',
            'is_member' => '0',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'Dummy Guest 2',
            'email' => 'guest2@asji.com',
            'email_verified_at' => now(),
            'password' => Hash::make('asji_guest2@123'),
            'is_admin' => '0',
            'is_member' => '0',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
