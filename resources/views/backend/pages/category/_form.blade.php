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
        :value="$category->name ?? old('name')"
        class="block mt-1 w-full"
        required
        autofocus
    />
</div>
