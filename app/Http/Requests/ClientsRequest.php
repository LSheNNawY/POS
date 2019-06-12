<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientsRequest extends FormRequest
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
        $rules = [
            'phone.0'   => 'required|different:phone.1|regex:/(01)[0-9]{9}/|unique:clients,phone',
            'phone.1'   => 'nullable|regex:/(01)[0-9]{9}/|unique:clients,phone',
        ];

        foreach(config('translatable.locales') as $locale)
        {
            $rules += [
                $locale . '.name' => [
                    'required', 'string', 'min:3', 'max:20',
                ],
                $locale . '.address' => [
                    'required', 'string', 'min:3', 'max:200'
                ],

            ];
        }

        return $rules;
    }
}
