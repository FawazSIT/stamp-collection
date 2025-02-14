<x-app-layout>
    <div class="flex">

        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 text-white min-h-screen p-5">
            <h2 class="text-2xl font-semibold text-center text-white mb-6">Admin Portal</h2>
            <ul class="space-y-4">
                <li><a href="/dashboard" class="hover:text-blue-400">Dashboard</a></li>
                <li><a href="/dashboard#user-management" class="hover:text-blue-400">User Management</a></li>
                <li><a href="/dashboard#stamp-management" class="hover:text-blue-400">Stamp Management</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6">

            <!-- Edit Stamp Form -->
            <section id="edit-stamp">
                <h1 class="text-3xl font-semibold mb-6">Edit Stamp</h1>

                <div class="bg-white shadow-lg rounded-lg p-6 w-full max-w-4xl mx-auto">
                    <form method="POST" action="{{ route('admin.updateStamp', $stamp->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <x-input-label for="number" :value="__('Stamp Number')" />
                            <x-text-input id="number" name="number" type="number" :value="$stamp->number" required class="block mt-1 w-full" />
                            <x-input-error :messages="$errors->get('number')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="owner" :value="__('Owner')" />
                            <x-text-input id="owner" name="owner" type="text" :value="$stamp->owner" required class="block mt-1 w-full" />
                            <x-input-error :messages="$errors->get('owner')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="secret" :value="__('Secret')" />
                            <x-text-input id="secret" name="secret" type="text" :value="$stamp->secret" required class="block mt-1 w-full" />
                            <x-input-error :messages="$errors->get('secret')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-primary-button>{{ __('Update Stamp') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
