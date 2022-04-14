<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed name
 * @property mixed brand
 * @property mixed telephone
 * @property mixed url
 * @property mixed employees
 * @property mixed establishment_at
 * @property mixed industry_id
 * Class StoreCompanyRequest
 * @package App\Http\Requests
 */
class StoreCompanyRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string',
            'brand' => 'required|string',
            'telephone' => 'nullable|numeric',
            'url' => 'nullable|string',
            'employees' => 'nullable|int',
            'establishment_at' => 'nullable|int',
            'industry_id' => 'required|int|exists:industries,id'
        ];
    }
}
