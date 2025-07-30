<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MsSubjectCoCurricularActivity extends Model
{
    /** @use HasFactory<\Database\Factories\MsSubjectCoCurricularActivityFactory> */
    use HasFactory;
    protected $fillable = [
        'code',
        'name',
        'unit',
        'campus',
    ];
}
