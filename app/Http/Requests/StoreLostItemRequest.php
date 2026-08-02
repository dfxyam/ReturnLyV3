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
            'reporter_name' => ['required', 'string', 'max:100'],
            'class_name' => ['nullable', 'string', 'max:50'],
            'phone_number' => ['required', 'string', 'max:20'],
            'item_name' => ['required', 'string', 'max:150'],
            'description' => ['required', 'string'],
            'category_id' => ['required', 'exists:categories,id'],
            'location_id' => ['required', 'exists:locations,id'],
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'lost_date' => ['required', 'date'],
        ];
    }

    public function messages(): array
    {
        return [
            'reporter_name.required' => 'Nama pelapor wajib diisi.',
            'phone_number.required' => 'Nomor WhatsApp wajib diisi.',
            'item_name.required' => 'Nama barang wajib diisi.',
            'description.required' => 'Deskripsi barang wajib diisi.',
            'category_id.required' => 'Kategori barang wajib dipilih.',
            'location_id.required' => 'Lokasi kehilangan wajib dipilih.',
            'lost_date.required' => 'Tanggal kehilangan wajib diisi.',
            'photo.image' => 'File harus berupa gambar.',
            'photo.max' => 'Ukuran gambar maksimal 2 MB.',
        ];
    }
}
