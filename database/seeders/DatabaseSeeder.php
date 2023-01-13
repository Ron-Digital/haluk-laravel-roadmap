<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        DB::table('users')->insert([
            'name' => 'Haluk Yel',
            'email' => 'haluk@ron.digital',
            'password' => Hash::make('password')
        ]);

        DB::table('posts')->insert([
            'user_id' => '1',
            'title' => 'Günün Başlığı',
            'description' => 'Bugünün açıklamaları..'
        ]);

        DB::table('comments')->insert([
            'user_id' => '1',
            'post_id' => '1',
            'comment' => 'Bu güzel postun yorumu'
        ]);
    }
}
