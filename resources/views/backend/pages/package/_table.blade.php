<table class='mx-auto w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
    <thead class="bg-gray-900">
        <tr class="text-white text-left">
            <th class="font-semibold text-sm uppercase px-6 py-4"> Name </th>
            <th class="font-semibold text-sm uppercase px-6 py-4"> Description </th>
            <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Price </th>
            <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Bids </th>
            <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Actions </th>
        </tr>
    </thead>
    <tbody class="divide-y divide-gray-200">
        @foreach($packages ?? [] as $package)
            <tr>
                <td class="px-6 py-4">
                    <div class="flex items-center space-x-3">
                        <div>
                            <p>
                                {{ $package->name }}
                            </p>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4">
                    <p class="text-gray-500 text-sm font-semibold tracking-wide">
                        {{ $package->description }}
                    </p>
                </td>
                <td class="px-6 py-4 text-center">
                    {{ $package->price }} $
                </td>
                <td class="px-6 py-4 text-center">
                    {{ $package->award_bids }} Bids
                </td>
                <td class="px-6 py-4 text-center">
                    @if(auth()->user()->can('update_package'))
                        <a
                            href="{{ route('dashboard.packages.edit', ['package' => $package]) }}"
                            class="p-2 pl-5 pr-5 m-1 bg-transparent border-2 border-blue-500 text-blue-500 text-lg rounded-lg hover:bg-blue-500 hover:text-gray-100 focus:border-4 focus:border-blue-300"
                        >
                            Edit
                        </a>
                    @endif

                    @if(auth()->user()->can('delete_package'))
                        <a href="#" class="p-2 pl-5 pr-5 m-1 bg-transparent border-2 border-red-500 text-red-500 text-lg rounded-lg hover:bg-red-500 hover:text-gray-100 focus:border-4 focus:border-red-300">
                            Delete
                        </a>
                    @endif

                    @if(auth()->user()->can('purchase_package'))
                        <a href="{{ route('dashboard.user.packages.store', $package->id) }}" onclick="return confirm('Are you sure')" class="p-2 pl-5 pr-5 m-1 bg-transparent border-2 border-green-500 text-green-500 text-lg rounded-lg hover:bg-green-500 hover:text-gray-100 focus:border-4 focus:border-green-300">
                            Purchase
                        </a>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
