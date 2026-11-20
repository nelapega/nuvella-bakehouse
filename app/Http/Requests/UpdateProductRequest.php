<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:150',
            'category_id' => 'required|integer|exists:categories,id',
            'price' => 'required|numeric|min:1000',
            'description' => 'required|string|max:3000',
            'weight_portion' => 'nullable|string|max:100',
            'ingredients' => 'nullable|string|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_featured' => 'nullable|boolean',
            'is_available' => 'nullable|boolean',
        ];
    }

    /**
     * Custom validation messages in Indonesian.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Nama produk wajib diisi.',
            'name.string' => 'Nama produk harus bertipe teks.',
            'name.max' => 'Nama produk maksimal 150 karakter.',

            'category_id.required' => 'Kategori produk wajib dipilih.',
            'category_id.integer' => 'ID kategori harus berupa angka integer.',
            'category_id.exists' => 'Kategori yang dipilih tidak valid di database.',

            'price.required' => 'Harga produk wajib diisi.',
            'price.numeric' => 'Harga produk harus bertipe data angka numerik.',
            'price.min' => 'Harga produk minimal Rp 1.000.',

            'description.required' => 'Deskripsi produk wajib diisi.',
            'description.string' => 'Deskripsi produk harus bertipe teks.',
            'description.max' => 'Deskripsi produk maksimal 3000 karakter.',

            'weight_portion.string' => 'Porsi / berat harus bertipe teks.',
            'weight_portion.max' => 'Porsi / berat maksimal 100 karakter.',

            'ingredients.string' => 'Komposisi bahan harus bertipe teks.',
            'ingredients.max' => 'Komposisi bahan maksimal 500 karakter.',

            'image.image' => 'File yang diunggah harus bertipe data gambar.',
            'image.mimes' => 'Format gambar harus berekstensi jpeg, png, jpg, atau webp.',
            'image.max' => 'Ukuran file gambar maksimal 2MB (2048 KB).',
        ];
    }
}
