@extends('dashboard-layout')
@section('title', 'Edit Siswa')

@section("dashboard-content")
    <form method="POST" action="/siswa/edit/{{$s->nisn}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
        <!-- component -->
        @if(session()->has('success'))
            <div class="text-center bg-green-400 py-2 text-white rounded-md">
                {{session()->get('success')}}
            </div>
        @endif

        @if(session()->has('error'))
            <div class="text-center bg-red-400 py-2 text-white rounded-md">
                {{session()->get('error')}}
            </div>
        @endif

        @foreach ($errors->all() as $error)
            <div class="text-center bg-red-400 py-2 mt-3 text-white rounded-md">{{$error}}</div>
        @endforeach

        <div class="grid sm:grid-cols-1 md:grid-cols-1 gap-2 bg-white shadow-md mx-20 px-5 py-5 rounded-lg">
            <div class="text-xl">
                <span class="mr-2">Edit Data</span><span class="text-xl font-bold">{{ $s->nama_siswa }}</span>
            </div>
            <hr class="my-6">
            <div class="">
                <label for="nisn" class="font-semibold text-sm text-gray-600 pb-1 block">NISN</label>
                <input type="text" id="nisn" name="nisn" class="border rounded-lg px-3 py-2 mt-1 text-sm w-full" value="{{$s->nisn}}"  @required(true) />
            </div>
            <div class="">
                <label for="nama_siswa" class="font-semibold text-sm text-gray-600 pb-1 block">Nama</label>
                <input type="text" id="nama_siswa" name="nama_siswa" class="border rounded-lg px-3 py-2 mt-1 text-sm w-full" value="{{$s->nama_siswa}}"  @required(true) />
            </div>
            <div class="">
                <label for="jenis_kelamin" class="font-semibold text-sm text-gray-600 pb-1 block">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="border rounded-lg px-3 py-2 mt-1 text-sm w-full">
                    <option value="Laki-laki" @if($s->jenis_kelamin == 'Laki-laki') selected @endif>Laki-laki</option>
                    <option value="Perempuan" @if($s->jenis_kelamin == 'Perempuan') selected @endif>Perempuan</option>
                </select>
            </div>
            <div class="">
                <label for="kelas" class="font-semibold text-sm text-gray-600 pb-1 block">Kelas</label>
                <select name="kelas" id="kelas" class="border rounded-lg px-3 py-2 mt-1 text-sm w-full">
                    <option value="1" @if($s->kelas == 1) selected @endif>1</option>
                    <option value="2" @if($s->kelas == 2) selected @endif>2</option>
                    <option value="3" @if($s->kelas == 3) selected @endif>3</option>
                    <option value="4" @if($s->kelas == 4) selected @endif>4</option>
                    <option value="5" @if($s->kelas == 5) selected @endif>5</option>
                    <option value="6" @if($s->kelas == 6) selected @endif>6</option>
                </select>
            </div>
            <label for="alamat" class="font-semibold text-sm text-gray-600 pb-1 block" @required(true)>Alamat</label>
            <textarea name="alamat" id="alamat" class="border rounded-lg px-3 py-2 text-sm w-full">{{ $s->alamat }}</textarea>
            <button type="submit" class="transition mt-2 duration-200 bg-blue-500 hover:bg-blue-600 focus:bg-blue-700 focus:shadow-sm focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50 text-white w-full py-2.5 rounded-lg text-sm shadow-sm hover:shadow-md font-semibold text-center inline-block">
                <span class="inline-block">Simpan Perubahan</span>
            </button>
        </div>
    </form>

    @include('components.footer')
@endsection
