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
      return view('konsultasi');
    }

    //konsultasi
    public function analisis(Request $request)
    {
      $nama = $request['nama'];
      $alamat = $request['alamat'];
      $jenis = $request['jenis'];
      $usia = $request['usia'];
      $satuan = $request['satuan'];
      $pekerjaan = $request['pekerjaan'];
      $nomorhp = $request['nomorhp'];
      //get gejala
      $g1 = $request['g1'];
      $g1 = (int)$g1;

      $g2 = $request['g2'];
      $g2 = (int)$g2;

      $g3 = $request['g3'];
      $g3 = (int)$g3;

      $g4 = $request['g4'];
      $g4 = (int)$g4;

      $g5 = $request['g5'];
      $g5 = (int)$g5;

      $g6 = $request['g6'];
      $g6 = (int)$g6;

      $g7 = $request['g7'];
      $g7 = (int)$g7;

      $g8 = $request['g8'];
      $g8 = (int)$g8;

      $g9 = $request['g9'];
      $g9 = (int)$g9;

      $g10 = $request['g10'];
      $g10 = (int)$g10;

      $g11 = $request['g11'];
      $g11 = (int)$g11;

      $g12 = $request['g12'];
      $g12 = (int)$g12;

      $g13 = $request['g13'];
      $g13 = (int)$g13;

      $g14 = $request['g14'];
      $g14 = (int)$g14;

      $total = $g1+$g2+$g3+$g4+$g5+$g6+$g7+$g8+$g9+$g10+$g11+$g12+$g13+$g14;

      if ($total < 4) {

        $pasien = new Pasien;
        $pasien->nama = $nama;
        $pasien->alamat = $alamat;
        $pasien->gender = $jenis;
        $pasien->usia = $usia;
        $pasien->satuan = $satuan;
        $pasien->pekerjaan = $pekerjaan;
        $pasien->nomor_hp = $nomorhp;
        $pasien->penyakit_id = 4;
        $pasien->save();
        $hasil = "Sepertinya anda negatif DBD ! selamat untuk itu !";
        $sarans = "Silahkan hubungi faskes terdekat jika anda tidak yakin dengan hasil kami dan selalu jaga kesehatan !";
        return view('kesimpulan')->with(compact('hasil','sarans', 'total'));
      }
      if ($total >=4 && $total < 6) {
        $pasien = new Pasien;
        $pasien->nama = $nama;
        $pasien->alamat = $alamat;
        $pasien->gender = $jenis;
        $pasien->usia = $usia;
        $pasien->satuan = $satuan;
        $pasien->pekerjaan = $pekerjaan;
        $pasien->nomor_hp = $nomorhp;
        $pasien->penyakit_id = 1;
        $pasien->save();
        $sarans = Penyakit::find(1);
        $hasil = "Sepertinya anda menderita DBD Tingkat I";
        return view('kesimpulan')->with(compact('hasil','sarans', 'total'));
      }

      if ($total > 5 && $total <=7 ) {
        $pasien = new Pasien;
        $pasien->nama = $nama;
        $pasien->alamat = $alamat;
        $pasien->gender = $jenis;
        $pasien->usia = $usia;
        $pasien->satuan = $satuan;
        $pasien->pekerjaan = $pekerjaan;
        $pasien->nomor_hp = $nomorhp;
        $pasien->penyakit_id = 2;
        $pasien->save();
        $sarans = Penyakit::find(2);
        $hasil = "Sepertinya anda menderita DBD Tingkat II";
        return view('kesimpulan')->with(compact('hasil','sarans', 'total'));
      }

      if ($total >=8) {
        $pasien = new Pasien;
        $pasien->nama = $nama;
        $pasien->alamat = $alamat;
        $pasien->gender = $jenis;
        $pasien->usia = $usia;
        $pasien->satuan = $satuan;
        $pasien->pekerjaan = $pekerjaan;
        $pasien->nomor_hp = $nomorhp;
        $pasien->penyakit_id = 3;
        $pasien->save();
        $sarans = Penyakit::find(3);
        $hasil = "Sepertinya anda menderita DBD Tingkat III";
        return view('kesimpulan')->with(compact('hasil','sarans', 'total'));
      }

    }
}
