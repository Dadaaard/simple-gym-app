<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ScheduledClass>
 */
class ScheduledClassFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date_time' => Carbon::now()->addHours(rand(24, 120))->addMinutes(0)->seconds(0),
            'class_type_id' => rand(1, 4),
            'instructor_id' => rand(15, 24),
        ];
    }
}
