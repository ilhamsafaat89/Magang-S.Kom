@extends('admin.layouts.app')
@section('title', 'Admin Page')
@section('content')

@include('sweetalert::alert')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Lihat Data Plot</h1>
</div>

<div class="table-responsive col-lg-12">
    <table class="table table-striped table-bordered table-responsive-lg mt-3">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">NPM</th>
                <th scope="col">Nama Mahasiswa</th>
                <th scope="col">Jurusan</th>
                <th scope="col">Plot Dosen</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $mhs)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><input type="text" class="form-control" name="npm" value="{{ $mhs->npm }}"></td>
                <td><input type="text" class="form-control" name="nama" value="{{ $mhs->nama }}"></td>
                <td><input type="text" class="form-control" name="jurusan" value="{{ $mhs->jurusan }}"></td>
                <td><input type="text" class="form-control" name="pembimbing" value="{{ $mhs->pembimbing }}"></td>
                <td><span class="badge text-bg-success">Selesai</span></td>
            </tr>
            @endforeach()

        </tbody>
    </table>
</div>
@endsection
