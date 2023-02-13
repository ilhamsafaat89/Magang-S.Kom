<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Pembimbing;
use Illuminate\Http\Request;
use App\Models\UsulPlotPembimbing;
use RealRashid\SweetAlert\Facades\Alert;

class UsulPlotPembimbingController extends Controller
{
     public function index()
    {
        $data = Mahasiswa::get();
        $pembimbing = Pembimbing::get();
        return view('admin.usulplotpembimbing.index', compact('data', 'pembimbing'));
    }

    public function lihatdataplot()
    {
        $data = Mahasiswa::where('status', 'selesai')->orderBy('created_at', 'desc')->get();
        return view('admin.usulplotpembimbing.lihatdataplot', compact('data'));
    }

    public function store(Request $request)
    {
        $plot = new UsulPlotPembimbing;
        $plot->npm = $request->input('npm');
        $plot->nama = $request->input('nama');
        $plot->jurusan = $request->input('jurusan');
        $plot->pembimbing = $request->input('pembimbing');
        $plot->save();

        Alert::success("Data berhasil ditambahkan!", 'success');
        return redirect('/admin/usulplotpembimbing');
    }

    public function plot($id)
    {
        $data = Mahasiswa::find($id);
        $pembimbing = Pembimbing::get();
        return view('admin.usulplotpembimbing.plot', compact('data', 'pembimbing'));
    }

    public function update($id, Request $request)
    {
        $data = Mahasiswa::find($id);
        $data->npm = $request->input('npm');
        $data->nama = $request->input('nama');
        $data->jurusan = $request->input('jurusan');
        $data->pembimbing = $request->input('pembimbing');
        $data->status = 'selesai';

        $data->update();
        Alert::success("Data berhasil di plot!", 'success');
        return redirect('/admin/usulplotpembimbing');
    }

}
