<?php

namespace App\Http\Requests;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
         // Let's get the route param by name to get the User object value
         $user = request()->route('user');
        
        return [
            //
            'name' => 'required',
            'email' => 'required|email:rfc,dns|',
            'pseudo' => 'required|unique:users,pseudo,' .$user->id,
            'agence' => 'nullable',


        ];
    }
}
