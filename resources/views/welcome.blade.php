<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
</head>
<body>
    <div class="container w-75">
     @if (session()->has('success'))
     <div class="alert alert-success" role="alert">
        {{ Session('success') }}
     </div>
     @endif
     @if (isset($errors) && $errors->any())
         <div class="alert alert-danger" role="alert">
            @foreach ($errors->all( ) as $error )
                {{ $error }}
            @endforeach
         </div>
     @endif
        <form action="{{ route('import') }}" method="post" enctype="multipart/form-data" class="mt-4">
            @csrf
            <input type="file" name="file" id="" class="form-control-file">
            <button type="submit" class="btn btn-danger">Import</button>
        </form>
        <a href="{{ route('create') }}" class="float-end"><button class="btn btn-primary">Input Data</button></a>
        @if (session()->has('failures'))
            <table class="table table-warning">
                <tr>
                    <th>Baris ke</th>
                    <th>Attribute</th>
                    <th>Error</th>
                    <th>Value</th>
                </tr>
                @foreach (session()->get('failures') as $validasi )
                    <tr>
                        <td>{{ $validasi->row() }}</td>
                        <td>{{ $validasi->attribute() }}</td>
                        <td>
                            <ul>
                                @foreach ($validasi->errors() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>{{ $validasi->values()[$validasi->attribute()] }}</td>
                    </tr>
                @endforeach
            </table>
            
        @endif
        <table class="table table-bordered mt-4">
            <tr class="text-center">
                <th>No</th>
                <th>Nama</th>
                <th>No Pensiunan</th>
                <th>Alamat</th>
                <th>No Telpon</th>
                <th colspan="2">Action</th>
           </tr>
           <?php $no =1; ?>
        @foreach ($pensiunan as $item)
            <tr>

                <td><?= $no++ ?></td>
                <td>{{ $item['nama'] }}</td>
                <td>{{ $item['no_pensiunan'] }}</td>
                <td>{{ $item['alamat'] }}</td>
                <td>{{ $item['no_telp'] }}</td>
                <td><a href="/delete/{{ $item['no_pensiunan'] }}" class=""><span class="badge bg-danger">Hapus</span></a></td>
                <td><a href="/edit/{{ $item['no_pensiunan'] }}" class=""><span class="badge bg-danger">edit</span></a></td>
            </tr>
        @endforeach
    </table>
</div>
</body>
</html>