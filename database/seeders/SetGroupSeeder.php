<?php

namespace Database\Seeders;

use App\Models\SetGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SetGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SetGroup::create([
            'ms_group_id'=>'1',
            'group'=>'1',
            'unit'=>'SD',
            'campus'=>'LAS',
            'semester'=>'1',
            'academic_year'=>'2025/2026',
        ]);
        SetGroup::create([
            'ms_group_id'=>'2',
            'group'=>'2',
            'unit'=>'SD',
            'campus'=>'LAS',
            'semester'=>'1',
            'academic_year'=>'2025/2026',
        ]);
        SetGroup::create([
            'ms_group_id'=>'3',
            'group'=>'3',
            'unit'=>'SD',
            'campus'=>'LAS',
            'semester'=>'1',
            'academic_year'=>'2025/2026',
        ]);
        SetGroup::create([
            'ms_group_id'=>'4',
            'group'=>'4',
            'unit'=>'SD',
            'campus'=>'LAS',
            'semester'=>'1',
            'academic_year'=>'2025/2026',
        ]);
        SetGroup::create([
            'ms_group_id'=>'5',
            'group'=>'5',
            'unit'=>'SD',
            'campus'=>'LAS',
            'semester'=>'1',
            'academic_year'=>'2025/2026',
        ]);
        SetGroup::create([
            'ms_group_id'=>'6',
            'group'=>'6',
            'unit'=>'SD',
            'campus'=>'LAS',
            'semester'=>'1',
            'academic_year'=>'2025/2026',
        ]);
    }
}
