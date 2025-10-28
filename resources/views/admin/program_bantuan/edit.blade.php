@extends('layouts.admin.app')

@section('title', 'Edit Program bantuan')

@section('content')
<div class="py-4">
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item">
                <a href="#">
                    <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                </a>
            </li>
            <li class="breadcrumb-item"><a href="#">Program Bantuan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Edit Data Program Bantuan</h1>
            <p class="mb-0">Form untuk Edit data Program Bantuan</p>
        </div>
        <div>
            <a href="{{ route('program_bantuan.index') }}" class="btn btn-primary">
                <i class="far fa-question-circle me-1"></i> Kembali
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-0 shadow components-section">
            <div class="card-body">

              <form action="{{ route('program_bantuan.update', $data->program_id) }}" method="POST">
    @csrf
    @method('PUT')


                    <div class="row mb-1">
                        <div class="col-lg-4 col-sm-6">
                            <label class="form-label">Kode</label>
                            <input type="text" name="kode" class="form-control"
                                   value="{{ old('kode', $data->kode) }}" required>
                        </div>

                        <div class="col-lg-4 col-sm-6 mb-3">
                            <label class="form-label">Nama Program</label>
                            @php $list = [
                                'BLT Dana Desa',
                                'BLT Kesejahteraan rakyat',
                                'Program Keluarga Harapan (PKH)',
                                'Bantuan Pangan Non Tunai',
                                'Program Indonesia Pintar (PIP)',
                                'Jaminan Kesehatan Nasional (JKN-KIS)'
                            ]; @endphp

                            <select name="nama_program" class="form-select">
                                <option value="">-- Pilih --</option>
                                @foreach($list as $item)
                                    <option value="{{ $item }}"
                                        {{ old('nama_program', $data->nama_program) == $item ? 'selected' : '' }}>
                                        {{ $item }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-4 col-sm-6 mb-3">
                            <label class="form-label">Tahun</label>
                            <input type="number" min="2000" max="2100"
                                   name="tahun" class="form-control"
                                   value="{{ old('tahun', $data->tahun) }}">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-lg-4 col-sm-6 mb-3">
                            <label class="form-label">Anggaran</label>
                            <input type="number" step="0.01" name="anggaran"
                                   class="form-control"
                                   value="{{ old('anggaran', $data->anggaran) }}">
                        </div>

                        <div class="col-lg-8 col-sm-6 mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="2">{{ old('deskripsi', $data->deskripsi) }}</textarea>
                        </div>
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('program_bantuan.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

@endsection
