<?php

namespace Database\Seeders;

use App\Models\VariantGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VariantGroup::create([
            'name' => 'Color',
        ]);
        VariantGroup::create([
            'name' => 'Size',
        ]);
    }
}
