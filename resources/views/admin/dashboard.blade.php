<x-app-layout>
    <div class="flex">

        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 text-white min-h-screen p-5">
            <h2 class="text-2xl font-semibold text-center text-white mb-6">Admin Portal</h2>
            <ul class="space-y-4">
                <li><a href="#" class="hover:text-blue-400">Dashboard</a></li>
                <li><a href="#user-management" class="hover:text-blue-400">User Management</a></li>
                <li><a href="#stamp-management" class="hover:text-blue-400">Stamp Management</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6">

            <!-- User Management -->
            <section id="user-management">
                <h1 class="text-3xl font-semibold mb-4">User Management</h1>
                <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
                    <table class="min-w-full table-auto border-collapse">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="p-4 border-b text-left">Name</th>
                                <th class="p-4 border-b text-left">Email</th>
                                <th class="p-4 border-b text-left">Poly</th>
                                <th class="p-4 border-b text-left">Major</th>
                                <th class="p-4 border-b text-left">Marketing</th>
                                <th class="p-4 border-b text-left">Role</th>
                                <th class="p-4 border-b text-left">Stamps</th>
                                <th class="p-4 border-b text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="hover:bg-gray-50">
                                    <td class="p-4 border-b">{{ $user->name }}</td>
                                    <td class="p-4 border-b">{{ $user->email }}</td>
                                    <td class="p-4 border-b">{{ $user->poly }}</td>
                                    <td class="p-4 border-b">{{ $user->major }}</td>
                                    <td class="p-4 border-b">{{ $user->marketing ? 'Yes' : 'No' }}</td>
                                    <td class="p-4 border-b">{{ $user->role }}</td>
                                    <td class="p-4 border-b">
                                        @if($user->stamps->isNotEmpty())
                                            @foreach($user->stamps as $stamp)
                                                <span>{{ $stamp->number }}, </span>
                                            @endforeach
                                        @else
                                            <span>No stamps collected</span>
                                        @endif
                                    </td>
                                    <td class="p-4 border-b">
                                        <a href="{{ route('admin.editUser', $user->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                                        <a href="{{ route('admin.deleteUser', $user->id) }}" class="text-red-500 hover:text-red-700 ml-3">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>

            <br>

            <!-- Stamp Management -->
            <section id="stamp-management">
                <h1 class="text-3xl font-semibold mb-4">Stamp Management</h1>
                <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
                    <table class="min-w-full table-auto border-collapse">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="p-4 border-b text-left">Stamp Number</th>
                                <th class="p-4 border-b text-left">Owner</th>
                                <th class="p-4 border-b text-left">Secret</th>
                                <th class="p-4 border-b text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stamps as $stamp)
                                <tr class="hover:bg-gray-50">
                                    <td class="p-4 border-b">{{ $stamp->number }}</td>
                                    <td class="p-4 border-b">{{ $stamp->owner }}</td>
                                    <td class="p-4 border-b">{{ $stamp->secret }}</td>
                                    <td class="p-4 border-b">
                                        <a href="{{ route('admin.editStamp', $stamp->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                                        <a href="{{ route('admin.deleteStamp', $stamp->id) }}" class="text-red-500 hover:text-red-700 ml-3">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>

            <br>

            <!-- Create New Stamp Form -->
            <section id="create-stamp">
                <h3 class="text-2xl font-semibold mb-4">Create New Stamp</h3>
                <form method="POST" action="{{ route('admin.createStamp') }}" class="bg-white shadow-lg p-6 rounded-lg">
                    @csrf

                    <div class="mb-4">
                        <x-input-label for="number" :value="__('Stamp Number')" />
                        <x-text-input id="number" name="number" required class="block mt-1 w-full" />
                        <x-input-error :messages="$errors->get('number')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="owner" :value="__('Owner')" />
                        <x-text-input id="owner" name="owner" required class="block mt-1 w-full" />
                        <x-input-error :messages="$errors->get('owner')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="secret" :value="__('Secret')" />
                        <x-text-input id="secret" name="secret" required class="block mt-1 w-full" />
                        <x-input-error :messages="$errors->get('secret')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-primary-button>{{ __('Create Stamp') }}</x-primary-button>
                    </div>
                </form>
            </section>
        </div>

    </div>
</x-app-layout>
