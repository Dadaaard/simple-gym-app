<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use App\Models\ScheduledClass;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ScheduledClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        ScheduledClass::factory()->count(5)->create();
    }
}
