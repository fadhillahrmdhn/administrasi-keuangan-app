<x-guest-layout>
    <!-- Session Status -->

    <image src="{{ asset('image/logo.png') }}" class="max-w-40 mx-auto pt-1" alt="Custom Logo">

        <h1
            class="text-xl sm:text-2xl text-blue-700 [text-shadow:_0_1px_0_rgb(30_58_138_/_50%)] font-poppins font-bold text-center pt-1">
            SISTEM ADMINISTRASI KEUANGAN</h1>
        <h1
            class="text-xl sm:text-2xl text-blue-700 [text-shadow:_0_1px_0_rgb(30_58_138_/_50%)] font-poppins font-bold text-center mb-3">
            RA. BINA TUNAS
            NUSANTARA</h1>

        @if($errors->any())
        <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50"
            role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">Email atau Password Salah</span>
            </div>
        </div>
        @endif
        <x-auth-session-status class="mb-4 text-center" :status="session('status')" />
        <form method="POST" action="{{ route('login') }}" ">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for=" email" :value="__('Email')" />
        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
            oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" autofocus
            autocomplete="username" />
        {{-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"
                autocomplete="current-password" />

            {{-- <x-input-error :messages="$errors->get('password')" class="mt-2" /> --}}
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('password.request') }}">
                {{ __('Forgot Password?') }}
            </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
        </form>
</x-guest-layout>