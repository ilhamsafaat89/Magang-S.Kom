@extends('admin.layouts.app')
@section('title', 'Admin Page')
@section('content')


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Data Mahasiswa</h1>
</div>

<div class="col-lg-8">
    <!-- diarahkan ke store method di controller langsung tanpa ubah route di web.php -->
    <form action="/admin/mahasiswa/{{ $mahasiswa->id }}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="npm" class="form-label">NPM</label>
            <input type="text" class="form-control @error('npm') is-invalid @enderror" id="npm" name="npm" autofocus value="{{ old('npm', $mahasiswa->npm) }}">
            @error('npm')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $mahasiswa->nama) }}">
            @error('nama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <select class="form-select" name="jenis_kelamin">
                <option value="laki-laki" {{ old('jenis_kelamin') ?? $mahasiswa->jenis_kelamin == "laki-laki" ? 'selected' : '' }}>laki-laki
                </option>
                <option value="perempuan" {{ old('jenis_kelamin') ?? $mahasiswa->jenis_kelamin == "perempuan" ? 'selected' : '' }}>perempuan
                </option>
            </select>
        </div>

        <div class="mb-3">
            <label for="jurusan" class="form-label">Jurusan</label>
            <input type="text" class="form-control @error('jurusan') is-invalid @enderror" id="jurusan" name="jurusan" value="{{ old('jurusan', $mahasiswa->jurusan) }}">
            @error('jurusan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>

</div>


@endsection

