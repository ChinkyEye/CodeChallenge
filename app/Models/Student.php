<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public  function getAddress(){
        return $this->belongsTo(Address::class,'address_id');
    }
}
