<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MsStudent extends Model
{
    /** @use HasFactory<\Database\Factories\MsStudentFactory> */
    use HasFactory;

    protected $fillable = [
        'student_id',
        'name',
        'unit',
        'class',
        'gender',
        'religion',
    ];

    
}
