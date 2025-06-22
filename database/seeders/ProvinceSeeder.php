<?php

namespace Database\Seeders;

use App\Models\Region\Province;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Province::unguard();

        $pathProvince = storage_path('provinces.sql');
        DB::unprepared(file_get_contents($pathProvince));
        $this->command->info('Provinces table seeded!');
    }
}
