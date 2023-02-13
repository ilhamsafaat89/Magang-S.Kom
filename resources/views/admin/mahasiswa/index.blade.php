@extends('admin.layouts.app')
@section('title', 'Admin Page')
@section('content')

@include('sweetalert::alert')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">All Mahasiswa</h1>
</div>

{{-- <a href="/admin/mahasiswa/create" class="btn btn-primary">Tambah Data mahasiswa</a> --}}
<div class="table-responsive col-lg-12">
    <table class="table table-striped table-bordered table-responsive-lg mt-3">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">NPM</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Jurusan</th>
                <th scope="col">Pembimbing</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mahasiswas as $mahasiswa)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $mahasiswa->npm }}</td>
                <td>{{ $mahasiswa->nama }}</td>
                <td>{{ $mahasiswa->jenis_kelamin }}</td>
                <td>{{ $mahasiswa->jurusan }}</td>
                @foreach($mahasiswa->pembimbing()->get() as $mhs)
                <td>{{ $mhs->nama }}</td>
                @endforeach

                <td>
                    <a href="/admin/mahasiswa/{{ $mahasiswa->id }}/edit" class="badge bg-warning" style="text-decoration: none;">Edit</a>
                    <form action="/admin/mahasiswa/{{ $mahasiswa->id}}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="badge bg-danger border-0 show_confirm_delete">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach()
        </tbody>
    </table>
</div>
@endsection

