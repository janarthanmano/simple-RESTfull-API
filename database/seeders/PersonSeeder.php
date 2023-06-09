<?php

namespace Database\Seeders;

use App\Models\Person as PersonModel;
use Faker\Provider\Person;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PersonModel::factory()->count(25)->create();
    }
}
