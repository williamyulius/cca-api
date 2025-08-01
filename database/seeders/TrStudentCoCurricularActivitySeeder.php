<?php

namespace Database\Seeders;

use App\Models\TrStudentCoCurricularActivity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrStudentCoCurricularActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TrStudentCoCurricularActivity::create([
            'ms_subject_co_curricular_activity_id'=>'13',
            'ms_student_id'=>'1',
            'ms_class_id'=>'1',
            'ms_group_id'=>'1',
            'semester'=>'1',
            'academic_year'=>'2025/2026',
            'unit'=>'SD',
            'campus'=>'LAS',
        ]);
        TrStudentCoCurricularActivity::create([
            'ms_subject_co_curricular_activity_id'=>'4',
            'ms_student_id'=>'3',
            'ms_class_id'=>'18',
            'ms_group_id'=>'3',
            'semester'=>'1',
            'academic_year'=>'2025/2026',
            'unit'=>'SD',
            'campus'=>'LAS',
        ]);
        TrStudentCoCurricularActivity::create([
            'ms_subject_co_curricular_activity_id'=>'6',
            'ms_student_id'=>'6',
            'ms_class_id'=>'19',
            'ms_group_id'=>'4',
            'semester'=>'1',
            'academic_year'=>'2025/2026',
            'unit'=>'SD',
            'campus'=>'LAS',
        ]);
        TrStudentCoCurricularActivity::create([
            'ms_subject_co_curricular_activity_id'=>'2',
            'ms_student_id'=>'2',
            'ms_class_id'=>'36',
            'ms_group_id'=>'6',
            'semester'=>'1',
            'academic_year'=>'2025/2026',
            'unit'=>'SD',
            'campus'=>'LAS',
        ]);
        TrStudentCoCurricularActivity::create([
            'ms_subject_co_curricular_activity_id'=>'13',
            'ms_student_id'=>'4',
            'ms_class_id'=>'17',
            'ms_group_id'=>'3',
            'semester'=>'1',
            'academic_year'=>'2025/2026',
            'unit'=>'SD',
            'campus'=>'LAS',
        ]);
    }
}
