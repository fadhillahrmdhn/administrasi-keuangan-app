<x-app-layout>
    <x-slot name="header">
        <nav class="flex sm:justify-end mb-2 sm:mb-0" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="/spp"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 ">
                        SPP
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <a href="/spp/{{ $spp->id }}"
                            class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 ">Detail
                            SPP</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 ">Edit Data SPP</span>
                    </div>
                </li>
            </ol>
        </nav>
        <div class="flex flex-col sm:flex-row container min-w-full">
            <h2
                class=" sm:hidden font-montserrat font-bold text-xl text-gray-800 leading-tight my-auto mx-auto pt-2 pb-6">
                {{ __('EDIT DATA SPP') }}
                <hr class="border-slate-950">
            </h2>
            <table class="max-w-fit">
                <tr>
                    <td>Nama</td>
                    <td class=" px-1">:</td>
                    <td> {{ $spp->user->name }}</td>
                </tr>
                <tr>
                    <td>Kelompok</td>
                    <td class="px-1">:</td>
                    <td> {{ $spp->kelompok }}</td>
                </tr>
                <tr>
                    <td>Tahun Ajaran</td>
                    <td class="px-1">:</td>
                    <td> {{ $spp->tahun_ajaran }}</td>
                </tr>
                <tr>
                    <td>Bulan</td>
                    <td class="px-1">:</td>
                    <td> {{ $bulanspp }}</td>
                </tr>
            </table>
            <h2
                class="hidden sm:inline font-montserrat font-bold text-2xl text-gray-800 leading-tight my-auto lg:mx-auto ml-5 lg:w-2/6">
                {{ __('EDIT DATA SPP') }}
            </h2>
        </div>
    </x-slot>

    <div class="flex justify-center items-center mt-10 container">
        <form class="max-w-xs w-full" action="/spp/detail/{{ $hargaspp->id }}" method="POST">
            @csrf
            @method("PUT")
            <input hidden type="text" name="id" value="{{ $spp->id }}">
            <div class="mb-5">
                <label for="selectharga" class="block mb-2 text-sm font-medium text-gray-900">Besar SPP</label>
                <select id="selectharga" name="hargasekarang" class="w-full" required
                    oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" />
                <option value="110000" {{ $hargaspp->$bulanspp =='110000' ? 'selected' : '' }}>Rp110.000</option>
                <option value="135000" {{ $hargaspp->$bulanspp =='135000' ? 'selected' : '' }}>Rp135.000</option>
                </select>
                <input hidden type="text" name="bulan" value="{{ $bulanspp }}">
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