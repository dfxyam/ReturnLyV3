<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Claim extends Model
{
    protected $fillable = [
        'found_item_id',
        'claimer_name',
        'class_name',
        'phone_number',
        'reason',
        'status',
    ];

    public function foundItem(): BelongsTo
    {
        return $this->belongsTo(FoundItem::class);
    }
}
