<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @property int key
 * @property int industry
 * Class SearchRequest
 * @package App\Http\Requests
 */
class SearchRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'key' => 'required',
            'industry' => 'nullable'
        ];
    }
}
