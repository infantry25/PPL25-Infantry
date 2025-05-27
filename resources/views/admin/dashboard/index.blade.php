@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row justify-content-center">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-maroon">
                <div class="inner">
                  <h3>{{ $services->count() }}</h3>

                  <p>Layanan</p>
                </div>
                <div class="icon">
                  <i class="fas fa-clipboard-list"></i>
                </div>
                <a href="{{ route('service.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-primary">
                <div class="inner">
                  <h3>{{ $projects->count() }}</h3>

                  <p>Project</p>
                </div>
                <div class="icon">
                    <i class="fas fa-tasks"></i>
                </div>
                <a href="{{ route('project.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>{{ $testimoni->count() }}</h3>

                  <p>Testimoni</p>
                </div>
                <div class="icon">
                    <i class="fas fa-comments"></i>
                </div>
                <a href="{{ route('testimonial.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-olive">
                <div class="inner">
                  <h3>{{ $klien->count() }}</h3>

                  <p>Klien</p>
                </div>
                <div class="icon">
                    <i class="fas fa-handshake"></i>
                </div>
                <a href="{{ route('client.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-lightblue">
                  <div class="inner">
                    <h3>{{ $project_images->count() }}</h3>

                    <p>Galeri Project</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-images"></i>
                  </div>
                  <a href="{{ route('project.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->

        {{-- <section class="content">

            <section class="content">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Petunjuk Pengisian</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <p>Silahkan klik tombol dibawah ini untuk melihat tampilan website</p>
                        <a href="{{ route('home') }}" class="btn btn-outline-success btn-sm me-3 mb-2" target="_blank"><i
                                class="fas fa-eye"></i> Tampilan Website</a>

                        <h4>1. Slider</h4>
                        <p>
                            Pada halaman slider, silahkan Anda masukkan data sesuai dengan kolom yang sudah ditentukan.
                            <br>
                        </p>

                        <h4>2. Service</h4>
                        <p>
                            Silahkan Masukkan data sesuai dengan kolom yang sudah ditentukan.
                            Pada bagian icon, Anda dapat mengunjungi website <a
                                href="https://fontawesome.com/v5/search?o=r&m=free" target="_blank">Fontawesome</a>,
                            kemudian salin icon.
                            <br>
                        </p>

                        <h4>3. Client</h4>
                        <p>
                            Pada halaman client, silahkan Anda masukkan data sesuai dengan kolom yang sudah ditentukan. Lalu
                            pilih tipe Client <strong>(Client/Partner)</strong>.
                        </p>

                        <h4>4. About</h4>
                        <p>
                            Silahkan masukkan data pada halaman about. Untuk image 1 khusus jenis foto potrait.
                        </p>

                        <h4>5. Contact</h4>
                        <p>
                            Pada halaman contact, Anda perlu memasukkan alamat kantor untuk ditampilkan dalam peta. Berikut
                            cara mendapatkan alamat untuk peta lokasi kantor Anda.
                        <ol>
                            <li>Silahkan kunjungi situs google maps.</li>
                            <li>Masukkan alamat kantor Anda.</li>
                            <li>Pilih bagikan dan klik bagian sematkan peta.</li>
                            <li>Salin alamat kedalam HTML.</li>
                        </ol>
                        </p>

                        <h4>6. User Management</h4>
                        <p>
                            Pada halaman ini, Anda dapat menambahkan pengguna serta dapat memberikan hak akses untuk
                            pengguna.
                        </p>
                    </div>

                </div>

            </section>

        </section> --}}

    </div>
@endsection
