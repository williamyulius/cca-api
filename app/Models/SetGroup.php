<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SetGroup extends Model
{
    /** @use HasFactory<\Database\Factories\SetGroupFactory> */
    use HasFactory;

    protected $fillable = [
        'ms_group_id',
        'group',
        'unit',
        'campus',
        'semester',
        'academic_year',
    ];
}
