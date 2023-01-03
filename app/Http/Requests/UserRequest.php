<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(Request $request)
    {
        switch ($request->route()->getActionMethod()) {
            case 'store':
                return [
                    'name'     => ['required', 'max:100'],
                    'email'    => ['required', 'unique:users,email'],
                    'password' => ['required', 'min:6']
                ];
            break;

            case 'update':
                return [
                    'name'     => ['max:100'],
                    'email'    => ['unique:users,email'],
                    'password' => ['min:6']
                ];
        }
    }

    public function messages()
    {
        return[
            'name.required' => 'Name is Must',
            'email.required' => 'Email is must',
            'password.min' => 'En az 6 haneli olmalı'
        ];
    }
}
