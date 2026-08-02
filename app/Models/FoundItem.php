<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FoundItem extends Model
{
    protected $fillable = [
        'category_id',
        'location_id',
        'finder_name',
        'class_name',
        'phone_number',
        'item_name',
        'description',
        'photo',
        'found_date',
        'storage_location',
        'status',
    ];

    protected $casts = [
        'found_date' => 'date',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function claims(): HasMany
    {
        return $this->hasMany(Claim::class);
    }
}
