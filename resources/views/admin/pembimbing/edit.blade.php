@extends('admin.layouts.app')
@section('title', 'Admin Page')
@section('content')


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Data Pembimbing</h1>
</div>

<div class="col-lg-8">
    <!-- diarahkan ke store method di controller langsung tanpa ubah route di web.php -->
    <form action="/admin/pembimbing/{{ $pembimbing->id }}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="nidn" class="form-label">NIDN</label>
            <input type="text" class="form-control @error('nidn') is-invalid @enderror" id="nidn" name="nidn" autofocus value="{{ old('nidn', $pembimbing->nidn) }}">
            @error('nidn')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $pembimbing->nama) }}">

            @error('nama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <select class="form-select" name="jenis_kelamin">
                <option value="laki-laki" {{ old('jenis_kelamin') ?? $pembimbing->jenis_kelamin == "laki-laki" ? 'selected' : '' }}>laki-laki
                </option>
                <option value="perempuan" {{ old('jenis_kelamin') ?? $pembimbing->jenis_kelamin == "perempuan" ? 'selected' : '' }}>perempuan
                </option>
            </select>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat', $pembimbing->alamat) }}">
            @error('alamat')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="ttl" class="form-label">TTL</label>
            <input type="text" class="form-control @error('ttl') is-invalid @enderror" id="ttl" name="ttl" value="{{ old('ttl', $pembimbing->ttl) }}">
            @error('ttl')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>

</div>


@endsection
