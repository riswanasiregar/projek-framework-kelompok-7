@extends ('layouts.admin.app')

@section('title', 'Edit Warga')

@section ('content')
        <div class="py-4">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                    <li class="breadcrumb-item">
                        <a href="#">
                            <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Warga</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah</li>
                </ol>
            </nav>
            <div class="d-flex justify-content-between w-100 flex-wrap">
                <div class="mb-3 mb-lg-0">
                    <h1 class="h4">Tambah Warga</h1>
                    <p class="mb-0">Form untuk menambahkan data Warga</p>
                </div>
                <div>

                    <a href="{{ route('warga.index') }}" class="btn btn-primary"><i class="far fa-question-circle me-1"></i> Kembali</a>
                </div>
            </div>
        </div>

<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-0 shadow components-section">
            <div class="card-body">

                <form action="{{ route('warga.store') }}" method="POST">
                    @csrf

                    <div class="row mb-4">
                        <div class="col-lg-4 col-sm-6">
                            <!-- No KTP -->
                            <div class="mb-3">
                                <label for="no_ktp" class="form-label">No. KTP</label>
                                <input
                                    type="text"
                                    id="no_ktp"
                                    name="no_ktp"
                                    class="form-control"
                                    value="{{ old('no_ktp') }}"
                                    required>
                            </div>

                            <!-- Nama -->
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input
                                    type="text"
                                    id="nama"
                                    name="nama"
                                    class="form-control"
                                    value="{{ old('nama') }}"
                                    required>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-6">
                            <!-- Jenis Kelamin -->
                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <select id="jenis_kelamin" name="jenis_kelamin" class="form-select">
                                    <option value="">-- Pilih --</option>
                                    <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>

                            <!-- Agama -->
                            <div class="mb-3">
                                <label for="agama" class="form-label">Agama</label>
                                <input
                                    type="text"
                                    id="agama"
                                    name="agama"
                                    class="form-control"
                                    value="{{ old('agama') }}">
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-12">
                            <!-- Pekerjaan -->
                            <div class="mb-3">
                                <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                <input
                                    type="text"
                                    id="pekerjaan"
                                    name="pekerjaan"
                                    class="form-control"
                                    value="{{ old('pekerjaan') }}">
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    class="form-control"
                                    value="{{ old('email') }}">
                            </div>

                            <!-- Telp -->
                            <div class="mb-3">
                                <label for="telp" class="form-label">No. Telepon</label>
                                <input
                                    type="text"
                                    id="telp"
                                    name="telp"
                                    class="form-control"
                                    value="{{ old('telp') }}">
                            </div>

                            <!-- Tombol -->
                            <div class="">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('warga.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection