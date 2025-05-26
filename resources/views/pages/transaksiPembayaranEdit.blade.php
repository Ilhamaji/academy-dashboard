@extends('dashboard-layout')
@section('title', 'Transaksi Pembayaran')

@section("dashboard-content")
    @foreach ($errors->all() as $error)
        <div class="text-center bg-red-400 py-2 mt-3 text-white rounded-md">{{$error}}</div>
    @endforeach

    <div class="flex mb-2">
        <a href="/transaksi/pembayaran" class="text-sm hover:text-blue-500">Pembayaran</a>
        <div class="mx-1">/</div>
        <a class="text-sm text-blue-500">Edit</a>
    </div>
        <!-- Modal -->
    <div
    class="flex justify-center items-center transition-opacity duration-300 ease-out z-[9999]"
    >
        <div class="bg-white shadow-md rounded-lg w-9/12 sm:w-7/12 md:w-5/12 lg:w-4/12 scale-95 p-5 transition-transform duration-300 ease-out">
            <!-- Modal Header -->
            <div class="flex justify-between">
                <span>Edit Penerimaan Pembayaran</span>
            </div>
            <hr class="my-4">
            <form action="/transaksi/pembayaran/edit/{{$pembayarans->id}}" method="POST">
                {{ csrf_field() }}
                {{ method_field('put') }}
                <label for="nisn" class="font-semibold text-sm text-gray-600 pb-1 block">Nama Siswa</label>
                <select name="nisn" id="nisn" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" @required(true)>
                    @foreach ($siswas as $siswa)
                        <option value='{{ $siswa->nisn }}' {{$pembayarans->nisn == $siswa->nisn ? 'selected' : ''}}>{{ $siswa->nama_siswa }}</option>
                    @endforeach
                </select>
                <label for="kelas" class="font-semibold text-sm text-gray-600 pb-1 block">Kelas</label>
                <select name="kelas" id="kelas" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full">
                    <option value=''>Pilih kelas jika belum terdaftar</option>
                    @foreach ($kelass as $kelas)
                        <option value='{{ $kelas->id }}' {{$pembayarans->kelas == $kelas->nama_kelas ? 'selected' : ''}}>{{ $kelas->nama_kelas }}</option>
                    @endforeach
                </select>
                <label for="kode_jenis" class="font-semibold text-sm text-gray-600 pb-1 block">Jenis Penerimaan</label>
                <select name="kode_jenis" id="kode_jenis" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" @required(true)>
                    @foreach ($jenis as $j)
                        <option value='{{ $j->kode }}' {{$pembayarans->nama_jenis_penerimaan == $j->nama ? 'selected' : ''}}>{{ $j->nama }}</option>
                    @endforeach
                </select>
                <label for="nominal" class="font-semibold text-sm text-gray-600 pb-1 block">Nominal</label>
                <input id="nominal" type="number" name="nominal" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" value="{{$pembayarans->nominal}}" @required(true)/>
                <label for="tgl" class="font-semibold text-sm text-gray-600 pb-1 block">Tanggal</label>
                <input type="date" name="tgl" id="tgl" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" value="{{$pembayarans->tanggal}}">
                <button type="submit" class="transition duration-200 bg-blue-500 hover:bg-blue-600 focus:bg-blue-700 focus:shadow-sm focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50 text-white w-full py-2.5 rounded-lg text-sm shadow-sm hover:shadow-md font-semibold text-center inline-block">
                    <span class="inline-block">Simpan</span>
                </button>
            </form>
        </div>
    </div>

@endsection
