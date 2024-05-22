<x-app-layout>
    <x-slot name="header">
        <nav class="flex sm:justify-end mb-4 sm:mb-0" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="/user"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 ">
                        Pengguna
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 ">Edit Pengguna</span>
                    </div>
                </li>
            </ol>
        </nav>
        <h2 class="font-montserrat font-bold text-2xl text-gray-800 leading-tight flex justify-center">
            {{ __('Edit Pengguna') }}
        </h2>
    </x-slot>

    <div class="flex justify-center items-center mt-5 container">
        <form class="max-w-sm w-full" action="/user/{{$user->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-5">
                <label for="nameortu" class="block mb-2 text-sm font-medium text-gray-900">Nama Orang Tua Siswa</label>
                <input type="text" id="nameortu" name="nameortu"
                    class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('nameortu') border-red-500 @enderror"
                    value="{{ old('nameortu', $user->nameortu) }}" required
                    oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" />
                @error('nameortu')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama Siswa</label>
                <input type="text" id="name" name="name"
                    class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('name') border-red-500 @enderror"
                    value="{{ old('name', $user->name) }}" required
                    oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" />
                @error('name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="nisn" class="block mb-2 text-sm font-medium text-gray-900">NISN</label>
                <input type="text" id="nisn" name="nisn"
                    class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('nisn') border-red-500 @enderror"
                    value="{{ old('nisn', $user->nisn) }}" required
                    oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" />
                @error('nisn')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                <input type="email" id="email" name="email"
                    class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('email') border-red-500 @enderror"
                    value="{{ old('email', $user->email) }}" required
                    oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" />
                @error('email')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    @if ($errors->any())
    <script>
    Swal.fire({
        icon: 'error',
        title: 'Data gagal diperbarui',
        text: 'Data tersebut sudah ada, silahkan cek kembali'
    });
    </script>
    @endif



</x-app-layout>