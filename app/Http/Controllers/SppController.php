<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Spp;
use App\Models\User;
use App\Models\HargaSpp;
use App\Exports\SppExport;
use Illuminate\Http\Request;
use App\Exports\AllSppExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StoreSppRequest;
use App\Http\Requests\UpdateSppRequest;

class SppController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pagination = 10;
        $query = Spp::query();

        if ($request->has('keyword')) {
            $keyword = $request->keyword;

            $query->whereHas('user', function ($query) use ($keyword) {
                $query->where('name', 'like', "%{$keyword}%")
                    ->orWhere('nisn', 'like', "%{$keyword}%");
            });
        }

        $spps = $query->orderBy('created_at', 'desc')->paginate($pagination);

        $spps->appends($request->only('keyword'));

        $tahunjaran = Spp::distinct()->pluck('tahun_ajaran')->toArray();

        return view('spp.index', [
            'spps' => $spps,
            'tahunajaran' => $tahunjaran
        ])->with('i', ($request->input('page', 1) - 1) * $pagination);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSppRequest $request)
    {

    }



    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $spp = spp::find($id);

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
        return view('detailspp.index', [
            'spp' => $spp,
            'months' => $months

        ]);
    }

    /**s
     * Show the form for editing the specified resource.
     */
    public function edit(Spp $spp)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSppRequest $request, Spp $spp)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Spp $spp)
    {
        Spp::destroy($spp->id);
        return redirect('/siswa')->with('success', 'Data berhasil dihapus');
    }

    public function allexport(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tahunajaran = $request->tahunajaran;
        $kelompok = $request->kelompok;

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

        $data = Spp::where('tahun_ajaran', $tahunajaran)
            ->where('kelompok', $kelompok)
            ->get();



        if ($data->isEmpty()) {
            return redirect()->back()->with('errorexport', 'Data kelompok pada tahun ajaran tersebut tidak ada, silahkan cek kembali');
        } else {
            return (new AllSppExport($data, $months, $tahunajaran, $kelompok))->download('spp_siswa_kelompok_'. $kelompok ."_".$tahunajaran."-" . Carbon::now()->timestamp . '.xlsx');
        }
    }

    public function export(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $id = $request->id;
        $spp = spp::find($id);

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

        return (new SppExport($spp, $months))->download('spp_'.$spp->user->name."-" . Carbon::now()->timestamp . '.xlsx');
    }
}