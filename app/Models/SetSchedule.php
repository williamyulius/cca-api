<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SetSchedule extends Model
{
    /** @use HasFactory<\Database\Factories\SetScheduleFactory> */
    use HasFactory;
    protected $fillable = [
        'ms_group_id',
        'enrollment_start_date',
        'enrollment_end_date',
        'semester',
        'academic_year',
        'status',
        'unit',
        'campus',
    ];
}
