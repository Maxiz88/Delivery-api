<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDeliveryRequest extends FormRequest
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
        return [
            'company_name' => 'required|string|min:3|max:30',
            'description' => 'string|min:10|max:1000',
            'currency_id' => 'required|exists:currencies,id',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'company_name.required' => __('The company_name field is required.'),
            'company_name.min' => __('The company_name field is 3 symbol min.'),
            'company_name.max' => __('The company_name field is 30 symbol max.'),
            'description.max' => __('The description field is 1000 symbol max.'),
            'currency_id.required' => __('The currency_id field is required.'),
            'currency_id.exists' => __('The currency_id is not existed.'),
        ];
    }
}
