<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    // Relation function name has to be the same as model name
    // Has many = Plural
    public function setSubjectCoCurricularActivities(): HasMany
    {
        return $this->hasMany(SetSubjectCoCurricularActivity::class);
    }
}
