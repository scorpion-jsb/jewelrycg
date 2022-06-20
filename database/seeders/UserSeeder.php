<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $password = bcrypt('123123123');

        User::factory()->create([
            'name' => 'Micael',
            'email' => 'micael@test.com',
            'password' => $password
        ]);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => $password,
            'is_admin' => true
        ]);

        User::factory()->count(100)->create(['password' => $password]);
    }
}
