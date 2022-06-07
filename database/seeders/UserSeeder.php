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
        $password = bcrypt('12341234');

        User::factory()->create([
            'name' => 'Micael',
            'email' => 'micael@test.com',
            'password' => $password
        ]);

        User::factory()->count(100)->create(['password' => $password]);
    }
}
