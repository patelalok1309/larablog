<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
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
            'name' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Permission Name is required',
            'name.string' => 'Permission name should be in characters only'
        ];
    }
}
