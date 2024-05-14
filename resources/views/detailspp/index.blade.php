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
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 ">Detail SPP</span>
                    </div>
                </li>
            </ol>
        </nav>
        <div class="flex flex-col sm:flex-row container ">
            <h2
                class=" sm:hidden font-montserrat font-bold text-xl text-gray-800 leading-tight my-auto mx-auto pt-2 pb-6">
                {{ __('DETAIL SPP') }}
                <hr class="border-slate-950">
            </h2>
            <table class="max-w-fit">
                <tr>
                    <td>Nama</td>
                    <td class="px-1">:</td>
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
            </table>
            <h2
                class="hidden sm:inline font-montserrat font-bold text-2xl text-gray-800 leading-tight my-auto lg:mx-auto ml-5 lg:w-2/6">
                {{ __('DETAIL SPP') }}
            </h2>

        </div>

    </x-slot>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg max-w-3xl m-auto mt-5 mb-5 container">
        <div class="flex flex-row-reverse pb-4 pt-1 container">
            <div>
                <!-- button tambah data -->
                <form method="POST" action="{{ route('spp.detail.create') }}" class="inline">
                    @csrf
                    <input hidden name="id" value="{{ $spp->id }}">
                    <button type="submit"
                        class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2">
                        <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 12h14m-7 7V5" />
                        </svg>
                        tambah data
                    </button>
                </form>

                <!-- button Export-->
                <form method="POST" action={{ route('spp.export') }} class="inline">
                    @csrf
                    <input hidden name="id" value="{{ $spp->id }}">
                    <button type="submit"
                        class="text-white bg-violet-600 hover:bg-violet-700 focus:ring-4 focus:outline-none focus:ring-violet-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2">
                        <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M9 7V2.221a2 2 0 0 0-.5.365L4.586 6.5a2 2 0 0 0-.365.5H9Zm2 0V2h7a2 2 0 0 1 2 2v9.293l-2-2a1 1 0 0 0-1.414 1.414l.293.293h-6.586a1 1 0 1 0 0 2h6.586l-.293.293A1 1 0 0 0 18 16.707l2-2V20a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Z"
                                clip-rule="evenodd" />
                        </svg>
                        Export Data
                    </button>
                </form>
            </div>
        </div>

        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-green-200">
                <tr>
                    <th scope="col" class="px-2 py-3 text-center">
                        No
                    </th>
                    <th scope="col" class="px-2 py-3 text-center">
                        Bulan
                    </th>
                    <th scope="col" class="px-2 py-3 text-center">
                        Tanggal
                    </th>
                    <th scope="col" class="px-2 py-3 text-center">
                        Besar SPP
                    </th>
                    <th scope="col" class="px-2 py-3 text-center">
                        Status
                    </th>
                    <th scope="col" class="px-2 py-3 text-center">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($months as $monthNumber => $monthName)
                <tr class="bg-white border-b   hover:bg-gray-50 ">
                    <td class="px-2 py-3 text-center">
                        {{ $loop->iteration }}
                    </td>
                    <td scope="row" class="px-2 py-3 font-medium text-gray-900 whitespace-nowrap text-center">
                        {{ $monthName }}
                    </td>
                    <td class="px-2 py-3 text-center">
                        @if(!empty($spp->$monthName))
                        {{$spp->$monthName}}
                        @else
                        -
                        @endif
                    </td>
                    <td class="px-2 py-3 text-center">
                        @if(!empty($spp->hargaSpp->$monthName))
                        @php
                        $formattedTotal = number_format($spp->hargaSpp->$monthName, 0, ',', '.'); 
                        @endphp
                        Rp{{ $formattedTotal }}
                        @else
                        -
                        @endif
                    </td>
                    <td class="px-2 py-3 text-center">
                        @if(!empty($spp->$monthName))
                        lunas
                        @else
                        Belum lunas
                        @endif
                    </td>
                    <td class="px-2 py-3">
                        @if(!empty($spp->$monthName))
                        <div class="flex justify-center items-center space-x-1">
                            <!-- button edit data -->
                            <form method="POST" action="{{ route('spp.detail.edit') }}" class="inline">
                                @csrf
                                <input hidden name="sppid" value="{{ $spp->id }}">
                                <input hidden name="hargasppid" value="{{ $spp->hargaSpp->id }}">
                                <input hidden name="bulanspp" value="{{$monthName}}">
                                <button type="submit" class="px-3 py-2 text-sm font-medium text-center inline-flex items-center text-white
                                bg-yellow-500 rounded-lg hover:bg-yellow-600 focus:ring-4 focus:outline-none
                                focus:ring-yellow-300">
                                    <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                    </svg>

                                    Edit
                                </button>
                            </form>


                            <form id="deleteForm{{$loop->iteration}}" action="/spp/detail/{{$spp->hargaSpp->id}}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <input hidden type="text" name="bulan" value="{{ $monthName }}">
                                <button onclick="confirmDelete({{$loop->iteration}})" type="button"
                                    class="px-3 py-2 text-sm font-medium text-center inline-flex items-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300">
                                    <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                    </svg>
                                    Hapus
                                </button>
                            </form>
                        </div>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-------- script js -------------}}

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    {{-- alert berhasil --}}
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
        icon: 'error',
        title: 'Data gagal ditambahkan',
        text: "{{ session('error') }}"
    });
    </script>
    @endif

    @if (session()->has('errorupdate'))
    <script>
    Swal.fire({
        icon: 'error',
        title: 'Data gagal diperbarui',
        text: "{{ session('errorupdate') }}"
    });
    </script>
    @endif


    <script>
    function confirmDelete(hargaId) {
        Swal.fire({
            title: "Apakah kamu yakin?",
            text: "Data spp dari pengguna ini akan dihapus dan tidak dapat dikembalikan!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Hapus",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById("deleteForm" + hargaId).submit();
            }
        });
    }
    </script>

</x-app-layout>