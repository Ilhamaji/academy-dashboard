@extends('dashboard-layout')
@section('title', 'Pembayaran')

@section("dashboard-content")
    <form method="POST" action="/penerimaan/pembayaran" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
        <!-- component -->
        @if(session()->has('success'))
            <div class="text-center bg-green-400 py-2 text-white rounded-md">
                {{session()->get('success')}}
            </div>
        @endif

        @foreach ($errors->all() as $error)
            <div class="text-center bg-red-400 py-2 mt-3 text-white rounded-md">{{$error}}</div>
        @endforeach

        <div class="grid sm:grid-cols-1 md:grid-cols-1 gap-2 bg-white shadow-md px-5 py-5 rounded-lg">
            <div class="text-xl">
                <span class="mr-1">Tambah Data Pembayaran</span>
            </div>
            <hr class="my-5">
            <div class="">
                <label for="kelas" class="font-semibold text-sm text-gray-600 pb-1 block">Kelas</label>
                <select name="kelas" id="kelas" class="border rounded-lg px-3 py-2 mt-1 text-sm w-full">
                    @foreach ($siswas as $siswa)
                        <option value="{{ $siswa->nama_siswa }}">{{ $siswa->nama_siswa }}</option>
                    @endforeach
                </select>
            </div>
            <label for="alamat" class="font-semibold text-sm text-gray-600 pb-1 block" @required(true)>Alamat</label>
            <textarea name="alamat" id="alamat" class="border rounded-lg px-3 py-2 text-sm w-full"></textarea>
            <button type="submit" class="transition mt-2 duration-200 bg-blue-500 hover:bg-blue-600 focus:bg-blue-700 focus:shadow-sm focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50 text-white w-full py-2.5 rounded-lg text-sm shadow-sm hover:shadow-md font-semibold text-center inline-block">
                <span class="inline-block">Simpan Perubahan</span>
            </button>
        </div>
    </form>

    <script>
        const success = document.getElementById('success');
        const error1 = document.getElementById('error-1');
        const error2 = document.getElementById('error-2');
        const error3 = document.getElementById('error-3');

        if (success) {
             setTimeout(() => {
               success.style.display = 'none';
             }, 10000);
        }

        if (error1) {
             setTimeout(() => {
               error1.style.display = 'none';
             }, 10000);
        }

        if (error2) {
             setTimeout(() => {
               error2.style.display = 'none';
             }, 10000);
        }

        if (error3) {
             setTimeout(() => {
               error3.style.display = 'none';
             }, 10000);
        }
    </script>
    @include('components.footer')
@endsection
