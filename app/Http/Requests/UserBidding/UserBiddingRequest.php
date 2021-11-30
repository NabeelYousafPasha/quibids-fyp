<?php

namespace App\Http\Requests\UserBidding;

use App\Models\UserBidding;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

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
        $auction = $this->route('auction');

        $maxOfferedBiddingPrice = UserBidding::select(DB::raw("MAX(offered_price) as max_offered_price"))
            ->where('auction_id', '=', $auction->id)
            ->first();


        $price = $auction->estimated_price;
        if (($maxOfferedBiddingPrice->max_offered_price ?? 0) > $auction->estimated_price) {
            $price = $maxOfferedBiddingPrice->max_offered_price ?? 0;
        }

        $rules = [
            'offered_price' => ['required', 'integer', 'min:'.$price],
        ];

        return $rules;
    }
}
