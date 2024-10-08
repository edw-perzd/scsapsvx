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

        $user1 = new User();

        $user1->name = 'Carlos Hernandez';
        $user1->email = 'csanchezhernandez567@gmail.com';
        $user1->password = bcrypt('12345678');

        $user1->save();
        $user1->assignRole('Admin');

        User::factory(4)->create();
    }
}
