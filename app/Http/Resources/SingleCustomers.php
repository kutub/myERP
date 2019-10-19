<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SingleCustomers extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
        // return [
        //     'id' => $this->id,
        //     'image' => $this->image,
        //     'name' => $this->name,
        //     'area' => $this->area,
        //     'phone' => $this->phone,
        //     'total' => $this->amount,
        //     'description' => $this->description
        // ];
    }
}
