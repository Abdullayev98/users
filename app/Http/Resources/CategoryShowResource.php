<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return  [
            'id' => $this->id,
            'parent_id' => $this->parent_id,
            'name' => $this->name,
            'ico' => asset('storage/'.$this->ico),
            'max' => $this->max,
            'min' => $this->min,
            'isDoubleAddress' => $this->double_address
        ];
    }
}
