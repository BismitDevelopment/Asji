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
            'is_admin' => 1,
            'is_member' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        DB::table('profiles')->insert([
            'user_id' => 1,
            'first_name' => 'Admin',
            'last_name' => 'Asji',
            'profession' => 'Admin',
            'affiliation' => '-',
            'discipline' => '-',
            'education' => '-',
            'membership' => '-',
            'experience' => '-',
            'address' => '-',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Dummy Member 1',
            'email' => 'member1@asji.com',
            'email_verified_at' => now(),
            'password' => Hash::make('asji_member1@123'),
            'is_admin' => 0,
            'is_member' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('profiles')->insert([
            'user_id' => 2,
            'first_name' => 'Dummy',
            'last_name' => 'Member 1',
            'profession' => 'Developer',
            'affiliation' => '-',
            'discipline' => '-',
            'education' => 'Computer Science',
            'membership' => 'ASJI',
            'experience' => '-',
            'address' => '-',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Dummy Member 2',
            'email' => 'member2@asji.com',
            'email_verified_at' => now(),
            'password' => Hash::make('asji_member2@123'),
            'is_admin' => 0,
            'is_member' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('profiles')->insert([
            'user_id' => 3,
            'first_name' => 'Dummy',
            'last_name' => 'Member 2',
            'profession' => 'Lecturer',
            'affiliation' => '-',
            'discipline' => '-',
            'education' => 'Psychology',
            'membership' => 'ASJI',
            'experience' => '-',
            'address' => '-',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Dummy Guest 1',
            'email' => 'guest1@asji.com',
            'email_verified_at' => now(),
            'password' => Hash::make('asji_guest1@123'),
            'is_admin' => 0,
            'is_member' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('profiles')->insert([
            'user_id' => 4,
            'first_name' => 'Dummy',
            'last_name' => 'Guest 1',
            'profession' => 'Lecturer',
            'affiliation' => '-',
            'discipline' => '-',
            'education' => 'Psychology',
            'membership' => '-',
            'experience' => '-',
            'address' => '-',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Dummy Guest 2',
            'email' => 'guest2@asji.com',
            'email_verified_at' => now(),
            'password' => Hash::make('asji_guest2@123'),
            'is_admin' => 0,
            'is_member' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('profiles')->insert([
            'user_id' => 5,
            'first_name' => 'Dummy',
            'last_name' => 'Guest 2',
            'profession' => 'Racer',
            'affiliation' => '-',
            'discipline' => '-',
            'education' => '-',
            'membership' => '-',
            'experience' => '-',
            'address' => '-',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('events')->insert([
            'event_date' => now(),
            'event_name' => 'Event Test',
            'event_location' => 'Location 1',
            'event_description' => 'Description of event',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('public_lectures')->insert([
            'lecture_date' => now(),
            'title' => 'Public Lecture Test',
            'location' => 'PL Location 1',
            'description' => 'Description of public lecture',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('news')->insert([
            'news_title' => 'News Test',
            'news_body' => 'Description of news',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        DB::table('journals')->insert([
            'publish_date' => now(),
            'title' => 'Journal Test',
            'writer' => 'Writer 1, Writer 2',
            'description' => 'Description of journal',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);
    }
}
