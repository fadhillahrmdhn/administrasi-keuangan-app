<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use Illuminate\Http\Request;

class UserSppController extends Controller
{
    public function index()
    {

        $months = [
            'juli' => 'Juli',
            'agustus' => 'Agustus',
            'september' => 'September',
            'oktober' => 'Oktober',
            'november' => 'November',
            'desember' => 'Desember',
            'januari' => 'Januari',
            'februari' => 'Februari',
            'maret' => 'Maret',
            'april' => 'April',
            'mei' => 'Mei',
            'juni' => 'Juni'
        ];

        $userId = auth()->user()->id;
        // $userSpps = Spp::where('user_id', $userId)->get();

        $kelompoka1 = Spp::where('user_id', $userId)
            ->where('kelompok', 'A1')
            ->exists();
        $kelompoka = Spp::where('user_id', $userId)
            ->where('kelompok', 'A')
            ->exists();
        $kelompokb = Spp::where('user_id', $userId)
            ->where('kelompok', 'B')
            ->exists();
        $userspp = null;

        if ($kelompokb) {
            $userspp = Spp::where('user_id', $userId)
                ->where('kelompok', 'B')
                ->first();
        } elseif ($kelompoka) {
            $userspp = Spp::where('user_id', $userId)
                ->where('kelompok', 'A')
                ->first();
        } elseif ($kelompoka1) {
            $userspp = Spp::where('user_id', $userId)
                ->where('kelompok', 'A1')
                ->first();
        } else {
            return view('spp.user.indexzero', [
                'spp' => auth()->user()->name,
            ]);
        }
        // Lakukan sesuatu dengan data pengguna
        return view('spp.user.index', [
            'spp' => $userspp,
            'months' => $months
        ]);
    }
}