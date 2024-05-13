<x-guest-layout>
    <div class="mb-5">
        <h1 class="font-poppins text-xl font-semibold">Lupa kata sandi
            Anda? Tidak masalah.</h1>
        <h1 class=" text-sm text-gray-600">Cukup beri tahu kami alamat email Anda dan kami akan mengirimkan tautan
            pengaturan ulang kata sandi melalui
            email.</h1>
    </div>


    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"
                autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>