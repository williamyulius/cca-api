<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    // Relation function name has to be the same as model name
    public function msSubjectCoCurricularActivity(): BelongsTo{
        return $this->belongsTo(MsSubjectCoCurricularActivity::class);
    }
    public function msGroup(): BelongsTo{
        return $this->belongsTo(MsGroup::class);
    }
}
