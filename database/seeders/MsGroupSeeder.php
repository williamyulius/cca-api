<?php

namespace Database\Seeders;

use App\Models\MsGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MsGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=1;$i<=6;$i++){
            MsGroup::create([
                'name'=>'SD '.$i,
                'unit'=>'SD',
                'campus'=>'LAS',
                'semester'=>'1',
                'academic_year'=>'2025/2026',
            ]);
        }
    }
}
