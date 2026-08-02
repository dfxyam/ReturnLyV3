<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LostItem extends Model
{
    protected $fillable = [
        'category_id',
        'location_id',
        'reporter_name',
        'class_name',
        'phone_number',
        'item_name',
        'description',
        'photo',
        'lost_date',
        'status',
    ];

    protected $casts = [
        'lost_date' => 'date',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }
}
