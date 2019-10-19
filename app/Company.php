<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function manageStocks(){
        return $this->hasMany(ManageStocks::class);
    }
}
