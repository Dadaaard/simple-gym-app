<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::factory()->create(
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
            ]
        );

        User::factory()->create(
            [
                'name' => 'James',
                'email' => 'James@gmail.com',
            ]
        );

        User::factory()->create(
            [
                'name' => 'Mimi',
                'email' => 'mimi@gmail.com',
                'role' => 'instructor',
            ]
        );

        User::factory()->count(10)->create();
        User::factory()->count(10)->create(
            [
                'role' => 'instructor',
            ]
        );
    }
}
