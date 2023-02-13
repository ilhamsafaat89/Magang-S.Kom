@extends('admin.layouts.app')
@section('title', 'Admin Page')
@section('content')

@include('sweetalert::alert')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Postingan Magang</h1>
</div>

<a href="/admin/magang/create" class="btn btn-primary">Tambah Postingan Magang</a>
<div class="table-responsive col-lg-12">
    <table class="table table-striped table-bordered table-responsive-lg mt-3">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Perusahaan</th>
                <th scope="col">Posisi</th>
                <th scope="col">Alamat</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Gambar</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($magangs as $magang)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $magang->nama_perusahaan }}</td>
                <td>{{ $magang->posisi }}</td>
                <td>{{ $magang->alamat }}</td>
                <td>{{ $magang->deskripsi }}</td>
                <td>
                    <img src="{{ asset('storage/uploads/'.$magang->gambar) }}" width="100px" height="100px">
                </td>
                <td>
                    <a href="/admin/magang/{{ $magang->id }}/edit" class="badge bg-warning" style="text-decoration: none;">Edit</a>
                    <form id="delete_form" action="/admin/magang/{{ $magang->id}}" method="post" class="d-inline">
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
