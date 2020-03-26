<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded = [];

    public function Customer(){
        return $this->hasMany(Customer::class);
    }
}
