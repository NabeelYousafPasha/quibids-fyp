<!-- Offered Price -->
<div class="mt-3">
    <x-label
        for="offered_price"
        :value="__('Offered Price')"
    />

    <x-input
        id="offered_price"
        type="number"
        name="offered_price"
        :value="old('offered_price')"
        class="block mt-1 w-full"
        placeholder="{{ $maxOfferedBiddingPrice ?? 0 }}"
        min="{{ $maxOfferedBiddingPrice ?? 0 }}"
        required
    />

    <div class="mt-2 mb-2">
        <span class="help text-sm text-gray-500">
            Maximum price offered: {{ $maxOfferedBiddingPrice ?? 0 }}
        </span>
    </div>
</div>
