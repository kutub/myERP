<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Customers;

class Sales extends Model
{
    public function customers(){
        return $this->belongsTo(Customers::class);
    }
}
