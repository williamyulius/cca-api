<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SetAcademicYear extends Model
{
    /** @use HasFactory<\Database\Factories\SetAcademicYearFactory> */
    use HasFactory;

    protected $fillable = [
        'academic_year',
        'semester',
        'status',
    ];
}
