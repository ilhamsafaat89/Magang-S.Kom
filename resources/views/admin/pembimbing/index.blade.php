@extends('admin.layouts.app')
@section('title', 'Admin Page')
@section('content')

@include('sweetalert::alert')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Daftar Pembimbing</h1>
</div>

{{-- <a href="/admin/pembimbing/create" class="btn btn-primary">Tambah Data Pembimbing</a> --}}
<div class="table-responsive col-lg-12">
    <table class="table table-striped table-bordered table-responsive-lg mt-3">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">NIDN</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Alamat</th>
                <th scope="col">TTL</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pembimbings as $pembimbing)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pembimbing->nidn }}</td>
                <td>{{ $pembimbing->nama }}</td>
                <td>{{ $pembimbing->jenis_kelamin }}</td>
                <td>{{ $pembimbing->alamat }}</td>
                <td>{{ $pembimbing->ttl }}</td>
                <td>
                    <a href="/admin/pembimbing/{{ $pembimbing->id }}/edit" class="badge bg-warning" style="text-decoration: none;">Edit</a>
                    <form action="/admin/pembimbing/{{ $pembimbing->id}}" method="post" class="d-inline">
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

