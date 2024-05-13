<?php

namespace App\Exports;

use App\Models\Spp;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class AllSppExport implements FromView, WithEvents, ShouldAutoSize, WithColumnWidths
{
    use Exportable;
    private $data;
    private $months;
    private $tahunajaran;
    private $kelompok;


    public function __construct($data, $months, $tahunajaran, $kelompok)
    {
        $this->tahunajaran = $tahunajaran;
        $this->kelompok = $kelompok;
        $this->data = $data;
        $this->months = $months;
    }
    /**
     * @return \Illuminate\Support\Collection
     */

    public function view(): View
    {
        return view('export.exportallspp', [
            'datas' => $this->data,
            'months' => $this->months,
            'tahunajaran' => $this->tahunajaran,
            'kelompok' => $this->kelompok

        ]);
    }


    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $lastColumn = $event->sheet->getHighestColumn();
                $lastRow = $event->sheet->getHighestRow();

                $range = 'A5:' . $lastColumn . $lastRow;

                $event->sheet->getStyle($range)->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '#000000'],
                        ],
                    ],
                ]);

                // Mendapatkan huruf kolom teratas dalam lembar kerja
                $highestColumn = $event->sheet->getHighestColumn();

                // Mendapatkan baris terakhir yang berisi data di kolom A
                $highestRow = $event->sheet->getHighestRow();

                // Menggabungkan rentang sel dari A5 hingga baris terakhir di kolom A
                $range = 'A5:' . $highestColumn . $highestRow;

                // Mengatur posisi teks menjadi tengah secara horizontal untuk rentang sel tersebut
                $event->sheet->getStyle($range)->getAlignment()->setHorizontal('center')->setVertical('center');
                // ------------------------------------------------------------------------------------
                // Mendapatkan baris terakhir yang berisi data di kolom B
                $highestRow = $event->sheet->getHighestRow();

                // Menggabungkan rentang sel dari D6 hingga baris terakhir di kolom B
                $range = 'B6:B' . $highestRow;

                // Mengatur posisi teks menjadi rata kiri secara horizontal untuk rentang sel tersebut
                $event->sheet->getStyle($range)->getAlignment()->setHorizontal('left');
                // ------------------------------------------------------------------------------------
                $highestColumnLetter = $event->sheet->getHighestColumn();

                // Menggabungkan sel dari A1 hingga sel tertinggi
                $event->sheet->mergeCells('A1:' . $highestColumnLetter . '1');
                $event->sheet->mergeCells('A2:' . $highestColumnLetter . '2');
                $event->sheet->mergeCells('A3:' . $highestColumnLetter . '3');

                // Posisi judul ke tengah secara horizontal
                $event->sheet->getStyle('A1:' . $highestColumnLetter . '3')->getAlignment()->setHorizontal('center');
            }
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 5,
        ];
    }
}
