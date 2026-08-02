<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'activity',
        'description',
        'created_at',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];
}
