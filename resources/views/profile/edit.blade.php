<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    @if (session()->has('success'))
    <script>
        Swal.fire({
            icon: "success",
            text: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 2500
            });
    </script>
    @endif
    @if (session()->has('error'))
    <script>
        Swal.fire({
            icon: "error",
            text: "{{ session('error') }}",
            showConfirmButton: false,
            timer: 2500
            });
    </script>
    @endif
</x-app-layout>