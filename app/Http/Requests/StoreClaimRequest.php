<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClaimRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'found_item_id' => 'required|exists:found_items,id',
            'lost_item_id' => 'nullable|exists:lost_items,id',
            'claimant_name' => 'required|string|max:100',
            'claimant_phone' => 'required|string|max:20',
            'proof_description' => 'required|string|min:10|max:1000',
        ];
    }
}
