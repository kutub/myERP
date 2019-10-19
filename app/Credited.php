<?php

namespace App;

use App\Customers;
use Illuminate\Database\Eloquent\Model;

class Credited extends Model
{
    public function customers(){
       return $this->belongsTo(Customers::class);
    }
}
