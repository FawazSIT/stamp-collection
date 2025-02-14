<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Poly -->
        <div class="mt-4">
            <x-input-label for="poly" :value="__('Poly')" />
            <select id="poly" name="poly" class="block mt-1 w-full">
                <option value="Singapore Polytechnic" {{ old('poly') == 'glasgow' ? 'selected' : '' }}>Singapore Polytechnic</option>
                <option value="Nanyang Polytechnic" {{ old('poly') == 'glasgow' ? 'selected' : '' }}>Nanyang Polytechnic</option>
                <option value="Temasek Polytechnic" {{ old('poly') == 'glasgow' ? 'selected' : '' }}>Temasek Polytechnic</option>
                <option value="Ngee Ann Polytechnic" {{ old('poly') == 'glasgow' ? 'selected' : '' }}>Ngee Ann Polytechnic</option>
                <option value="Republic Polytechnic" {{ old('poly') == 'glasgow' ? 'selected' : '' }}>Republic Polytechnic</option>
                <option value="other" {{ old('poly') == 'other' ? 'selected' : '' }}>Other</option>
            </select>
            <x-input-error :messages="$errors->get('poly')" class="mt-2" />
        </div>

        <!-- Major -->
        <div class="mt-4">
            <x-input-label for="major" :value="__('Major')" />
            <x-text-input id="major" class="block mt-1 w-full" type="text" name="major" :value="old('major')" />
            <x-input-error :messages="$errors->get('major')" class="mt-2" />
        </div>

        <!-- Receive Program Info -->
        <div class="mt-4">
            <label for="marketing" class="inline-flex items-center">
                <input id="marketing" name="marketing" type="checkbox" class="form-checkbox" value="1" {{ old('marketing') ? 'checked' : '' }}>
                <span class="ml-2 text-sm text-gray-600">{{ __('Receive Program Info') }}</span>
            </label>
            <x-input-error :messages="$errors->get('marketing')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
