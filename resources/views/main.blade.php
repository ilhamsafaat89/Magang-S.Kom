<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Main Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">ILHAM-5C</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    <a class="nav-link" href="#informasimagang">Informasi Magang</a>
                </div>
            </div>
        </div>
    </nav>

    <section id="plotpembimbing">
        <div class="container">
            <div class="row mb-2">
                <div class="col-md-6">
                    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column">
                            <strong class="d-inline-block mb-2 text-primary">Plot Pembimbing</strong>
                            <h3 class="mb-0">Data Mahasiswa</h3>
                            <div class="mb-1 text-muted">{{ $tanggal }}</div>
                            <p class="card-text mb-auto">Ini adalah data mahasiswa yang sudah plotting pembimbing.</p>
                            {{-- <a href="#" class="stretched-link">Continue reading</a> --}}
                        </div>
                        <div class="col-auto d-none d-lg-block">
                            <h1 class="p-5">{{ $mahasiswas->count() }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column">
                            <strong class="d-inline-block mb-2 text-primary">Pembimbing</strong>
                            <h3 class="mb-0">Data Pembimbing</h3>
                            <div class="mb-1 text-muted">{{ $tanggal }}</div>
                            <p class="card-text mb-auto">Ini adalah data semua pembimbing yang tersedia dan siap untuk membimbing mahasiswa.</p>
                            {{-- <a href="#" class="stretched-link">Continue reading</a> --}}
                        </div>
                        <div class="col-auto d-none d-lg-block">
                            <h1 class="p-5">{{ $pembimbings->count() }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="informasimagang">
        <div class="container px-5">
            <h1 class="text-center">Informasi Magang</h1>
            @if($magangs->count() > 0)
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 py-5">
                @foreach($magangs as $magang)
                <div class="col">
                    <div class="card shadow-sm">
                        <img style="background-repeat:no-repeat;background-size:cover; width:335px;height:300px;" src="{{ asset('storage/uploads/'.$magang->gambar) }}" alt="">
                        <div class="card-body">
                            <h5 class="card-title">{{ $magang->nama_perusahaan }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $magang->posisi }}</h6>
                            <p class="card-text">{{ $magang->deskripsi }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="/detailmagang/{{ $magang->id }}" class="btn btn-sm btn-outline-info">Detail</a>
                                </div>
                                <small class="text-muted">9 mins</small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <h3 class="text-center mt-5">Tidak tersedia.</h3>
            @endif
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
