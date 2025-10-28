@extends('layouts.admin.app')

@section('title', 'Tambah Program Bantuan')

@section('content')

<div class="py-4">
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item">
                <a href="#">
                    <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                </a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('program_bantuan.index') }}">Program Bantuan</a></li>
            <li class="breadcrumb-item active">Tambah</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Tambah Program Bantuan</h1>
            <p class="mb-0">Input data program bantuan</p>
        </div>

        <div>
            <a href="{{ route('warga.index') }}" class="btn btn-primary">
                <i class="far fa-question-circle me-1"></i> Kembali
            </a>
        </div>
    </div>
</div>

<div class="card border-0 shadow">
    <div class="card-body">

        <form action="{{ route('program_bantuan.store') }}" method="POST">
            @csrf

            <div class="row mb-1">
                <div class="col-lg-4 col-sm-6 ">
                    <label for="kode" class="form-label">Kode</label>
                    <input type="text" id="kode" name="kode"
                        class="form-control"
                        value="{{ old('kode') }}" required>
                </div>

                <div class="col-lg-4 col-sm-6 mb-3">
                    <label for="nama_program" class="form-label">Nama Program</label>
<select id="nama_program" name="nama_program" class="form-select">
    <option value="">-- Pilih --</option>
    <option value="BLT Dana Desa" {{ old('nama_program') == 'BLT Dana Desa' ? 'selected' : '' }}>
        BLT Dana Desa
    </option>
    <option value="BLT Kesejahteraan rakyat" {{ old('nama_program') == 'BLT Kesejahteraan rakyat' ? 'selected' : '' }}>
        BLT Kesejahteraan rakyat
    </option>
    <option value="Program Keluarga Harapan (PKH)" {{ old('nama_program') == 'Program Keluarga Harapan (PKH)' ? 'selected' : '' }}>
        Program Keluarga Harapan (PKH)
    </option>
    <option value="Bantuan Pangan non Tunai" {{ old('nama_program') == 'Bantuan Pangan non Tunai' ? 'selected' : '' }}>
        Bantuan Pangan Non Tunai
    </option>
    <option value="Program Indonesia Pintar (PIP)" {{ old('nama_program') == 'Program Indonesia Pintar (PIP)' ? 'selected' : '' }}>
        Program Indonesia Pintar (PIP)
    </option>
    <option value="jaminan Kesehatan Nasional (JKN-KIS)" {{ old('nama_program') == 'jaminan Kesehatan Nasional (JKN-KIS)' ? 'selected' : '' }}>
        Jaminan Kesehatan Nasional (JKN-KIS)
    </option>
</select>
                </div>

                <div class="col-lg-4 col-sm-6 mb-3">
                    <label for="tahun" class="form-label">Tahun</label>
                    <input type="number" id="tahun" name="tahun"
                        class="form-control"
                        value="{{ old('tahun') }}" min="2000" max="2100">
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-lg-4 col-sm-6 mb-3">
                    <label for="anggaran" class="form-label">Anggaran</label>
                    <input type="number" step="0.01" id="anggaran" name="anggaran"
                        class="form-control"
                        value="{{ old('anggaran') }}">
                </div>

                <div class="col-lg-8 col-sm-6 mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi"
                        class="form-control" rows="2">{{ old('deskripsi') }}</textarea>
                </div>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('program_bantuan.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
            </div>

        </form>
    </div>
</div>

@endsection
