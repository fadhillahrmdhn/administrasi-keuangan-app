<h3>Nama: {{ $spp->user->name }}</h3>

<h3>Kelompok: {{ $spp->kelompok }}</h3>

<h3>Tahun Ajaran: {{ $spp->tahun_ajaran }}</h3>



<table>
    <thead>
        <tr>
            <th>
                No
            </th>
            <th>
                Bulan
            </th>
            <th>
                Tanggal
            </th>
            <th>
                Besar SPP
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach($months as $monthNumber => $monthName)
        <tr>
            <td>
                {{ $loop->iteration }}
            </td>
            <td>
                {{ $monthName }}
            </td>
            <td>
                @if(!empty($spp->$monthName))
                {{$spp->$monthName}}
                @else

                @endif
            </td>
            <td>
                @if(!empty($spp->hargaSpp->$monthName))
                @php
                $formattedTotal = number_format($spp->hargaSpp->$monthName, 0, ',', '.'); // Format total dengan titik sebagai pemisah ribuan
            @endphp
                Rp{{ $formattedTotal }}
                @else

                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>