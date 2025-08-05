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
            'ms_student_id'=>'19',
            'ms_class_id'=>'7',
            'ms_group_id'=>'2',
            'semester'=>'1',
            'academic_year'=>'2025/2026',
            'unit'=>'SD',
            'campus'=>'LAS',
        ]);
        TrStudentCoCurricularActivity::create([
            'ms_subject_co_curricular_activity_id'=>'13',
            'ms_student_id'=>'20',
            'ms_class_id'=>'7',
            'ms_group_id'=>'2',
            'semester'=>'1',
            'academic_year'=>'2025/2026',
            'unit'=>'SD',
            'campus'=>'LAS',
        ]);
        TrStudentCoCurricularActivity::create([
            'ms_subject_co_curricular_activity_id'=>'13',
            'ms_student_id'=>'21',
            'ms_class_id'=>'7',
            'ms_group_id'=>'2',
            'semester'=>'1',
            'academic_year'=>'2025/2026',
            'unit'=>'SD',
            'campus'=>'LAS',
        ]);
        TrStudentCoCurricularActivity::create([
            'ms_subject_co_curricular_activity_id'=>'13',
            'ms_student_id'=>'22',
            'ms_class_id'=>'8',
            'ms_group_id'=>'2',
            'semester'=>'1',
            'academic_year'=>'2025/2026',
            'unit'=>'SD',
            'campus'=>'LAS',
        ]);
        TrStudentCoCurricularActivity::create([
            'ms_subject_co_curricular_activity_id'=>'10',
            'ms_student_id'=>'28',
            'ms_class_id'=>'10',
            'ms_group_id'=>'2',
            'semester'=>'1',
            'academic_year'=>'2025/2026',
            'unit'=>'SD',
            'campus'=>'LAS',
        ]);
        TrStudentCoCurricularActivity::create([
            'ms_subject_co_curricular_activity_id'=>'14',
            'ms_student_id'=>'37',
            'ms_class_id'=>'13',
            'ms_group_id'=>'3',
            'semester'=>'1',
            'academic_year'=>'2025/2026',
            'unit'=>'SD',
            'campus'=>'LAS',
        ]);
    }
}
