<?php

namespace Database\Seeders;

use App\Models\Region\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::unguard();

        $pathCities = storage_path('cities.sql');
        DB::unprepared(file_get_contents($pathCities));
        $this->command->info('Cities table seeded!');
    }
}
