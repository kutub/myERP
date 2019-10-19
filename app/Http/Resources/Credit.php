<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Credit extends JsonResource
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
            'total' => $this->total,
            'pay_by' => $this->pay_by,
            'comments' => $this->comments,
            'date' => $this->created_at,
        ];
    }
}
