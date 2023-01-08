<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'parts' => $this->parts,
            'description' => $this->description,
            'modules' => ModuleResource::collection($this->modules)
        ];
    }
}
