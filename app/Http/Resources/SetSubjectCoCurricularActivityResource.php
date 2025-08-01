<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SetSubjectCoCurricularActivityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array

    {

        return [
            'id' => $this->id,
            'group'=> $this->msGroup->name,
            'name' => $this->msSubjectCoCurricularActivity->name,
            'quota' => $this->quota,
            'unit' => $this->unit,
            'campus' => $this->campus,
            'semester' => $this->semester,
            'academic_year' => $this->academic_year,
        ];

    }
}
