<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrStudentCoCurricularActivity extends Model
{
    /** @use HasFactory<\Database\Factories\TrStudentCoCurricularActivityFactory> */
    use HasFactory;

    protected $fillabel = [
        'ms_subject_co_curricular_activity_id',
        'ms_student_id',
        'ms_class_id',
        'ms_group_id',
        'semester',
        'academic_year',
        'unit',
        'campus',
    ];
}
