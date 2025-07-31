<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SetSubjectCoCurricularActivity extends Model
{
    /** @use HasFactory<\Database\Factories\SetSubjectCoCurricularActivityFactory> */
    use HasFactory;

    protected $fillable = [
        'ms_group_id',
        'ms_subject_co_curricular_activity_id',
        'quota',
        'semester',
        'academic_year',
        'unit',
        'campus',
        'status',
    ];
}
