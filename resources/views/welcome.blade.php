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
          <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="jumbotron">
              <h1 class="display-4">Selamat Datang di Sistem Pakar DBD!</h1>
              <p class="lead">Penyakit <b class="text-danger" >Demam Dengue</b> merupakan penyakit infeksi yang disebabkan oleh virus dengue dan ditularkan melalui gigitan nyamuk Aedes Aegepty dan Aedes Albopictus.</p>
              <hr class="my-4">
              <p>Anda merasakan beberapa keluhan terkait <b class="text-danger" >Demam Dengue</b> ? Silahkan berkonsultasi melalui platform ini .</p>
              <a class="btn btn-danger btn-lg" href="#" role="button">Konsultasi</a>
            </div>
          </div>
        </div>
      </div>
<br class="divider" >
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-4">
            <div class="card">
              <div class="card-header bg-danger text-light ">
                DBD Tingkat I
              </div>
              <div class="card-body">
                <!-- <h5 class="card-title">Special title treatment</h5> -->
                <p class="card-text">@if ($dbd1) {!! \Illuminate\Support\Str::limit($dbd1->deskripsi, 200, $end='...') !!} @endif</p>
                <a href="#" class="btn btn-danger">Ketahui lebih lanjut</a>
              </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-4">
          <div class="card">
            <div class="card-header bg-danger text-light ">
              DBD Tingkat II
            </div>
            <div class="card-body">
              <!-- <h5 class="card-title">Special title treatment</h5> -->
              <p class="card-text">@if ($dbd2) {!! \Illuminate\Support\Str::limit($dbd2->deskripsi, 200, $end='...') !!} @endif</p>
              <a href="#" class="btn btn-danger">Ketahui lebih lanjut</a>
            </div>
          </div>
      </div>

      <div class="col-lg-4 col-md-4">
        <div class="card">
          <div class="card-header bg-danger text-light ">
            DBD Tingkat III
          </div>
          <div class="card-body">
            <!-- <h5 class="card-title"></h5> -->
            <p class="card-text">@if ($dbd3) {!! \Illuminate\Support\Str::limit($dbd3->deskripsi, 200, $end='...') !!} @endif</p>
            <a href="#" class="btn btn-danger">Ketahui lebih lanjut</a>
          </div>
        </div>
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
