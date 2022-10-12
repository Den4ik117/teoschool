<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InformationResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'image' => url($this->image),
            'content' => $this->content,
            'published_at' => $this->created_at->format('d/m/Y H:i')
        ];
    }
}
