<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use Illuminate\Http\Request;
use Carbon\Carbon;

class dashboardController extends Controller
{
    public function index(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tahunSekarang = now()->year;
        $tahunDepan = now()->addYears(1)->year;
        $tahunajaran = $tahunSekarang . '-' . $tahunDepan;
        $kelompoka = Spp::where('kelompok', 'A')
            ->where('tahun_ajaran', $tahunajaran)
            ->count();
        $kelompoka1 = Spp::where('kelompok', 'A1')
            ->where('tahun_ajaran', $tahunajaran)
            ->count();
        $kelompokb = Spp::where('kelompok', 'B')
            ->where('tahun_ajaran', $tahunajaran)
            ->count();
    
        // Atur lokal menjadi bahasa Indonesia
        setlocale(LC_TIME, 'id_ID');
        // Mendapatkan bulan saat ini dalam bahasa Indonesia
        $bulan_ini = Carbon::now()->locale('id')->monthName;;
        $tanggal = now()->format('d-m-Y');
        $transaksispps =  Spp::where($bulan_ini, $tanggal)->get();
    
        return view('dashboard', [
            'tahunajaran' => $tahunajaran,
            'kelompoka' => $kelompoka,
            'kelompoka1' => $kelompoka1,
            'kelompokb' => $kelompokb,
            'bulanini' => $bulan_ini,
            'transaksispps' => $transaksispps
        ]);
    }

}