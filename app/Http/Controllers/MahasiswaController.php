<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MahasiswaController extends Controller
{
    public function index()
    {
        $data = Mahasiswa::with('pembimbing')->orderBy('created_at', 'desc')->get();
        return view('admin.mahasiswa.index', ['mahasiswas' => $data]);
    }

    public function edit($id)
    {
        $data = Mahasiswa::find($id);
        return view('admin.mahasiswa.edit', [
            'mahasiswa' => $data,
        ]);
    }

    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->npm = $request->input('npm');
        $mahasiswa->nama = $request->input('nama');
        $mahasiswa->jenis_kelamin = $request->input('jenis_kelamin');
        $mahasiswa->jurusan = $request->input('jurusan');

        $mahasiswa->update();

        Alert::success("Data Berhasil Diubah!", 'success');
        return redirect('/admin/mahasiswa');
    }

    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->delete();

        Alert::success("Data Berhasil Dihapus!", 'success');
        return redirect('/admin/mahasiswa');
    }
}
