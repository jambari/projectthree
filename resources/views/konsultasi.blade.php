<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sistem Pakar DBD</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="/css/bootstrap.min.css">

        <!-- Styles -->
        <style>
        </style>

        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
    </head>
    <body class="antialiased">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand text-danger " href="{{ route('home') }}">Sistem Pakar DBD</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor03">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('home') }}">Beranda
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('konsultasi') }}">Konsultasi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('dbdi') }}">DBD Tingkat I</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('dbdii') }}">DBD Tingkat II</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('dbdiii') }}">DBD Tingkat III</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <a href="/admin/login" class="btn btn-secondary my-2 my-sm-0" type="submit">Login</a>
          </form>
        </div>
      </nav>
      <br>

      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-8 col-xs-12 offset-md-2">
            <h5 class="text-danger text-center" >Silahkan isi formulir konsultasi berikut.</h5>
            <form>
              <div class="form-group">
                <label for="exampleInputEmail1">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" aria-describedby="emailHelp" name="nama" required >
              </div>
              <div class="form-group">
                <label for="">Alamat</label>
                <input type="textarea" class="form-control" id="alamat" name="alamat" required>
              </div>
              <div class="form-group">
              <label for="exampleFormControlSelect1">Jenis Kelamin</label>
              <select class="form-control" id="exampleFormControlSelect1" name="jenis_kelamin" >
                <option value="laki-laki" default >laki-laki</option>
                <option value="perempuan" >perempuan</option>
              </select>
            </div>
            <div class="row">
              <div class="col">
                <input type="number" class="form-control" placeholder="usia" name="usia" required>
              </div>
              <div class="col">
                <select class="form-control" id="exampleFormControlSelect1" name="satuan_usia" >
                  <option value="tahun" default >tahun</option>
                  <option value="bulan" >bulan</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="">Pekerjaan</label>
              <input type="text" class="form-control" id="alamat" name="pekerjaan" required>
            </div>
            <div class="form-group">
              <label for="">Nomor HP</label>
              <input type="text" class="form-control" id="alamat" name="nomor_hp" required>
            </div>
              <button type="submit" class="btn btn-danger btn-block">Submit</button>
            </form>
          </div>
      </div>
      </div>
<br>
    <footer class="bg-light" style="padding:10px;">
      <p class=" text-center">&copy; @php  echo "".date("Y")  @endphp Sistem Pakar DBD<br>
    </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <script type="text/javascript">

        </script>
    </body>
</html>
