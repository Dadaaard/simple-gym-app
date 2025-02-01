<?php

namespace Database\Seeders;

use App\Models\ClassType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ClassType::create(
            [
                'name' => 'Yoga',
                'description' => fake()->text(100),
                'minutes' => 60,
            ]
        );

        ClassType::create(
            [
                'name' => 'Boxing',
                'description' => fake()->text(100),
                'minutes' => 60,
            ]
        );

        ClassType::create(
            [
                'name' => 'Jogging',
                'description' => fake()->text(100),
                'minutes' => 60,
            ]
        );

        ClassType::create(
            [
                'name' => 'Dancing',
                'description' => fake()->text(100),
                'minutes' => 60,
            ]
        );

    }
}
