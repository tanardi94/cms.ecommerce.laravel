<?php

namespace Database\Seeders;

use App\Models\Region\District;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        District::unguard();

        $pathDistrict = storage_path('districts.sql');
        DB::unprepared(file_get_contents($pathDistrict));
        $this->command->info('Districts table seeded!');
    }
}
