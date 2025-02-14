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

            <!-- Edit User Form -->
            <section id="edit-user">
                <h1 class="text-3xl font-semibold mb-6">Edit User</h1>

                <div class="bg-white shadow-lg rounded-lg p-6 w-full max-w-4xl mx-auto">
                    <form method="POST" action="{{ route('admin.updateUser', $user->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" name="name" :value="$user->name" required class="block mt-1 w-full" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" name="email" type="email" :value="$user->email" required class="block mt-1 w-full" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="poly" :value="__('Poly')" />
                            <x-text-input id="poly" name="poly" :value="$user->poly" class="block mt-1 w-full" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="major" :value="__('Major')" />
                            <x-text-input id="major" name="major" :value="$user->major" class="block mt-1 w-full" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="marketing" :value="__('Marketing')" />
                            <input type="checkbox" id="marketing" name="marketing" value="1" {{ $user->marketing ? 'checked' : '' }} class="border-gray-300 rounded-md shadow-sm">
                        </div>

                        <div class="mb-4">
                            <x-input-label for="role" :value="__('Role')" />
                            <select id="role" name="role" class="block mt-1 w-full">
                                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="customer" {{ $user->role === 'customer' ? 'selected' : '' }}>Customer</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <x-primary-button>{{ __('Update User') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
