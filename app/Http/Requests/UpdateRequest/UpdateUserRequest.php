<?php

namespace App\Http\Requests\UpdateRequest;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:1', 'max:255'],
            'username' => ['required', 'string', 'min:1', 'max:255'],
            'date' => ['required', 'date'],
            'email' => ['required', 'string', 'min:1', 'max:255'],
            'email_verified_at' => ['nullable', 'date', 'after_or_equal:1970-01-01 00:00:01', 'before_or_equal:2038-01-19 03:14:07'],
            'phone' => ['required', 'string', 'min:1', 'max:255'],
            'phone_verified_at' => ['nullable', 'date', 'after_or_equal:1970-01-01 00:00:01', 'before_or_equal:2038-01-19 03:14:07'],
            'status' => ['required', 'string', 'min:1', 'max:255'],
            'password' => ['required', 'string', 'min:1', 'max:255'],
            'remember_token' => ['nullable', 'string', 'min:1', 'max:100']
        ];
    }
}
