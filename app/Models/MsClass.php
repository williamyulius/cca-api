<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MsClass extends Model
{
    /** @use HasFactory<\Database\Factories\MsClassFactory> */
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'group',
    ];
}
