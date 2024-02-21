<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $on_update = $this->method() == 'PUT' ? '' : '|unique:users,email';
        return [
            'name' => 'required|max:25',
            'email' => 'required|email'.$on_update,
            'password' => 'required',
            'role' => 'required',
            'avatar' => 'required|image'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'usernmae is required ',
            'name.max' => 'username should not more than 25 characters'
        ];
    }
}
