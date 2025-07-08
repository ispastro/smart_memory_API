<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'item_name' => ['required|string|max:255'],
            'location' => ['nullable|string|max:255'],
            'notes' => ['nullable|string'],
            'photo' => ['nullable', 'image', 'max:2048'], //
        ];
    }
}
