<?php

namespace App\Http\Controllers;

use App\Models\Pembimbing;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PembimbingController extends Controller
{
    public function index(){
        $data = Pembimbing::orderBy('created_at', 'desc')->get();
        return view('admin.pembimbing.index', ['pembimbings' => $data]);
    }

    public function edit($id){
        $data = Pembimbing::find($id);
        return view('admin.pembimbing.edit', [
            'pembimbing' => $data,
        ]);
    }

    public function update(Request $request, $id){
        $pembimbing = Pembimbing::find($id);
        $pembimbing->nidn = $request->input('nidn');
        $pembimbing->nama = $request->input('nama');
        $pembimbing->jenis_kelamin = $request->input('jenis_kelamin');
        $pembimbing->alamat = $request->input('alamat');
        $pembimbing->ttl = $request->input('ttl');

        $pembimbing->update();

        Alert::success("Data Berhasil Diubah!", 'success');
        return redirect('/admin/pembimbing');
    }

    public function destroy($id){
        $pembimbing = Pembimbing::find($id);
        $pembimbing->delete();

        Alert::success("Data Berhasil Dihapus!", 'success');
        return redirect('/admin/pembimbing');
    }
}
