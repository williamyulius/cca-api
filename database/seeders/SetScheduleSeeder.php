<?php

namespace Database\Seeders;

use App\Models\SetSchedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SetScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SetSchedule::create([
            'ms_group_id'=>'1',
            'enrollment_start_date'=>'2025-07-27 00:00:00',
            'enrollment_end_date'=>'2025-08-31 00:00:00',
            'semester'=>'1',
            'academic_year'=>'2025/2026',
            'status'=>'1',
            'unit'=>'SD',
            'campus'=>'LAS',
        ]);
        SetSchedule::create([
            'ms_group_id'=>'2',
            'enrollment_start_date'=>'2025-07-27 00:00:00',
            'enrollment_end_date'=>'2025-08-31 00:00:00',
            'semester'=>'1',
            'academic_year'=>'2025/2026',
            'status'=>'1',
            'unit'=>'SD',
            'campus'=>'LAS',
        ]);
        SetSchedule::create([
            'ms_group_id'=>'3',
            'enrollment_start_date'=>'2025-07-27 00:00:00',
            'enrollment_end_date'=>'2025-08-31 00:00:00',
            'semester'=>'1',
            'academic_year'=>'2025/2026',
            'status'=>'1',
            'unit'=>'SD',
            'campus'=>'LAS',
        ]);
        SetSchedule::create([
            'ms_group_id'=>'4',
            'enrollment_start_date'=>'2025-07-27 00:00:00',
            'enrollment_end_date'=>'2025-08-31 00:00:00',
            'semester'=>'1',
            'academic_year'=>'2025/2026',
            'status'=>'1',
            'unit'=>'SD',
            'campus'=>'LAS',
        ]);
        SetSchedule::create([
            'ms_group_id'=>'5',
            'enrollment_start_date'=>'2025-07-27 00:00:00',
            'enrollment_end_date'=>'2025-08-31 00:00:00',
            'semester'=>'1',
            'academic_year'=>'2025/2026',
            'status'=>'1',
            'unit'=>'SD',
            'campus'=>'LAS',
        ]);
        SetSchedule::create([
            'ms_group_id'=>'6',
            'enrollment_start_date'=>'2025-07-27 00:00:00',
            'enrollment_end_date'=>'2025-08-31 00:00:00',
            'semester'=>'1',
            'academic_year'=>'2025/2026',
            'status'=>'1',
            'unit'=>'SD',
            'campus'=>'LAS',
        ]);
    }
}
