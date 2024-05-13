<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-green-200 overflow-hidden shadow-sm sm:rounded-lg flex justify-between items-center">
                <div class="p-6 text-gray-900 font-robotopslap font-semibold">
                    {{ __("Assalamu'alaikum, ") . auth()->user()->name }}

                </div>
                <div class="p-6">
                    <p class="text-right font-robotopslap font-semibold">{{ \Carbon\Carbon::now()->locale('id')->isoFormat('dddd') }}, {{
                        \Carbon\Carbon::now()->locale('id')->isoFormat('D MMMM YYYY') }}</p>
                </div>
            </div>
        </div>


    </div>

    @can('admin')
    {{-- kelompok A --}}
    <div class="flex justify-center flex-col sm:flex-row items-center container">
        <div class="max-w-60 p-6 sm:mx-5 bg-white border border-gray-200 rounded-lg shadow mb-5 container">
            <svg class="w-10 h-10 text-green-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd"
                    d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z"
                    clip-rule="evenodd" />
            </svg>

            <p>tahun ajaran {{ $tahunajaran }}</p>
            <h5 class="mb-2 text-lg font-semibold tracking-tight text-gray-700 ">Total siswa kelompok A
            </h5>
            <h5 class="text-2xl sm:text-3xl font-bold text-gray-900 ">{{ $kelompoka }}</h5>
        </div>
        {{-- kelompok A1 --}}
        <div class="max-w-60 p-6 sm:mx-5 bg-white border border-gray-200 rounded-lg shadow mb-5 container">
            <svg class="w-10 h-10 text-green-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd"
                    d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z"
                    clip-rule="evenodd" />
            </svg>
            <p>tahun ajaran {{ $tahunajaran }}</p>
            <h5 class="mb-2 text-lg font-semibold tracking-tight text-gray-700 ">Total siswa kelompok A1
            </h5>
            <h5 class="text-2xl sm:text-3xl font-bold text-gray-900 ">{{ $kelompoka1 }}</h5>
        </div>

        {{-- kelompok B --}}
        <div class="max-w-60 p-6 sm:mx-5 bg-white border border-gray-200 rounded-lg shadow mb-5 container">
            <svg class="w-10 h-10 text-green-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd"
                    d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z"
                    clip-rule="evenodd" />
            </svg>
            <p>tahun ajaran {{ $tahunajaran }}</p>
            <h5 class="mb-2 text-lg font-semibold  text-gray-700 ">Total siswa kelompok B
            </h5>
            <h5 class="text-2xl sm:text-3xl font-bold text-gray-900 ">{{ $kelompokb }}</h5>
        </div>
    </div>
    @endcan

    @can('admin')
    <div class="bg-white max-w-lg mx-10 mt-7 shadow-md rounded-lg">
        <h2 class="font-bold font text-base text-center pt-5">TRANSAKSI SPP HARI INI</h2>
        <div class=" w-full h-52  mx-auto mt-5 overflow-y-scroll bg-fixed">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">

                <thead class="text-xs text-gray-700 uppercase bg-green-200 border-b">
                    <tr>
                        <th scope="col" class="pl-2 py-3 text-center">
                            No
                        </th>
                        <th scope="col" class="px-2 py-3 text-center">
                            Nama
                        </th>
                        <th scope="col" class="px-2 py-3 text-center">
                            NISN
                        </th>
                        <th scope="col" class="px-2 py-3 text-center">
                            Kelompok
                        </th>
                        <th scope="col" class="px-2 py-3 text-center">
                            Besar SPP
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if($transaksispps->isEmpty())
                    <tr>
                    </tr>
                    @else

                    <!-- Tampilkan data pengguna -->
                    @foreach ($transaksispps as $transaksispp)
                    <tr class="bg-white border-b   hover:bg-gray-50 ">
                        <td class="pl-2 py-3 text-center">
                            {{ $loop->iteration }}
                        </td>
                        <td scope="row" class="px-2 py-3 font-medium text-gray-900 whitespace-nowrap text-center">
                            {{ $transaksispp->user->name }}
                        </td>
                        <td scope="row" class="px-2 py-3 font-medium  whitespace-nowrap text-center">
                            {{ $transaksispp->user->nisn }}
                        </td>
                        <td class="px-2 py-3 text-center ">
                            {{ $transaksispp->kelompok }}
                        </td>
                        <td class="px-2 py-3 text-center flex flex-row text-emerald-500 font-semibold">
                            <svg class="w-5 h-5 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
                              </svg>
                              Rp.{{ $transaksispp->hargaSPP->$bulanini }}.000
                        </td>
                    </tr>
                    @endforeach
                    @endif

                </tbody>
            </table>
        </div>
    </div>
    @endcan
</x-app-layout>