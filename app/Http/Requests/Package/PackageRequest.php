<?php

namespace App\Http\Requests\Package;

use Illuminate\Foundation\Http\FormRequest;

class PackageRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255',],
            'description' => ['required', 'string', 'max:255',],
            'price' => ['required', 'numeric', 'min:0', 'not_in:0'],
            'award_bids' => ['required', 'numeric', 'min:0', 'not_in:0'],
        ];

        return $rules;
    }
}
