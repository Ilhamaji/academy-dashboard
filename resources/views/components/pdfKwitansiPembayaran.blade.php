<div class="pdf-wrapper">
    <div class="pdf-header">
        <div class="pdf-header-logo">
            <img src="{{$informasi->logo}}" alt="logo">
        </div>
        <div class="pdf-header-text">
            <h1 class="pdf-header-nama" style="text-transform: uppercase;">{{strtoupper($informasiNama)}}</h1>
            <h4>{{$informasi->alamat}}</h4>
            <h4>Tlp. {{$informasi->no_telp}}</h4>
        </div>
    </div>
    <hr>
    <div class="pdf-title">
        <h2>Kwitansi Transaksi Penerimaan</h2>
        <h2>{{$pembayaran->nama_siswa}}</h2>
        <h4>{{$pembayaran->tanggal}}</h4>
    </div>

    <table class="tabels">
        <thead class="tabels-head">
            <tr class="tabels-r">
                <th scope="col" class="tabels-h">Jenis Transaksi</th>
                <th scope="col" class="tabels-h">Nominal</th>
            </tr>
        </thead>
        <tbody class="tabels-body">
            <tr class="tabels-r">
                <td class="tabels-d" style="text-align: center;">{{$pembayaran->nama_jenis_penerimaan}}</td>
                <td class="tabels-d" style="text-align: center;">Rp {{number_format($pembayaran->nominal, 0);}}</td>
            </tr>
        </tbody>
    </table>

    <table class="tabelss">
        <thead style="text-align: center; float: center; margin: 0 auto;">
            <tr>
                <th scope="col" class="tabel-tit"></th>
                <th scope="col" class="tabel-tit">Surakarta, {{$tanggal}}</th>
            </tr>
        </thead>
    </table>

    <table class="tabel">
        <thead>
            <tr>
                <th scope="col" class="">Mengetahui</th>
                <th scope="col" class="">Mengetahui</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Kepala Sekolah</td>
                <td>Bagian Keuangan</td>
            </tr>
            <tr>
                <td>{{$informasi->nama}}</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>{{$informasi->nama_kepsek}}</td>
                <td>Siti Fatimah</td>
            </tr>
        </tbody>
    </table>
</div>
