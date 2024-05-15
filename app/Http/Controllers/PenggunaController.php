<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StorePenggunaRequest;
use App\Http\Requests\UpdatePenggunaRequest;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pagination = 10;

        $users = User::where('is_admin', false);

        if ($request->has('keyword')) {
            $users->where(function ($query) use ($request) {
                $query->where('name', 'like', "%{$request->keyword}%")
                    ->orWhere('nisn', 'like', "%{$request->keyword}%");
            });
        }

        $users = $users->orderBy('created_at', 'desc')->paginate($pagination);

        $users->appends($request->only('keyword'));

        return view('pengguna.index', [
            'users' => $users,
        ])->with('i', ($request->input('page', 1) - 1) * $pagination);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengguna.createpengguna');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePenggunaRequest $request)
    {
        // Memvalidasi data dari request
        $validatedData = $request->validated();

        // Menetapkan nilai '12345' untuk kunci 'password'
        $validatedData['password'] = '12345';

        // Menyimpan data ke dalam database
        User::create($validatedData);

        // Jika data berhasil disimpan, kembalikan dengan pesan sukses
        return redirect('/user')->with('success', 'Data berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('pengguna.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // Mengambil data pengguna dari database
        $userData = User::findOrFail($user->id);

        // Inisialisasi array untuk menyimpan data yang akan diupdate
        $updateData = [];

        // Memeriksa apakah nilai email berubah
        if ($request->email !== $userData->email) {
            $updateData['email'] = 'email|unique:users';
        }

        // Memeriksa apakah nilai NISN berubah
        if ($request->nisn !== $userData->nisn) {
            $updateData['nisn'] = ['digits:10', 'unique:users', 'numeric'];
        }

        // Memeriksa apakah nilai name berubah
        if ($request->name !== $userData->name) {
            $updateData['name'] = ['max:255'];
        }
        
        // Memeriksa apakah nilai name berubah
        if ($request->nameortu !== $userData->nameortu) {
            $updateData['nameortu'] = ['max:255'];
        }

        $validatedData = $request->validate($updateData);

        // Memasukkan data yang telah diverifikasi ke dalam database
        // $user->update($validatedData);
        // Memasukkan data yang telah diverifikasi ke dalam database
        User::where('id', $user->id)->update($validatedData);

        return redirect('/user')->with('success', 'Data berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect('/user')->with('success', 'Data berhasil dihapus');
    }
}