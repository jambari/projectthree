@extends(backpack_view('blank'))
@section('content')
<nav aria-label="breadcrumb" class="d-none d-lg-block">
  <ol class="breadcrumb bg-transparent p-0 {{ config('backpack.base.html_direction') == 'rtl' ? 'justify-content-start' : 'justify-content-end' }}">
        <li class="breadcrumb-item text-capitalize"><a href="">Admin</a></li>
        <li class="breadcrumb-item text-capitalize active" aria-current="page">Dashboard</li>
  </ol>
</nav>
<div class="container">
  <div class="card card-outline card-primary">
    <div class="card-body">
      <div class="card bg-light mb-3" style="max-width: rem;">
        <div class="card-header">Summary</div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-3">
              <div class="card border-primary mb-3" style="max-width: 20rem;">
                <div class="card-header">DBD Tingkat I</div>
                <div class="card-body">
                  <h4 class="card-title">{{ $dbdi ?? '0' }}</h4>
                  <p class="card-text">Pengguna</p>
                </div>
              </div>
            </div>

            <div class="col-md-3">
              <div class="card border-primary mb-3" style="max-width: 20rem;">
                <div class="card-header">DBD Tingkat II</div>
                <div class="card-body">
                  <h4 class="card-title">{{ $dbdii ?? '0' }}</h4>
                  <p class="card-text">Pengguna</p>
                </div>
              </div>
            </div>

            <div class="col-md-3">
              <div class="card border-primary mb-3" style="max-width: 20rem;">
                <div class="card-header">DBD Tingkat III</div>
                <div class="card-body">
                  <h4 class="card-title">{{ $dbdiii ?? '0' }} </h4>
                  <p class="card-text">Pengguna</p>
                </div>
              </div>
            </div>

            <div class="col-md-3">
              <div class="card border-primary mb-3" style="max-width: 20rem;">
                <div class="card-header">Negatif DBD</div>
                <div class="card-body">
                  <h4 class="card-title">{{ $negatif ?? '0'}} </h4>
                  <p class="card-text">Pengguna</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection
