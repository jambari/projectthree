<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\Pasien;

class DashboardController extends Controller
{
    public function dashboard()
    {
      $dbdi = Pasien::where('penyakit_id',1)->count();
      $dbdii = Pasien::where('penyakit_id',2)->count();
      $dbdiii = Pasien::where('penyakit_id',3)->count();
      $negatif = Pasien::where('penyakit_id',4)->count();
      return view('dashboard')->with(compact('dbdi', 'dbdii', 'dbdiii', 'negatif'));
    }
}
