<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();

        $user->name = 'Eduardo Perez';
        $user->email = 'legna246.dav@gmail.com';
        $user->password = bcrypt('12345678');

        $user->save();
        $user->assignRole('Admin');

        User::factory(10)->create();
    }
}
