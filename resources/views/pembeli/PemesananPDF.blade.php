<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak pdf</title>
    <style>

        th{
            text-align: left;
            height: 30px;
        }
        td{
            text-align: left;
        }

    </style>
</head>
<body>
    <div style="text-align: center">
        <h4 style="font-size: 25px">Batik Paoman Indramayu</h4>
        <p>Jalan Siliwangi 315 A, Indramayu</p><hr>
    </div>
<table>
    <tr>
        <td>
        <table >
            <thead>
                <tr>
                    <td width="93"><span style="font-size: x-small;">Nama Pemesan</span></td>
                    <td width="8"><span style="font-size: x-small;">:</span></td>
                    <td width="100"><span style="font-size: x-small;">{{Session::get('nama')}}</span></td>
                </tr>
                <tr>
                    <td width="93"><span style="font-size: x-small;">No HP Pemesan</span></td>
                    <td width="8"><span style="font-size: x-small;">:</span></td>
                    <td width="100"><span style="font-size: x-small;">{{$pemesanan->no_hp}}</span></td>

                </tr>


            </thead>
        </table>
        </td>
        <td style="position: top">
            <div>
                <span style="text-align: right; font-size: x-small;"> Waktu Pemesanan </small></span>
                <span style="font-size: x-small;">:</span>
                <span style="font-size: x-small;">{{$pemesanan->tanggal}}</span>
            </div>
            <div>
                @if($pemesanan->metode_pembayaran == 1)
                <span style="text-align: right; font-size: x-small;">Metode Pembayaran : Transfer</small></span>
                @else
                <span style="text-align: right; font-size: x-small;">Metode Pembayaran : Bayar ditempat</small></span>
                @endif
            </div>
        </td>
    </tr>
</table>
<br>
    <table class="table" style="width:100%; border-top:1px solid grey;">
        <thead>
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Jumlah Beli</th>
            <th>Harga</th>
            <th>Jumlah Harga</th>
        </tr>
        </thead>
        <tbody style="border-top:1px solid grey;">
        <?php
            $no = 1;
        ?>
        @foreach($keranjang as $keranjang)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{$keranjang->produk->nama}}</td>
                <td>{{$keranjang->qty}}</td>
                <td>Rp.{{number_format($keranjang->produk->harga)}}</td>
                <td>Rp.{{number_format($keranjang->jumlah_harga)}}</td>

            </tr>

        @endforeach
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td style="border-top:1px solid grey; height:30px;"><b> Total Harga </b></td>
            <td style="border-top:1px solid grey; height:30px;"><b>Rp.{{number_format($total)}}</b></td>
        </tr>
        </tbody>

    </table>
</body>
</html>
