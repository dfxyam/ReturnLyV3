<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLostItemRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category_id' => 'required|exists:categories,id',
            'location_id' => 'required|exists:locations,id',
            'item_name' => 'required|string|max:150',
            'description' => 'nullable|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'lost_date' => 'required|date|before_or_equal:today',
            'contact_name' => 'required|string|max:100',
            'contact_phone' => 'required|string|max:20',
        ];
    }
}
