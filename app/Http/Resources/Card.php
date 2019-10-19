<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Card extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'category' => $this->category,
            'price' => $this->selling_price,
            'buying_price' => $this->buying_price,
            'name' => $this->description,
            'stock' => $this->stock
        ];
    }
}
