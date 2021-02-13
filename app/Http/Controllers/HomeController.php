<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penyakit;
use App\Models\Gejala;
use App\Models\Relasi;
use App\Models\Pasien;

class HomeController extends Controller
{
    public function index()
    {
      $dbd1 = Penyakit::find(1);
      $dbd2 = Penyakit::find(2);
      $dbd3 = Penyakit::find(3);

      return view('welcome')->with(compact('dbd1', 'dbd2', 'dbd3'));

    }

    //DBD Tingkat I Page
    public function dbdi()
    {
      $penyakit = Penyakit::find(1);
      $relasis = Relasi::where('penyakit_id',1)->orderBy('gejala_id','asc')->get();
      return view('dbdi')->with(compact('penyakit','relasis'));
    }

    //DBD Tingkat II Page
    public function dbdii()
    {
      $penyakit = Penyakit::find(2);
      $relasis = Relasi::where('penyakit_id',2)->orderBy('gejala_id','asc')->get();
      return view('dbdii')->with(compact('penyakit','relasis'));
    }

    //DBD Tingkat III Page
    public function dbdiii()
    {
      $penyakit = Penyakit::find(3);
      $relasis = Relasi::where('penyakit_id',3)->orderBy('gejala_id','asc')->get();
      return view('dbdiii')->with(compact('penyakit','relasis'));
    }

    //konsultasi
    public function konsultasi()
    {
      $penyakits = Penyakit::all();
      $gejala = Gejala::all();
      return view('konsultasi');
    }
}
