<x-app-layout>
    <x-slot name="header">
        <nav class="flex sm:justify-end mb-4 sm:mb-0" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="/siswa"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 ">
                        Siswa
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 ">Tambah Data Siswa</span>
                    </div>
                </li>
            </ol>
        </nav>
        <h2 class="font-montserrat font-bold text-2xl text-gray-800 leading-tight flex justify-center">
            {{ __('TAMBAH DATA SISWA') }}
        </h2>
    </x-slot>

    <div class="flex justify-center items-center mt-10 container">
        <form class="max-w-xs w-full" action="/siswa" method="POST">
            @csrf
            <div class="mb-5">
                <label for="Selectnamasiswa" class="block mb-2 text-sm font-medium text-gray-900">Nama siswa:</label>
                <select id="selectnamasiswa" class="w-full" name="user_id" required
                    oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                    <option value="">select...</option>
                    @foreach ($users as $user)
                    @if (old('user_id') == $user->id)
                    <option value="{{ $user->id }}" selected>{{ $user->name.' - '.$user->nisn }}
                    </option>
                    @endif
                    <option value="{{ $user->id }}">{{ $user->name.' - '.$user->nisn }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-5">
                <label for="selecteditkelompok" class="block mb-2 text-sm font-medium text-gray-900">Kelompok</label>
                <select id="selecteditkelompok" name="kelompok" class="w-full" required
                    oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" />
                <option value="">select...</option>
                <option value="A1" {{ old('kelompok')=='A1' ? 'selected' : '' }}>A1</option>
                <option value="A" {{ old('kelompok')=='A' ? 'selected' : '' }}>A</option>
                <option value="B" {{ old('kelompok')=='B' ? 'selected' : '' }}>B</option>
                </select>
                @error('kelompok')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    @if (session()->has('error'))
    <script>
    Swal.fire({
        icon: 'error',
        title: 'Data gagal ditambahkan',
        text: "{{ session('error') }}"
    });
    </script>
    @endif



</x-app-layout>