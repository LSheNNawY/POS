<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        // updating users request
        if ($this->id) {
            $password = 'nullable|min:6|max:20';
            $email = ['required', 'email', \Rule::unique('users')->ignore($this->id)];
        } 
        // creating user request
        else {
            $password = 'required|min:6|max:20';
            $email = 'required|email|unique:users';
        }

        return [
            'first_name'    => 'required|string|min:3|max:12',
            'last_name'     => 'required|string|min:3|max:12',
            'email'         => $email,
            'password'      => $password,
            'image'         => 'nullable|image|mimes:png,jpeg,bmp8',
            'permissions'   => 'required|min:1'       
        ];
    }
}
