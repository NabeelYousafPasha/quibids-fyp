<!-- Name -->
<div>
    <x-label
        for="name"
        :value="__('Name')"
    />

    <x-input
        id="name"
        type="text"
        name="name"
        :value="$package->name ?? old('name')"
        class="block mt-1 w-full"
        required
        autofocus
    />
</div>

<!-- Description -->
<div class="mt-3">
    <x-label
        for="description"
        :value="__('Description')"
    />

    <textarea
        id="description"
        name="description"
        class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full"
        required
    >{{ $package->description ?? old('description') }}</textarea>
</div>

<!-- Price -->
<div class="mt-3">
    <x-label
        for="price"
        :value="__('Price')"
    />

    <x-input
        id="price"
        type="number"
        name="price"
        :value="$package->price ?? old('price')"
        class="block mt-1 w-full"
        min="0"
        required
    />
</div>

<!-- Award Bids -->
<div class="mt-3">
    <x-label
        for="award_bids"
        :value="__('Award Bids')"
    />

    <x-input
        id="award_bids"
        type="number"
        name="award_bids"
        :value="$package->award_bids ?? old('award_bids')"
        class="block mt-1 w-full"
        min="0"
        required
    />
</div>
