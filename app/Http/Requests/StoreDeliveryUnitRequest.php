<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDeliveryUnitRequest extends FormRequest
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
            'unit_type' => 'boolean',
            'unit_value' => 'required|numeric',
            'unit_from' => 'boolean',
            'unit_to' => 'boolean',
            'price' => 'required|numeric',
            'unit_id' => 'required|exists:units,id'
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
            'unit_type.boolean' => __('The unit_type field should be boolean type.'),
            'unit_value.required' => __('The unit_value field is required.'),
            'unit_value.numeric' => __('The unit_value field should be numeric type.'),
            'unit_from.boolean' => __('The unit_from field should be boolean type.'),
            'unit_to.boolean' => __('The unit_to field should be boolean type.'),
            'price.required' => __('The price field is required.'),
            'price.numeric' => __('The price field should be numeric type.'),
            'unit_id.required' => __('The unit_spec_id value is required.'),
            'unit_id.exists' => __('The unit_spec_id value is not existed.'),
        ];
    }
}
