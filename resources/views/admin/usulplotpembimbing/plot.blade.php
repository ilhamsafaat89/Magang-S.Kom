@extends('admin.layouts.app')
@section('title', 'Admin Page')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Konfirmasi Plot Pembimbing</h1>
</div>

<div class="col-lg-8">
    <form action="/admin/usulplotpembimbing/{{ $data->id }}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="npm" class="form-label">NPM</label>
            <input type="text" class="form-control" id="npm" name="npm" autofocus value="{{ old('npm') ?? $data->npm }}" required>

        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Mahasiswa</label>
            <input type="text" class="form-control" id="nama" name="nama" autofocus value="{{ old('nama') ?? $data->nama }}" required>
        </div>
        <div class="mb-3">
            <label for="jurusan" class="form-label">Jurusan</label>
            <input type="text" class="form-control" id="jurusan" name="jurusan" autofocus value="{{ old('jurusan') ?? $data->jurusan }}" required>
        </div>

        <div class="mb-3">
            <label for="pembimbing">Pembimbing</label>
            {{-- <select class="form-select" name="pembimbing">
                @foreach($pembimbing as $pb)
                <option value="{{ $pb->nama }}" {{ $data->nama == $pb->nama ? 'selected' : '' }}>{{ $pb->nama }}</option>
            @endforeach
            </select> --}}

            <select class="form-control" name="pembimbing">
                @foreach($pembimbing as $pb)
                <option value="{{ $pb->nama }}" {{ old('nama', $data->pembimbing_id) == $pb->id ? 'selected' : ''}}>{{ $pb->nama }}</option>
                @endforeach()
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>

@endsection
