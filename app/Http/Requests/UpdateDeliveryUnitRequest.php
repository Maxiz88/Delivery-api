<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDeliveryUnitRequest extends FormRequest
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
            'unit_value' => 'numeric',
            'unit_from' => 'boolean',
            'unit_to' => 'boolean',
            'price' => 'numeric',
            'unit_id' => 'exists:units,id'
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
            'unit_value.numeric' => __('The unit_value field should be numeric type.'),
            'unit_from.boolean' => __('The unit_from field should be boolean type.'),
            'unit_to.boolean' => __('The unit_to field should be boolean type.'),
            'price.numeric' => __('The price field should be numeric type.'),

            'unit_id.exists' => __('The unit_spec_id value is not existed.'),
        ];
    }
}
