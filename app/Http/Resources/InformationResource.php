<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InformationResource extends JsonResource
{
    public function toArray($request)
    {
        $content = strip_tags($this->content);

        return [
            'id' => $this->id,
            'title' => $this->title,
            'image' => url($this->image),
            'content' => strlen($content) <= 200 ? $content : (substr($content, 0, 200) . '...'),
            'published_at' => $this->created_at->format('d/m/Y H:i')
        ];
    }
}
