<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class ResetPassword extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'password' => 'required|current_password',
            'passwordNew' => 'required|string|min:5',
            'passwordReply' => 'required|same:passwordNew'
        ];
    }
}
