<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'login'         => 'required',
            'password'      => 'required',
            'first_name'    => 'required',
            'last_name'     => 'required',
            'date_of_birth' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'login'         => 'Это поле необходимо для заполнения',
            'password'      => 'Это поле необходимо для заполнения',
            'first_name'    => 'Это поле необходимо для заполнения',
            'last_name'     => 'Это поле необходимо для заполнения',
        ];
    }
}
