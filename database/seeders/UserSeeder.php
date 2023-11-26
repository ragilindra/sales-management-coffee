<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create([
            'id' => '1',
            'name' => 'admin',
            'officer_id' => 'admin',
            'password' => bcrypt('admin'),
            'level' => 'owner'
        ]);
        
        User::create([
            'id' => '2',
            'name' => 'ragil',
            'officer_id' => 'barista',
            'password' => bcrypt('barista'),
            'level' => 'barista'
        ]);
    }
}
