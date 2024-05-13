<section>
    <header>
        <h1 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h1>
        <hr>
    </header>

    <div class="mt-6 space-y-6">


        <div>
            <h3>Nama: {{ $user->name }}</h3>
        </div>

        <div>
            {{-- user --}}
            @if (!auth()->user()->is_admin)
            <h3>NISN: {{ $user->nisn }}</h3>
            @endif
        </div>

        <div>
            <h3>Email: {{ $user->email }}</h3>
        </div>

    </div>
</section>