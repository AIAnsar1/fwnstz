<?php

namespace App\Http\Requests\UpdateRequest;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdvertisementsRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:1', 'max:255'],
            'description' => ['required', 'string', 'min:1'],
            'photos' => ['nullable', 'string'],
            'options' => ['nullable', 'string'],
            'price' => ['required', 'integer', 'min:-2147483648', 'max:2147483647'],
            'square' => ['required', 'string', 'min:1', 'max:255'],
            'we_can_agree' => ['required', 'boolean'],
            'address' => ['nullable', 'string'],
            'type' => ['nullable', 'string'],
            'user_id' => ['nullable', 'exists:users,id'],
            'category_id' => ['nullable', 'exists:categories,id'],
        ];
    }
}
