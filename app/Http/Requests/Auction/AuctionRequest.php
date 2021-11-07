<?php

namespace App\Http\Requests\Auction;

use Illuminate\Foundation\Http\FormRequest;

class AuctionRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255',],
            'description' => ['required', 'string', 'max:255',],
            'estimated_price' => ['required', 'numeric', 'min:0', 'not_in:0',],
            'estimated_expire_at' => ['required', 'date', 'after:today',],
        ];

        return $rules;
    }
}
