<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this ->call(userSeeder::class);
    }
}

class userSeeder extends Seeder
{
    public function run()
    {
        DB::table('users') ->insert([
             [ 'name' => 'LilyCollins','email' => 'lily@gmail.com','password' => bcrypt('giadat') ],
             [ 'name' => 'MarineCollinsCheung','email' => 'marine@gmail.com','password' => bcrypt('giadat') ],
             [ 'name' => 'HarperCollinsCheung','email' => 'harper@gmail.com','password' => bcrypt('giadat') ],
             [ 'name' => 'GracyCollinsCheung','email' => Str::random(3).'@gmail.com','password' => bcrypt('giadat') ]
        ]);
    }
}

