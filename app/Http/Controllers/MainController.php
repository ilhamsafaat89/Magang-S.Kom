<?php

namespace App\Http\Controllers;

use App\Models\Magang;
use App\Models\Mahasiswa;
use App\Models\Pembimbing;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class MainController extends Controller
{
    public function index(){
        $magangs = Magang::get();
        $mahasiswas = Mahasiswa::where('status','selesai')->get();
        $tanggal = Carbon::now()->isoFormat('dddd, D MMM Y');
        $pembimbings = Pembimbing::get();
        return view('main', compact('magangs', 'mahasiswas', 'tanggal', 'pembimbings'));
    }

    public function detail($id){
        $detailmagang = Magang::find($id);
        return view('detailmagang', [
            'detailmagang' => $detailmagang
        ]);
    }
}
