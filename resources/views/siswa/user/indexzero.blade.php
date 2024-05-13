<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row container ">
            <h2 class=" sm:hidden font-montserrat font-bold text-xl text-gray-800 leading-tight my-auto mx-auto pt-2 pb-6">
                {{ __('DATA PEMBAYARAN/IURAN SPP') }}
            <hr class="border-slate-950">                
            </h2>

            <table class="max-w-fit">
                <tr>
                    <td>Nama</td>
                    <td class="px-1">:</td>
                    <td> {{ $spp }}</td>
                </tr>
                <tr>
                    <td>Kelompok</td>
                    <td class="px-1">:</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Tahun Ajaran</td>
                    <td class="px-1">:</td>
                    <td></td>
                </tr>
            </table>
            <h2 class="hidden sm:inline font-montserrat font-bold text-2xl text-gray-800 leading-tight my-auto lg:mx-auto ml-5 lg:w-3/6">
                {{ __('DATA PEMBAYARAN/IURAN SPP') }}
            </h2>
        </div>
    </x-slot>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg max-w-3xl m-auto mt-5 mb-5 container">

    </div>

</x-app-layout>