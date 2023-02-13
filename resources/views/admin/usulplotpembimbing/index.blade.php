@extends('admin.layouts.app')
@section('title', 'Admin Page')
@section('content')

@include('sweetalert::alert')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Usul Plot Pembimbing</h1>
</div>

<a href="/admin/usulplotpembimbing/lihatdataplot" class="btn btn-info text-white">Lihat Data</a>
<div class="table-responsive col-lg-12">
    <table class="table table-striped table-bordered table-responsive-lg mt-3">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">NPM</th>
                <th scope="col">Nama Mahasiswa</th>
                <th scope="col">Jurusan</th>
                <th scope="col">Plot Dosen</th>
                <th scope="col">Simpan</th>
            </tr>
        </thead>
        <tbody>
            <form action="/admin/usulplotpembimbing" method="post">
                @csrf
                @foreach ($data as $mhs)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $mhs->npm }}</td>

                    <td>{{ $mhs->nama }}</td>

                    <td>{{ $mhs->jurusan }}</td>

                    <td>
                        @foreach($pembimbing as $d)
                        <ul>
                            <li>{{ $d->nama }}</li>
                        </ul>
                        @endforeach
                    </td>
                    <td>
                        {{-- @if(!$dataDisable) --}}
                        <a href="/admin/usulplotpembimbing/plot/{{ $mhs->id }}" class="btn btn-primary plot" style="text-decoration:none;">Plot</a>
                        {{-- @else --}}
                        {{-- <a href="/admin/usulplotpembimbing/plot/{{ $mhs->id }}" class="btn btn-primary disabled" style="text-decoration:none;">Plot</a> --}}
                        {{-- @endif --}}
                    </td>
                </tr>
                @endforeach()
            </form>
        </tbody>
    </table>
</div>
@endsection
