<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>LAPORAN BARANG KELUAR</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
    </style>
    <body style="font-family: 'Roboto', sans-serif">
        
        <div class="d-flex justify-content-between">
            <div>
                <img src="{{ asset('images/intek.png') }}" alt="" width="45%">
            </div>
            <div style="margin-top: 20px; margin-left: -285px">
                <center>
                    <h4><b>PT. SOLUSI INTEK INDONESIA</b></h4>
                    <h5><b>BARANG KELUAR</b></h5>
                    <p><b>{{ date('d F Y', strtotime($dari_tanggal)) }} - {{ date('d F Y', strtotime($sampai_tanggal)) }}</b></p>
                </center>
            </div>
            <div></div>
        </div>

        {{-- <div class="container"> --}}
            <table width="100%" class="table table-striped mt-4">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama Barang</th>
                        <th>Qty</th>
                        <th>Keterangan</th>
                        <th>USER</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $row)
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td class="text-center">{{ $row->tanggal }}</td>
                        <td>{{ $row->nama_item }}</td>
                        <td class="text-center">{{ $row->qty }}</td>
                        <td>{{ $row->keterangan }}</td>
                        <td>{{ $row->name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        {{-- </div> --}}


        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        {{-- <script>
            window.print()
        </script> --}}
    </body>
</html>