<!-- Title -->
<div>
    <x-label
        for="title"
        :value="__('Title')"
    />

    <x-input
        id="title"
        type="text"
        name="title"
        :value="$auction->title ?? old('title')"
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
    >{{ $auction->description ?? old('description') }}</textarea>
</div>

<!-- Categories -->
<div class="mt-3">
    <x-label for="categories" :value="__('Categories')" />

    <select
        class="mt-1 form-control block mt-1 w-full"
        name="categories[]"
        multiple
        required
    >
        @foreach($categories as $categoryId => $category)
        <option
            value="{{ $categoryId }}"
            id="category_{{ $categoryId }}"
            {{ (collect(old('categories'))->contains($categoryId)) ? 'selected': '' }}
            {{ (!isset($auctionCategories) ? '' : $auctionCategories->contains($categoryId)) ? 'selected': '' }}
        >
            {{ ucfirst($category) }}
        </option>
        @endforeach
    </select>
</div>

<!-- Estimated Price -->
<div class="mt-3">
    <x-label
        for="estimated_price"
        :value="__('Estimated Price')"
    />

    <x-input
        id="estimated_price"
        type="number"
        name="estimated_price"
        :value="$auction->estimated_price ?? old('estimated_price')"
        class="block mt-1 w-full"
        min="0"
        required
    />
</div>

<!-- Estimated Expiry -->
<div class="mt-3">
    <x-label
        for="estimated_expire_at"
        :value="__('Estimated Expiry')"
    />

    <x-input
        id="estimated_expire_at"
        type="date"
        name="estimated_expire_at"
        :value="$auction->estimated_expire_at ?? old('estimated_expire_at')"
        class="block mt-1 w-full"
        required
    />
</div>
