<x-app-layout>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg max-w-4xl m-auto mt-5 mb-5 container">
        <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
            <div>
                <!-- button tambah data -->
                <a href="/user/create"
                    class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2">
                    <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 12h14m-7 7V5" />
                    </svg>
                    Tambah Data
                </a>
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
                        Orang tua siswa
                    </th>
                    <th scope="col" class="px-2 py-3 text-center">
                        Siswa
                    </th>
                    <th scope="col" class="px-2 py-3 text-center">
                        Nisn
                    </th>
                    <th scope="col" class="px-2 py-3 text-center">
                        Email
                    </th>
                    <th scope="col" class="px-2 py-3 text-center">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>

                @if($users->isEmpty())
                <tr class="bg-white border-b   hover:bg-gray-50 ">
                    <td class="pl-2 py-3 text-center">
                        -
                    </td>
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
                @foreach ($users as $user)
                <tr class="bg-white border-b   hover:bg-gray-50 ">
                    <td class="pl-2 py-3 text-center">
                        {{ ++$i }}
                    </td>
                    <td scope="row" class="px-2 py-3 font-medium text-gray-900 whitespace-nowrap text-center">
                        {{ $user->nameortu }}
                    </td>
                    <td scope="row" class="px-2 py-3 font-medium text-gray-900 whitespace-nowrap text-center">
                        {{ $user->name }}
                    </td>
                    <td class="px-2 py-3 text-center">
                        {{ $user->nisn }}
                    </td>
                    <td class="px-2 py-3 text-center">
                        {{ $user->email }}
                    </td>
                    <td class="px-2 py-3">
                        <div class="flex justify-center items-center space-x-1">
                            <a href={{route('user.edit', $user)}}
                                class="px-3 py-2 text-sm font-medium text-center inline-flex items-center text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-yellow-300">
                                <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                </svg>
                                Edit
                            </a>
                            <form id="deleteForm{{$user->id}}" action="/user/{{$user->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button onclick="confirmDelete({{$user->id}})" type="button"
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
            {{ $users->links() }}
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

    <script>
    function confirmDelete(userId) {
        Swal.fire({
            title: "Apakah kamu yakin?",
            text: "semua data spp siswa pada kelompok tersebut akan dihapus dan tidak dapat dikembalikan!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Hapus",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById("deleteForm" + userId).submit();
            }
        });
    }
    </script>

</x-app-layout>