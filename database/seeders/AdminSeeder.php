<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'fullname' => 'Administrator',
            'office_id' => 1,
            'username' => 'admin',
            'password' => bcrypt('password'),
            'email' => 'francisco12rosel@gmail.com',
        ]);
        User::create([
            'fullname' => 'Sherene Alvarez',
            'office_id' => 2,
            'username' => 'sherene',
            'password' => bcrypt('password'),
            'email' => 'sample@gmail.com',
        ]);
        User::create([
            'fullname' => 'John Ariel Fernandez',
            'office_id' => 2,
            'username' => 'john',
            'password' => bcrypt('password'),
            'email' => 'sample@gmail.com',
        ]);
        User::create([
            'fullname' => 'Zeus Cerbatos',
            'office_id' => 2,
            'username' => 'zeus',
            'password' => bcrypt('password'),
            'email' => 'sample@gmail.com',
        ]);
    }
}
