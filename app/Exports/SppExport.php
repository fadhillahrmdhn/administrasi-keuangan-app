<?php

namespace App\Exports;

use App\Models\Spp;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class SppExport implements FromView, WithEvents, ShouldAutoSize, WithColumnWidths
{
    use Exportable;
    private $spp;
    private $months;


    public function __construct($spp, $months)
    {
        $this->spp = $spp;
        $this->months = $months;
    }
    /**
     * @return \Illuminate\Support\Collection
     */

    public function view(): View
    {
        return view('export.SppExport', [
            'spp' => $this->spp,
            'months' => $this->months,
        ]);
    }


    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $lastColumn = $event->sheet->getHighestColumn();
                $lastRow = $event->sheet->getHighestRow();

                $range = 'A4:' . $lastColumn . $lastRow;

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
                $range = 'A4:' . $highestColumn . $highestRow;

                // Mengatur posisi teks menjadi tengah secara horizontal untuk rentang sel tersebut
                $event->sheet->getStyle($range)->getAlignment()->setHorizontal('center');
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
