<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ManageStocks extends JsonResource
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
            'date' => $this->created_at,
            'detail' => $this->detail,
            'quantity' => $this->quantity,
            'unit_price' => $this->unit_price,
            'total_value' => $this->total_value,
            'truck_no' => $this->truck_no,
            'transport' => $this->transport,
            'Subtotal' => $this->sum('total_value'),
        ];

    }
}
