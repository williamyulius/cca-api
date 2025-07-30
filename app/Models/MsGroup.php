<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MsGroup extends Model
{
    /** @use HasFactory<\Database\Factories\MsGroupFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'unit',
        'campus',
        'academic_year',
    ];
}
