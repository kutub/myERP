<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Sales;
use App\Credited;

class Customers extends Model
{
    public function sales(){
        return $this->hasMany(Sales::class);
    }
    public function crediteds(){
        return $this->hasMany(Credited::class);
    }
}
