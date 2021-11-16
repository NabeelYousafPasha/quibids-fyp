<?php

namespace App\Http\Requests\UserBidding;

use App\Models\Auction;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserBiddingRequest extends FormRequest
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
        $auctions = Auction::OfPublished()
            ->NotExpired()
            ->pluck('id');

        $rules = [
            'auction_id' => ['required', Rule::in($auctions)],
            'offered_price' => ['required', 'integer'],
        ];

        return $rules;
    }
}
