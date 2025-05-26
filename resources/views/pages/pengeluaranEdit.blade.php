@extends('dashboard-layout')
@section('title', 'Edit Data Pengeluaran')

@section("dashboard-content")
    @foreach ($errors->all() as $error)
        <div class="text-center bg-red-400 py-2 mt-3 text-white rounded-md">{{$error}}</div>
    @endforeach

    <div class="flex mb-2">
        <a href="/pengeluaran" class="text-sm hover:text-blue-500">Pengeluaran</a>
        <div class="mx-1">/</div>
        <a class="text-sm text-blue-500">Edit</a>
    </div>

    <div class="flex w-full h-[75vh]">
        <form method="POST" action="/pengeluaran/edit/{{$jenis_pengeluaran->kode}}" enctype="multipart/form-data" class="m-auto">
            {{ csrf_field() }}
            {{ method_field('put') }}
            <!-- component -->
            <div class="block gap-2 bg-white shadow-md px-5 py-5 rounded-lg max-w-96">
                <label for="kode" class="font-semibold text-sm text-gray-600 pb-1 block">Kode</label>
                <input type="text" id="kode" type="text" name="kode" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" value="{{$jenis_pengeluaran->kode}}" @required(true)/>
                <label for="nama" class="font-semibold text-sm text-gray-600 pb-1 block">Nama Pengeluaran</label>
                <input type="text" id="nama" type="text" name="nama" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" value="{{$jenis_pengeluaran->nama}}" @required(true)/>
                <button type="submit" class="transition duration-200 bg-blue-500 hover:bg-blue-600 focus:bg-blue-700 focus:shadow-sm focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50 text-white w-full py-2.5 rounded-lg text-sm shadow-sm hover:shadow-md font-semibold text-center inline-block">
                    <span class="inline-block">Simpan</span>
                </button>
            </div>
        </form>
    </div>

@endsection
