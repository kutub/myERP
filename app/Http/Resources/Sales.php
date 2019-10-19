<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class Sales extends JsonResource
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
            'cash' => $this->cash,
            'due' => $this->due,
            'date' => $this->created_at,
            'invoice' => $this->invoice, 
            'totalPurchase' => $this->customers->sales->sum('total'),
            'totalPay' => $this->customers->sales->sum('cash'),
            'totalDue' => $this->customers->sales->sum('due'),
        ];
    }

}
