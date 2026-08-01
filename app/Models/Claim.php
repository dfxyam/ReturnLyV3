<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Claim extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'claim_number',
        'found_item_id',
        'lost_item_id',
        'claimant_name',
        'claimant_phone',
        'proof_description',
        'status',
        'admin_notes',
    ];

    public function foundItem(): BelongsTo
    {
        return $this->belongsTo(FoundItem::class);
    }

    public function lostItem(): BelongsTo
    {
        return $this->belongsTo(LostItem::class);
    }
}
