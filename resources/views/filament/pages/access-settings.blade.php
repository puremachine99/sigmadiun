<x-filament::page>
    <table class="min-w-full text-sm">
        <thead>
            <tr>
                <th class="text-left">User</th>
                <th class="text-left">Email</th>
                <th class="text-left">Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if ($user->hasRole('superadmin'))
                            <span class="text-gray-500 text-sm italic">Superadmin (tidak bisa diganti)</span>
                        @else
                            <select
                                class="w-full max-w-xs border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white rounded-md shadow-sm focus:border-primary-500 focus:ring-primary-500"
                                wire:change="$wire.updateUserRole({{ $user->id }}, $event.target.value)">
                                @foreach (Spatie\Permission\Models\Role::all() as $role)
                                    <option value="{{ $role->name }}" @selected($user->hasRole($role->name))>
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-filament::page>
