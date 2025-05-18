<div class="pdf-wrapper">
    <div class="pdf-header">
        <div class="pdf-header-logo">
            <img src="{{$informasi->logo}}" alt="logo">
        </div>
        <div class="pdf-header-text">
            <h1>{{$informasi->nama}}</h1>
            <h4>{{$informasi->alamat}}</h4>
            <h4>Tlp. {{$informasi->no_telp}}</h4>
        </div>
    </div>
    <hr>
    <div class="pdf-title">
        <h2>Laporan Keuangan</h2>
        <h2>Tahun {{$tahun}}</h2>
    </div>

    <table class="tabels">
        <thead class="tabels-head">
            <tr class="tabels-r">
                <th scope="col" class="tabels-h">No</th>
                <th scope="col" class="tabels-h">NISN</th>
                <th scope="col" class="tabels-h">Nama</th>
            </tr>
        </thead>
        <tbody class="tabels-body">
            <tr class="tabels-r">
                <td class="tabels-d tabels-num">1</td>
                <td class="tabels-d">Penerimaan Pembayaran</td>
                <td class="tabels-d" style="text-align: right;">Rp {{number_format($pembayarans, 0);}}</td>
            </tr>
            <tr class="tabels-r">
                <td class="tabels-d tabels-num">2</td>
                <td class="tabels-d">Penerimaan Lain-lain</td>
                <td class="tabels-d" style="text-align: right;">Rp {{number_format($lains, 0);}}</td>
            </tr>
            <tr class="tabels-r">
                <td class="tabels-d" style="text-align: center; font-weight: bold;" colspan="2">Total Penerimaan</td>
                <td class="tabels-d" style="text-align: right; font-weight: bold;">Rp {{number_format($pembayarans + $lains, 0);}}</td>
            </tr>
            <tr class="tabels-r">
                <td class="tabels-d tabels-num">1</td>
                <td class="tabels-d">Pengeluaran</td>
                <td class="tabels-d" style="text-align: right;">Rp {{number_format($pengeluarans, 0);}}</td>
            </tr>
            <tr class="tabels-r">
                <td class="tabels-d" style="text-align: center; font-weight: bold;" colspan="2">Saldo Akhir Kas</td>
                <td class="tabels-d" style="text-align: right; font-weight: bold;">Rp {{number_format(($pembayarans + $lains) - $pengeluarans, 0);}}</td>
            </tr>
        </tbody>
    </table>

    <table class="tabelss">
        <thead style="text-align: center; float: center; margin: 0 auto;">
            <tr>
                <th scope="col" class="tabel-tit"></th>
                <th scope="col" class="tabel-tit">Surakarta,.....................</th>
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
