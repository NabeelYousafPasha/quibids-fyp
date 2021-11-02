<table class='mx-auto w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
    <thead class="bg-gray-900">
        <tr class="text-white text-left">
            <th class="font-semibold text-sm uppercase px-6 py-4"> Name </th>
            <th class="font-semibold text-sm uppercase px-6 py-4"> User Name </th>
            <th class="font-semibold text-sm uppercase px-6 py-4"> Email </th>
            <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Actions </th>
        </tr>
    </thead>
    <tbody class="divide-y divide-gray-200">
        @foreach($unApprovedVendors ?? [] as $unApprovedVendor)
            <tr>
                <td class="px-6 py-4">
                    <div class="flex items-center space-x-3">
                        <div>
                            <p>
                                {{ $unApprovedVendor->name }}
                            </p>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4">
                    <p class="text-gray-500 text-sm font-semibold tracking-wide">
                        {{ $unApprovedVendor->username }}
                    </p>
                </td>
                <td class="px-6 py-4 text-left">
                    {{ $unApprovedVendor->email }} $
                </td>
                <td class="px-6 py-4 text-center">
                    <a href="#" class="p-2 pl-5 pr-5 m-1 bg-transparent border-2 border-blue-500 text-blue-500 text-lg rounded-lg hover:bg-blue-500 hover:text-gray-100 focus:border-4 focus:border-blue-300">
                        Approve
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
