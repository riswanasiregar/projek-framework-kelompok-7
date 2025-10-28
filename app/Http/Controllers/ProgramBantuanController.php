<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgramBantuan;

class ProgramBantuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['ProgramBantuan'] = ProgramBantuan ::all();
		return view('admin.program_bantuan.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('admin.program_bantuan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:program_bantuan,kode',
            'nama_program' => 'required',
        ]);

        ProgramBantuan::create($request->all());

        return redirect()->route('program_bantuan.index')
                         ->with('success', 'Data berhasil ditambahkan!');    }

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
    $data = ProgramBantuan::findOrFail($id);
    return view('admin.program_bantuan.edit', compact('data'));
}


public function update(Request $request, string $id)
{
    // Validasi
    $request->validate([
        'kode' => 'required|string|max:20',
        'nama_program' => 'required|string',
        'tahun' => 'nullable|integer',
        'anggaran' => 'nullable|numeric',
        'deskripsi' => 'nullable|string'
    ]);

  
    $ProgramBantuan = ProgramBantuan::findOrFail($id);
    $ProgramBantuan->kode = $request->kode;
    $ProgramBantuan->nama_program = $request->nama_program;
    $ProgramBantuan->tahun = $request->tahun;
    $ProgramBantuan->anggaran = $request->anggaran; 
    $ProgramBantuan->deskripsi = $request->deskripsi; 
    $ProgramBantuan->save();

    return redirect()->route('program_bantuan.index')
                     ->with('success', 'Perubahan Data Berhasil');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    $ProgramBantuan = ProgramBantuan::findOrFail($id);

      $ProgramBantuan ->delete();
       return redirect()->route('program_bantuan.index')->with('success', ' Data Berhasil dihapus ');

    }
}
