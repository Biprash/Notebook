<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NoteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->when($this->description, $this->description),
            'cover' => $this->when($this->cover, asset('storage/'. $this->cover)),
            'published' => (bool)$this->published_at,
            'is_bookmarked' => $this->when((bool)auth()->user(),$this->is_bookmarked(auth()->user()))
        ];
    }
}
