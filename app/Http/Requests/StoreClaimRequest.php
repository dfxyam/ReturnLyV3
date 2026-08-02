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
            'found_item_id' => ['required', 'exists:found_items,id'],
            'claimer_name' => ['required', 'string', 'max:100'],
            'class_name' => ['nullable', 'string', 'max:50'],
            'phone_number' => ['required', 'string', 'max:20'],
            'reason' => ['required', 'string', 'min:10'],
        ];
    }

    public function messages(): array
    {
        return [
            'found_item_id.required' => 'Barang yang diklaim wajib dipilih.',
            'claimer_name.required' => 'Nama pengklaim wajib diisi.',
            'phone_number.required' => 'Nomor WhatsApp wajib diisi.',
            'reason.required' => 'Alasan klaim wajib diisi.',
            'reason.min' => 'Alasan klaim minimal 10 karakter.',
        ];
    }
}
