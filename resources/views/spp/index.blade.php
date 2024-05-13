<x-app-layout>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg max-w-4xl m-auto mt-5 mb-5 container">
        <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
            <div>
                <!-- button tambah data -->
                <a href="/spp/create"
                    class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2">
                    <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 12h14m-7 7V5" />
                    </svg>
                    tambah data
                </a>

                <!-- button cetak -->
                <button data-modal-target="modal-cetak" data-modal-toggle="modal-cetak" type="button"
                    class="text-white bg-violet-600 hover:bg-violet-700 focus:ring-4 focus:outline-none focus:ring-violet-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2">
                    <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M9 7V2.221a2 2 0 0 0-.5.365L4.586 6.5a2 2 0 0 0-.365.5H9Zm2 0V2h7a2 2 0 0 1 2 2v9.293l-2-2a1 1 0 0 0-1.414 1.414l.293.293h-6.586a1 1 0 1 0 0 2h6.586l-.293.293A1 1 0 0 0 18 16.707l2-2V20a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Z"
                            clip-rule="evenodd" />
                    </svg>


                    Export to Excel
                </button>
            </div>

            <div class="sm:max-w-xs  pt-1 sm:pr-2 container">
                <form action="{{ url()->current() }}" method="get">
                    <label for="default-search" class=" text-sm font-medium text-gray-900 sr-only ">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="search" id="default-search"
                            class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Search name, nisn.." name="keyword" value="{{ request('keyword') }}" />
                        <button type="submit"
                            class="text-white absolute end-2.5 bottom-1 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-1">Search</button>
                    </div>
                </form>
            </div>
        </div>

        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-green-200">
                <tr>
                    <th scope="col" class="pl-2 py-3 text-center">
                        No
                    </th>
                    <th scope="col" class="px-2 py-3 text-center">
                        Siswa
                    </th>
                    <th scope="col" class="px-2 py-3 text-center">
                        Nisn
                    </th>
                    <th scope="col" class="px-2 py-3 text-center">
                        Kelompok
                    </th>
                    <th scope="col" class="px-2 py-3 text-center">
                        Tahun Ajaran
                    </th>
                    <th scope="col" class="px-2 py-3 text-center">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @if($spps->isEmpty())
                <tr class="bg-white border-b   hover:bg-gray-50 ">
                    <td class="pl-2 py-3 text-center">
                        -
                    </td>
                    <td scope="row" class="px-2 py-3 font-medium text-gray-900 whitespace-nowrap text-center">
                        -
                    </td>
                    <td class="px-2 py-3 text-center">
                        -
                    </td>
                    <td class="px-2 py-3 text-center">
                        -
                    </td>
                    <td class="px-2 py-3">
                        <div class="flex justify-center items-center space-x-1">
                            -
                        </div>
                    </td>
                </tr>
                @else
                <!-- Tampilkan data pengguna -->
                @foreach ($spps as $spp)
                <tr class="bg-white border-b   hover:bg-gray-50 ">
                    <td class="pl-2 py-3 text-center">
                        {{ ++$i }}
                    </td>
                    <td scope="row" class="px-2 py-3 font-medium text-gray-900 whitespace-nowrap text-center">
                        {{ $spp->user->name }}
                    </td>
                    <td class="px-2 py-3 text-center">
                        {{ $spp->user->nisn }}
                    </td>
                    <td class="px-2 py-3 text-center">
                        {{ $spp->kelompok }}
                    </td>
                    <td class="px-2 py-3 text-center">
                        {{ $spp->tahun_ajaran }}
                    </td>
                    <td class="px-2 py-3">
                        <div class="flex justify-center items-center space-x-1">
                            <a href="/spp/{{ $spp->id }}"
                                class="px-3 py-2 text-sm font-medium text-center inline-flex items-center text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-width="2"
                                        d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                    <path stroke="currentColor" stroke-width="2"
                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>

                                View
                            </a>

                            <form id="deleteForm{{$spp->id}}" action="/spp/{{$spp->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button onclick="confirmDelete({{$spp->id}})" type="button"
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
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
        <div>
            {{ $spps->links() }}
        </div>
    </div>


    <!-- Main modal cetak -->
    <div id="modal-cetak" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full flex justify-center ">
        <div class="relative p-4 w-full max-w-md max-h-full ">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow border border-black">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                    <h3 class="text-xl font-semibold text-gray-900 ">
                        Export to Excel
                    </h3>
                    <button type="button"
                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        data-modal-hide="modal-cetak">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <form class="space-y-4" action={{ route('spp.allexport') }} method="POST">
                        @csrf
                        <div>
                            <table>
                                <tr>
                                    <td><label for="Selectnamasiswa"
                                            class="block mb-2 text-sm font-medium text-gray-900">Tahun Ajaran:</label>
                                    </td>
                                    <td class="pl-2"> <select id="selecttahunajaran" class=" operator w-56 container"
                                            name="tahunajaran" required
                                            oninvalid="this.setCustomValidity('Data tidak boleh kosong')"
                                            oninput="setCustomValidity('')">
                                            <option value="">select...</option>
                                            @foreach($tahunajaran as $tahun)
                                            <option value="{{ $tahun }}">{{ $tahun }}</option>
                                            @endforeach
                                        </select></td>
                                </tr>
                                <tr class="h-14">
                                    <td> <label for="Selectkelompokcetak">kelompok:</label></td>
                                    <td class="pl-2"> <select id="selectkelompokcetak" class="operator w-56 container"
                                            name="kelompok" required
                                            oninvalid="this.setCustomValidity('Data tidak boleh kosong')"
                                            oninput="setCustomValidity('')">
                                            <option value="">select...</option>
                                            <option value="A1">A1</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                        </select></td>
                                </tr>
                            </table>
                        </div>
                        <button type="submit"
                            class="w-1/3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center block m-auto">Export</button>
                    </form>
                </div>
            </div>
        </div>
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

    <!-- script menampilkan modal -->
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const modalToggleButtons = document.querySelectorAll("[data-modal-toggle]");

        modalToggleButtons.forEach(button => {
            button.addEventListener("click", function() {
                const modalId = this.dataset.modalTarget;
                const modal = document.getElementById(modalId);

                if (modal) {
                    modal.classList.toggle("hidden");
                    modal.setAttribute("aria-hidden", modal.classList.contains("hidden"));
                }
            });
        });

        const modalHideButtons = document.querySelectorAll("[data-modal-hide]");

        modalHideButtons.forEach(button => {
            button.addEventListener("click", function() {
                const modalId = this.dataset.modalHide;
                const modal = document.getElementById(modalId);

                if (modal) {
                    modal.classList.add("hidden");
                    modal.setAttribute("aria-hidden", "true");
                }
            });
        });
    });
    </script>

    @if (session()->has('error'))
    <script>
    Swal.fire({
        icon: 'error',
        title: 'Data gagal ditambahkan',
        text: "{{ session('error') }}"
    });
    </script>
    @endif

    @if (session()->has('errorexport'))
    <script>
    Swal.fire({
        icon: 'error',
        title: 'Gagal Export Excel ',
        text: "{{ session('errorexport') }}"
    });
    </script>
    @endif


    <script>
    function confirmDelete(sppId) {
        Swal.fire({
            title: "Apakah kamu yakin?",
            text: "semua data spp dari pengguna ini akan dihapus semua dan tidak dapat dikembalikan!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Hapus",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById("deleteForm" + sppId).submit();
            }
        });
    }
    </script>

</x-app-layout>