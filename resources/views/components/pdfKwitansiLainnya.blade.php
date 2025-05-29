<div class="pdf-wrapper">
    <div class="pdf-header">
        <div class="pdf-header-logo">
            <img src="{{$informasi->logo}}" alt="logo">
        </div>
        <div class="pdf-header-text">
            <p class="pdf-header-nama" style="font-size: 1em; font-weight: bold; text-transform: uppercase;">{{strtoupper($informasiNama)}}</p>
            <p style="font-size: 0.5em;">{{$informasi->alamat}} Tlp. {{$informasi->no_telp}}</p>
        </div>
    </div>
    <hr>
    <div style="width: 100%; text-align:center">
        <p style="font-size: 1em; font-weight:bold">Kwitansi Transaksi Penerimaan</p>
        <table style="width: 100%;">
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <p style="font-size: 0.7em"></p>
                    </td>
                    <td style="text-align: right;">
                        <p style="font-size: 0.7em">{{$lain->tanggal}}</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <table class="tabels">
        <thead class="tabels-head">
            <tr class="tabels-r">
                <th scope="col" class="tabels-h" style="font-size: 0.7em;padding: 4px;">Kode</th>
                <th scope="col" class="tabels-h" style="font-size: 0.7em;padding: 4px;">Jenis Transaksi</th>
                <th scope="col" class="tabels-h" style="font-size: 0.7em;padding: 4px;">Nominal</th>
            </tr>
        </thead>
        <tbody class="tabels-body">
            <tr class="tabels-r">
                <td class="tabels-d" style="text-align: left;font-size: 0.7em;padding: 4px;">{{$lain->kode_jenis_penerimaan}}</td>
                <td class="tabels-d" style="text-align: left;font-size: 0.7em;padding: 4px;">{{$lain->nama_jenis_penerimaan}}</td>
                <td class="tabels-d" style="text-align: right;font-size: 0.7em;padding: 4px;">Rp {{number_format($lain->nominal, 0);}}</td>
            </tr>
        </tbody>
    </table>

    <table class="tabelss">
        <thead style="text-align: center; float: center; margin: 0 auto;">
            <tr>
                <th scope="col" class="tabel-tit"></th>
                <th scope="col" class="tabel-tit"  style="font-size: 1.5em">Surakarta, {{$tanggal}}</th>
            </tr>
        </thead>
    </table>

    <table style="width: 100%; text-align:center; margin-top:20px">
        <tbody>
            <tr>
                <td style="font-size: 0.7em">Kepala Sekolah</td>
                <td style="font-size: 0.7em">Bagian Keuangan</td>
            </tr>
            <tr>
                <td style="font-size: 0.7em">{{$informasi->nama}}</td>
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
                <td style="font-size: 0.7em">{{$informasi->nama_kepsek}}</td>
                <td style="font-size: 0.7em">Siti Fatimah</td>
            </tr>
        </tbody>
    </table>
</div>
