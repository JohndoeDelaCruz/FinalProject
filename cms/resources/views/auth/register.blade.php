<x-guest-layout>
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-gray-900">
            {{ __('Create an Account') }}
        </h2>
        <p class="mt-2 text-gray-600">
            {{ __('Join us and get started with managing your contacts today') }}
        </p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Full name')" class="text-gray-700 font-medium text-sm" />
            <div class="mt-1">
                <x-text-input id="name" 
                    class="block w-full px-4 py-3 border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                    type="text" 
                    name="name" 
                    :value="old('name')" 
                    placeholder="John Doe"
                    required autofocus autocomplete="name" />
            </div>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email address')" class="text-gray-700 font-medium text-sm" />
            <div class="mt-1">
                <x-text-input id="email" 
                    class="block w-full px-4 py-3 border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                    type="email" 
                    name="email" 
                    :value="old('email')" 
                    placeholder="your@email.com"
                    required autocomplete="username" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" class="text-gray-700 font-medium text-sm" />
            <div class="mt-1">
                <x-text-input id="password" 
                    class="block w-full px-4 py-3 border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    type="password"
                    name="password"
                    placeholder="••••••••"
                    required autocomplete="new-password" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm password')" class="text-gray-700 font-medium text-sm" />
            <div class="mt-1">
                <x-text-input id="password_confirmation" 
                    class="block w-full px-4 py-3 border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    type="password"
                    name="password_confirmation" 
                    placeholder="••••••••"
                    required autocomplete="new-password" />
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Terms & Privacy Policy -->
        <div class="flex items-start">
            <div class="flex items-center h-5">
                <input id="terms" name="terms" type="checkbox" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500" required>
            </div>
            <div class="ml-3 text-sm">
                <label for="terms" class="text-gray-700">
                    {{ __('I agree to the') }}
                    <a href="#" class="text-blue-600 hover:text-blue-500">{{ __('Terms of Service') }}</a>
                    {{ __('and') }}
                    <a href="#" class="text-blue-600 hover:text-blue-500">{{ __('Privacy Policy') }}</a>
                </label>
            </div>
        </div>

        <div>
            <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-base font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150">
                {{ __('Create account') }}
            </button>
        </div>
    </form>

    <div class="mt-8 text-center">
        <p class="text-sm text-gray-600">
            {{ __('Already have an account?') }}
            <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:text-blue-500">
                {{ __('Sign in') }}
            </a>
        </p>
    </div>
</x-guest-layout>
