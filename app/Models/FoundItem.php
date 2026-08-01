<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FoundItem extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'category_id',
        'location_id',
        'item_name',
        'description',
        'image',
        'found_date',
        'contact_name',
        'contact_phone',
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
