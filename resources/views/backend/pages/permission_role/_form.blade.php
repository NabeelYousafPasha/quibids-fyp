<form
    action="{{ route('dashboard.setup.permission_role.store') }}"
    method="POST"
    id="permission_role_form"
    name="permission_role_form"
>
    @csrf
    <table class="mx-auto w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden">
        <thead class="bg-gray-900">
            <tr class="text-white text-left">
                <th class="font-semibold text-sm uppercase px-6 py-4">Permissions</th>
                @foreach($roles as $role)
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">{{ ucfirst($role) }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
        @foreach($permissions as $permission_id => $permission)
            <tr class="uppercase px-6 py-4">
                <td>{!! $permission !!}</td>
                @foreach($roles as $role_id => $role)
                    <th>
                        <input
                            class="i-checks checkbox"
                            type="checkbox"
                            name="permissions_roles[{!! $permission_id !!}][{!! $role_id !!}]"
                            value="1"
                            {!! (in_array($permission_id.'-'.$role_id, $permissionsRoles)) ? 'checked' : '' !!}
                        >
                    </th>
                @endforeach
            </tr>
        @endforeach
        <tr class="text-white">
            <th class="font-semibold text-sm uppercase px-6 py-4" colspan="{{ 1+count($roles ?? []) }}">
                <x-button class="btn btn-block ml-3">
                    {{ __('Save') }}
                </x-button>
            </th>
        </tr>
        </tbody>
    </table>
</form>
