<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row container ">
            <h2
                class=" sm:hidden font-montserrat font-bold text-xl text-gray-800 leading-tight my-auto mx-auto pt-2 pb-6">
                {{ __('DATA PEMBAYARAN/IURAN SPP') }}
                <hr class="border-slate-950">
            </h2>

            <table>
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
                class="hidden sm:inline font-montserrat font-bold text-2xl text-gray-800 leading-tight my-auto lg:mx-auto ml-5 lg:w-3/6">
                {{ __('DATA PEMBAYARAN/IURAN SPP') }}
            </h2>
        </div>
    </x-slot>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg max-w-3xl m-auto mt-5 mb-5 container">

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
                        $formattedTotal = number_format($spp->hargaSpp->$monthName, 0, ',', '.'); // Format total dengan titik sebagai pemisah ribuan
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
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-app-layout>