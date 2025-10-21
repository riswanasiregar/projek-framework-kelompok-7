<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warga;

class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
		$data['dataWarga'] = Warga ::all();
		return view('admin.warga.index',$data);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('admin.warga.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validasi data input
        $validatedData = $request->validate([
        'no_ktp' => 'required|digits:16|unique:warga,no_ktp',
        'nama' => 'required|string|max:100',
        'agama' => 'required|string|max:30',
        'pekerjaan' => 'required|string|max:50',
        'telp' => 'required|digits_between:10,20',
        'email' => 'required|email|max:100|:warga,email',
    ], [
        'no_ktp.required' => 'Nomor KTP wajib diisi.',
        'no_ktp.digits' => 'Nomor KTP harus terdiri dari 16 digit.',
        'no_ktp.unique' => 'Nomor KTP sudah terdaftar.',

        'nama.required' => 'Nama wajib diisi.',
        'nama.max' => 'Nama tidak boleh lebih dari 100 karakter.',

        'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih.',
        'jenis_kelamin.in' => 'Jenis kelamin harus Laki-laki atau Perempuan.',

        'agama.required' => 'Agama wajib diisi.',
        'agama.max' => 'Agama tidak boleh lebih dari 30 karakter.',

        'pekerjaan.required' => 'Pekerjaan wajib diisi.',
        'pekerjaan.max' => 'Pekerjaan tidak boleh lebih dari 50 karakter.',

        'telp.required' => 'Nomor telepon wajib diisi.',
        'telp.digits_between' => 'Nomor telepon harus 10–20 digit angka.',

        'email.required' => 'Email wajib diisi.',
        'email.email' => 'Format email tidak valid.',
        'email.max' => 'Email tidak boleh lebih dari 100 karakter.',
    ]);

    // Simpan data ke database
    $data['no_ktp'] = $request->no_ktp;
    $data['nama'] = $request->nama;
    $data['jenis_kelamin'] = $request->jenis_kelamin;
    $data['agama'] = $request->agama;
    $data['pekerjaan'] = $request->pekerjaan;
    $data['telp'] = $request->telp;
    $data['email'] = $request->email;

    Warga::create($validatedData);

    return redirect()->route('warga.index')->with('success', 'Penambahan Data Berhasil!');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
   public function edit(string $id)
{
    $data['dataWarga'] = Warga::findOrFail($id);
    return view('admin.warga.edit', $data);
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{

    $warga_id = $id;
    $warga = Warga::findOrFail($warga_id);

    
    $warga->no_ktp = $request->no_ktp;
    $warga->nama = $request->nama;
    $warga->jenis_kelamin = $request->jenis_kelamin;
    $warga->agama = $request->agama;
    $warga-> pekerjaan = $request->pekerjaan;
    $warga-> telp = $request->telp;
    $warga-> email = $request->email;

    $warga->save();

    
    return redirect()->route('warga.index')->with('success', 'Perubahan Data Berhasil');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      $warga = Warga::findOrFail($id);

      $warga ->delete();
       return redirect()->route('warga.index')->with('success', ' Data Berhasil dihapus ');

    }
}
