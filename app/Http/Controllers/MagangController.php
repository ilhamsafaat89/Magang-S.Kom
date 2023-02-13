<?php

namespace App\Http\Controllers;

use App\Models\Magang;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class MagangController extends Controller
{
     public function index()
    {
        $magangs = Magang::latest()->get();
        return view('admin.magang.index', ['magangs' => $magangs]);
    }

    public function create()
    {
        return view('admin.magang.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_perusahaan' => 'required|max:255',
            'posisi' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $slug = Str::slug('magang' . '-' . $request->created_at);
            $extension = $request->file('gambar')->getClientOriginalExtension();
            $fileName = $slug . '-' . time() . '.' . $extension;
            $request->file('gambar')->storeAs('public/uploads', $fileName);
        }

        $magang = new Magang;
        $magang->nama_perusahaan = $request->input('nama_perusahaan');
        $magang->posisi = $request->input('posisi');
        $magang->alamat = $request->input('alamat');
        $magang->deskripsi = $request->input('deskripsi');
        $magang->gambar = $fileName;
        $magang->save();

        Alert::success('success', "Data Berhasil Ditambahkan!");
        return redirect('/admin/magang');
    }

    public function edit($id)
    {
        $data = Magang::find($id);
        return view('admin.magang.edit', [
            'magang' => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $magang = Magang::find($id);
        $magang->nama_perusahaan = $request->input('nama_perusahaan');
        $magang->posisi = $request->input('posisi');
        $magang->alamat = $request->input('alamat');
        $magang->deskripsi = $request->input('deskripsi');

        if($request->hasFile('gambar')){

            $destination = 'uploads'. $request->gambar;
            if(File::exists($destination)){
                File::delete($destination);
            }

            $filenameWithExt = $request->file('gambar')->getClientOriginalName();
            // $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $slug = Str::slug('magang' . '-' . $request->created_at);
            $extension = $request->file('gambar')->getClientOriginalExtension();
            $fileName = $slug . '-' . time() . '.' . $extension;

            $path = $request->file('gambar')->storeAs('public/uploads', $fileName);
            $magang->gambar = $fileName;
        }

        $magang->update();

        Alert::success('success', "Data Berhasil Diubah!", );
        return redirect('/admin/magang');
    }

    public function destroy($id)
    {
        $magang = Magang::find($id);
        $magang->delete();

        Alert::success("Data Berhasil Dihapus!", 'success');
        return redirect('/admin/magang');
    }
}
