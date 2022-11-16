<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;


class UserHasVacation extends Model
{
    use HasFactory, LogsActivity;
    protected $fillable = [
        'auther',
        'status',
        'is_active',
        'resolved_by',
        'updated_by',
        'request_created_at',
        'vacation_start_date',
        'vacation_end_date',
    ];

}
