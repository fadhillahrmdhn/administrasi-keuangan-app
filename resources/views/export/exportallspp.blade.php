<h2>REKAP PEMBAYARAN SPP</h2>
<h2>RA. BINA TUNAS NUSANTARA</h2>
<h2>TAHUN PELAJARAN {{ $tahunajaran }}</h2>
<h2>KELOMPOK: {{ $kelompok }}</h2>
<table>
    <thead>
        <tr>
            <th rowspan="2">No</th>
            <th rowspan="2">Name</th>
            <th colspan="12">
                Pembayaran SPP
            </th>
            <th rowspan="2">
                Total Pembayaran
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            @foreach($months as $monthNumber => $monthName)
            <th>
                {{ $monthName }}
            </th>
            @endforeach
        </tr>
        @foreach($datas as $data)
        @php
        $total = 0; // Menginisialisasi total pembayaran
        @endphp
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $data->user->name }}</td>
            @foreach($months as $monthNumber => $monthName)
            <th>
                @if(empty($data->hargaSpp->$monthName))
                <!-- Jika harga SPP kosong -->
                @else
                @php
                    $hargaspptotal = number_format($data->hargaSpp->$monthName, 0, ',', '.');
                @endphp
                Rp{{ $hargaspptotal }}
                @endif
            </th>
            @php
            $total += $data->hargaSpp->$monthName; // Menambahkan nilai bulanan ke total pembayaran
            $formattedTotal = number_format($total, 0, ',', '.'); // Format total dengan titik sebagai pemisah ribuan
        @endphp
        
            @endforeach
            <td>Rp{{$formattedTotal}}</td>
        </tr>
        @endforeach
    </tbody>
</table>