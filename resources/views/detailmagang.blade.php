<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <div class="row mt-5 py-5 justify-content-center">
            <div class="col-6">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ asset('storage/uploads/'.$detailmagang->gambar) }}" class="img-fluid rounded-start" alt="{{ $detailmagang->nama_perusahaan }}" width="100%" height="100%">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $detailmagang->nama_perusahaan }}</h5>
                                <p class="card-text">{{ $detailmagang->nama_perusahaan }} adalah lorem, ipsum dolor sit amet consectetur adipisicing elit. Perferendis suscipit molestias voluptatum di {{ $detailmagang->alamat }}</p>
                                <p class="card-text"><small class="text-muted">Terakhir diubah tanggal
                                        {{Carbon\Carbon::parse($detailmagang->updated_at)->format('d-m-Y') ?? '' }}.
                                    </small></p>
                                <a href="/" class="btn btn-primary">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>

