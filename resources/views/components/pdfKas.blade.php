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
        <h2>Laporan Keuangan</h2>
        <h2>Tahun {{$tahun}}</h2>
    </div>

    <table class="tabels">
        <thead class="tabels-head">
            <tr class="tabels-r">
                <th scope="col" class="tabels-h">Jenis Transaksi</th>
                <th scope="col" class="tabels-h">Jumlah</th>
                <th scope="col" class="tabels-h">Total</th>
            </tr>
        </thead>
        <tbody class="tabels-body">
            @foreach ($pembayarans as $pembayaran)
                <tr class="tabels-r">
                    <td class="tabels-d">{{$pembayaran->jenis}}</td>
                    <td class="tabels-d" style="text-align: right;">{{$pembayaran->jumlah}}</td>
                    <td class="tabels-d" style="text-align: right;">Rp {{number_format($pembayaran->nominal, 0);}}</td>
                </tr>
            @endforeach
            <tr class="tabels-r">
                <td class="tabels-d">Penerimaan Lain-lain</td>
                <td class="tabels-d" style="text-align: right;">{{$lains->jumlah}}</td>
                <td class="tabels-d" style="text-align: right;">Rp {{number_format($lains->nominal, 0);}}</td>
            </tr>
            <tr class="tabels-r">
                <td class="tabels-d" style="text-align: center; font-weight: bold;" colspan="2">Total Penerimaan</td>
                <td class="tabels-d" style="text-align: right; font-weight: bold;">Rp {{number_format($total_pembayarans + $lains->nominal, 0);}}</td>
            </tr>
            @foreach ($pengeluarans as $pengeluaran)
                <tr class="tabels-r">
                    <td class="tabels-d">{{$pengeluaran->jenis}}</td>
                    <td class="tabels-d" style="text-align: right;">{{$pengeluaran->jumlah}}</td>
                    <td class="tabels-d" style="text-align: right;">Rp {{number_format($pengeluaran->nominal, 0);}}</td>
                </tr>
            @endforeach
            <tr class="tabels-r">
                <td class="tabels-d" style="text-align: center; font-weight: bold;" colspan="2">Total Pengeluaran</td>
                <td class="tabels-d" style="text-align: right; font-weight: bold;">Rp {{number_format($total_pengeluarans, 0)}}</td>
            </tr>
            <tr class="tabels-r">
                <td class="tabels-d" style="text-align: center; font-weight: bold;" colspan="2">Saldo Akhir Kas</td>
                <td class="tabels-d" style="text-align: right; font-weight: bold;">Rp {{number_format(($total_pembayarans + $lains->nominal) - $total_pengeluarans, 0);}}</td>
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
