<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;
use App\Models\StudentHaSDetail;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_name',
        'address_id',
        'slug',
        'phone_no',
        'age',
        'resolved_by',
    ];

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::deleting(function($student) {
    //         $student->getDetail()->delete();
    //     });
    // }

    public  function getDetail(){
        return $this->hasOne(StudentHaSDetail::class,'student_id');
    }


    public  function getAddress(){
        return $this->belongsTo(Address::class,'address_id');
    }

    public function setUserNameAttribute($value)
    {
        $this->attributes['user_name'] = strtolower($value);  
        $this->attributes['slug'] = Str::slug($value);  
    }

    public function getUserNameAttribute($value)
    {
        return ucwords($value);  
    }


}
