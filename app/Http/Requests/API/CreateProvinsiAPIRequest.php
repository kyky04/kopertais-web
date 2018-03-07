<?php

namespace App\Http\Requests\API;

use App\Models\Provinsi;
use InfyOm\Generator\Request\APIRequest;

class CreateProvinsiAPIRequest extends APIRequest
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
        return Provinsi::$rules;
    }
}
