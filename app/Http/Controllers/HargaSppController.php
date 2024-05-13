<?php

namespace App\Http\Controllers;

use App\Models\HargaSpp;
use App\Http\Requests\StoreHargaSppRequest;
use App\Http\Requests\UpdateHargaSppRequest;
use App\Models\Spp;
use Illuminate\Http\Request;

class HargaSppController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $id = $request->id;
        $spp = Spp::find($id);
        $hargaspp = HargaSpp::where('spp_id', $id)->get();
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


        return view('detailspp.create', [
            'months' => $months,
            'spp' => $spp,
            'hargaspp' => $hargaspp
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = now()->format('d-m-Y');
        $id = $request->id;
        $spp = Spp::findOrFail($id);
        $spp->update([
            $request->bulan => $tanggal,
        ]);

        $hargaspp = HargaSpp::where('spp_id', $id)->first();

        if ($hargaspp) {
            $hargaspp->update([
                $request->bulan => $request->harga,
            ]);
        } else {
            HargaSpp::create([
                'spp_id' => $id,
                $request->bulan => $request->harga
            ]);
        }

        return redirect("/spp/$id")->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(HargaSpp $hargaSpp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        // $hargaspp = HargaSpp::where('spp_id', $request->hargasppid)->get();
        $hargaspp = HargaSpp::find($request->hargasppid);
        $spp = spp::find($request->sppid);

        return view('detailspp.edit', [
            'hargaspp' => $hargaspp,
            'bulanspp' => $request->bulanspp,
            'spp' => $spp
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HargaSpp $detail)
    {
        $bulan = $request->bulan;
        if ($detail->$bulan == $request->hargasekarang) {
            return redirect("/spp/$request->id")->with('errorupdate', 'silahkan pilih harga yang terbaru pada bulan tersebut');
        }
        $detail->update([
            $request->bulan => $request->hargasekarang,
        ]);
        return redirect("/spp/$request->id")->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, HargaSpp $detail)
    {
        $bulan = $request->bulan;

        $spp_id = $detail->spp_id;
        
        $spp = Spp::find($spp_id);

        $spp->update([
            $bulan => null,
        ]);

        $detail->update([
            $bulan => null,
        ]);

        return redirect("/spp/$spp->id")->with('success', 'Data berhasil dihapus');
    }
}