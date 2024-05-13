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

class SiswaController extends Controller
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

        $siswas = $query->orderBy('created_at', 'desc')->paginate($pagination);

        $siswas->appends($request->only('keyword'));

        $tahunjaran = Spp::distinct()->pluck('tahun_ajaran')->toArray();

        return view('siswa.index', [
            'siswas' => $siswas,
            'tahunajaran' => $tahunjaran
        ])->with('i', ($request->input('page', 1) - 1) * $pagination);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa.create', [
            'users' => User::where('is_admin', false)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSppRequest $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $validatedData = $request->validated();

        // Mendapatkan tahun ajaran
        $tahunSekarang = now()->year;
        $tahunDepan = now()->addYears(1)->year;
        $validatedData['tahun_ajaran'] = $tahunSekarang . '-' . $tahunDepan;

        // Memeriksa apakah kelompok sudah ada untuk user_id tertentu
        $existingSiswa = Spp::where('user_id', $validatedData['user_id'])
            ->where('kelompok', $validatedData['kelompok'])
            ->exists();

        // Jika kelompok belum ada, simpan data
        if (!$existingSiswa) {
            // Menyimpan data ke dalam database
            $siswa = Spp::create($validatedData);
            HargaSpp::create(["spp_id" => $siswa->id]);
            return redirect('/siswa')->with('success', 'Data berhasil ditambahkan');
        } else {
            // Jika kelompok sudah ada, kembalikan dengan pesan error
            return redirect()->back()->withInput()->withErrors(['kelompok' => 'pilih kelompok yang belum tersedia pada siswa.'])->with('error', 'Data siswa dengan Kelompok tersebut sudah ada, silahkan cek kembali');
        }
    }



    /**
     * Display the specified resource.
     */
    /**s
     * Show the form for editing the specified resource.
     */
    public function edit(Spp $siswa)
    {
        return view('siswa.edit', [
            'siswa' => $siswa,
            'users' => User::where('is_admin', false)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSppRequest $request, Spp $siswa)
    {
        $validatedData = $request->validated();
        $validatedData['tahun_ajaran'] = $siswa->tahun_ajaran;

        // Memeriksa apakah kelompok sudah ada untuk user_id tertentu
        $existingSiswa = Spp::where('user_id', $validatedData['user_id'])
            ->where('kelompok', $validatedData['kelompok'])
            ->exists();

        // Jika kelompok belum ada, simpan data
        if (!$existingSiswa) {
            // Menyimpan data ke dalam database
            Spp::where('id', $siswa->id)->update($validatedData);
            return redirect('/siswa')->with('success', 'Data berhasil diperbarui');
        } else {
            // Jika kelompok sudah ada, kembalikan dengan pesan error
            return redirect()->back()->withInput()->withErrors(['kelompok' => 'pilih kelompok yang belum tersedia pada siswa.'])->with('error', 'Data siswa dengan Kelompok tersebut sudah ada, silahkan cek kembali');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Spp $siswa)
    {
        Spp::destroy($siswa->id);
        return redirect('/siswa')->with('success', 'Data berhasil dihapus');
    }
}