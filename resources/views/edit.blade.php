<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
</head>
<body>
            <div class="container w-75">
    <form action="/update/{{ $data['no_pensiunan'] }}" method="post">
        @csrf
        <div class="form-input">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="input-group" id="nama" value="{{ $data['nama'] }}">
        </div>
        <div class="form-input">
            <label for="no_pensiunan">No Pensiunan</label>
            <input type="text" name="no_pensiunan" class="input-group" id="no_pensiunan" value="{{ $data['no_pensiunan'] }}" readonly>
        </div>
        <div class="form-input">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" class="input-group" id="alamat" value="{{ $data['alamat'] }}">
        </div>
        <div class="form-input">
            <label for="no_telp">No Telpon</label>
            <input type="text" name="no_telp" class="input-group" id="no_telp" value="{{ $data['no_telp'] }}">
        </div>
        <div class="form-input">
            <button type="submit" class="btn-danger">Simpan</button>
        </div>
    </form>
</div>
</body>
</html>