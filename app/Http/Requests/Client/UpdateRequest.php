<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name'      => 'required|string|unique:clients,name,' . $this->name . ',name',
            'vat'       => 'required|string|min:8|unique:clients,vat,' . $this->vat . ',vat',
            'address'   => 'required|string',
            'active'    => 'boolean',
        ];
    }
}
