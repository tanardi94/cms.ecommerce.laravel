<?php

namespace Database\Seeders;

use App\Models\Region\Subdistrict;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubdistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subdistrict::unguard();

        $pathVillages = storage_path('subdistricts.sql');
        DB::unprepared(file_get_contents($pathVillages));
        $this->command->info('Subdistricts table seeded!');
    }
}
