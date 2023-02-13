@extends('admin.layouts.app')
@section('title', 'Admin Page')
@section('content')


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Posting Magang</h1>
</div>

<div class="col-lg-8">
    <!-- diarahkan ke store method di controller langsung tanpa ubah route di web.php -->
    <form action="/admin/magang/{{ $magang->id }}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
            <input type="text" class="form-control @error('nama_perusahaan') is-invalid @enderror" id="nama_perusahaan" name="nama_perusahaan" autofocus value="{{ old('nama_perusahaan', $magang->nama_perusahaan) }}">
            @error('nama_perusahaan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="posisi" class="form-label">Posisi</label>
            <input type="text" class="form-control @error('posisi') is-invalid @enderror" id="posisi" name="posisi" value="{{ old('posisi', $magang->posisi) }}">

            @error('posisi')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat', $magang->alamat) }}">

            @error('alamat')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" rows="12" id="deskripsi" name="deskripsi">{{old('deskripsi') ?? $magang->deskripsi}}</textarea>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <img class="img-preview img-fluid mb-3 col-sm-6">
            <input class="form-control @error('gambar') is-invalid @enderror" type="file" id="gambar" name="gambar" value="{{ old('gambar', $magang->gambar) }}" required>
            @error('gambar')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>

</div>


@endsection

