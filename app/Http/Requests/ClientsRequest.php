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
        // updating
        if ($this->id) {
            $rules = [
                'phone'   => 'required|regex:/(01)[0-9]{9}/|unique:clients,phone,' . $this->id
            ];
        }
        // creating 
        else {
            $rules = [
                'phone'   => 'required|unique:clients|regex:/(01)[0-9]{9}/'
            ];
        }

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
