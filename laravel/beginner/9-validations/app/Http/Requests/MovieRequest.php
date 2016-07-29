<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MovieRequest extends Request
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
            'name' => 'required|min:4',
            'year' => 'required|numeric|min:1950|max:2020',
        ];
    }
}
