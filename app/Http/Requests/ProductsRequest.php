<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductsRequest extends FormRequest
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
            'purchase_price'    => 'required|between:1,999999.99',
            'sale_price'        => 'required|between:1,999999.99',
            'stock'             => 'required|integer|min:1',
            'image'             => 'nullable|image|mimes:png,jpeg,bmp',
        ];


        foreach (config('translatable.locales') as $locale)
        {
            $rules += [
                $locale . '.name' => [
                    'required', 'string', 'min:3', 'max:20',
                ],
                $locale . '.description' => [
                    'required', 'string', 'min:3', 'max:200'
                ],

            ];
        }

        return $rules;
    }
}
