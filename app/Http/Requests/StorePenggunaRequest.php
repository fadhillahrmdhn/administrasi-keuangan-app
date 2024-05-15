<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePenggunaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->is_admin;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:255', 'regex:/^[A-Za-z\s]+$/'],
            'nameortu' => ['required', 'max:255', 'regex:/^[A-Za-z\s]+$/'],
            'nisn' => ['required', 'digits:10', 'unique:users', 'numeric', 'unique:users'],
            'email' => 'required|email:dns|unique:users'
        ];
    }
}