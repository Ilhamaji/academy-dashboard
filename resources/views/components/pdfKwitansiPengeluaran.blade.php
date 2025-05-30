<div class="pdf-wrapper">
    <div class="pdf-header">
        <div class="pdf-header-logo">
            <img src="{{$informasi->logo}}" alt="logo">
        </div>
        <div class="pdf-header-text">
            <p class="pdf-header-nama" style="font-size: 1em; font-weight: bold; text-transform: uppercase;">{{strtoupper($informasiNama)}}</p>
            <p style="font-size: 0.85em;">{{$informasi->alamat}} Tlp. {{$informasi->no_telp}}</p>
        </div>
    </div>
    <hr>
    <div style="width: 100%; text-align:center">
        <p style="font-size: 1em; font-weight:bold">Kwitansi Transaksi Pengeluaran</p>
        <table>
            <tbody>
                <tr>
                    <td>
                        <p style="font-size: 0.85em">Tanggal</p>
                    </td>
                    <td>
                        <p style="font-size: 0.85em">:</p>
                    </td>
                    <td style="">
                        <p style="font-size: 0.85em">{{$tgl}}</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <table class="tabels">
        <thead class="tabels-head">
            <tr class="tabels-r">
                <th scope="col" class="tabels-h" style="font-size: 0.85em;padding: 4px;">Kode</th>
                <th scope="col" class="tabels-h" style="font-size: 0.85em;padding: 4px;">Jenis Transaksi</th>
                <th scope="col" class="tabels-h" style="font-size: 0.85em;padding: 4px;">Keterangan</th>
                <th scope="col" class="tabels-h" style="font-size: 0.85em;padding: 4px;">Nominal</th>
            </tr>
        </thead>
        <tbody class="tabels-body">
            <tr class="tabels-r">
                <td class="tabels-d" style="text-align: left;font-size: 0.85em;padding: 4px;">{{$pengeluaran->kode_jenis_pengeluaran}}</td>
                <td class="tabels-d" style="text-align: left;font-size: 0.85em;padding: 4px;">{{$pengeluaran->nama_jenis_pengeluaran}}</td>
                <td class="tabels-d" style="text-align: left;font-size: 0.85em;padding: 4px;">{{$pengeluaran->keterangan}}</td>
                <td class="tabels-d" style="text-align: right;font-size: 0.85em;padding: 4px;">Rp {{number_format($pengeluaran->nominal, 0);}}</td>
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
                <td style="font-size: 0.85em">Kepala Sekolah</td>
                <td style="font-size: 0.85em">Bagian Keuangan</td>
            </tr>
            <tr>
                <td style="font-size: 0.85em">{{$informasi->nama}}</td>
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
                <td style="font-size: 0.85em">{{$informasi->nama_kepsek}}</td>
                <td style="font-size: 0.85em">Siti Fatimah</td>
            </tr>
        </tbody>
    </table>
</div>
