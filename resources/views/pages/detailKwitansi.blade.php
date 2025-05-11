@extends('dashboard-layout')
@section('title', 'Detail Pembayaran')

@section('dashboard-content')
    @if(session()->has('success'))
        <div id="success" class="text-center bg-green-400 py-2 mb-3 text-white rounded-md">
            {{session()->get('success')}}
        </div>
    @endif

    @foreach ($errors->all() as $error)
        <div id="error-{{ $loop->iteration }}" class="text-center bg-red-400 py-2 mb-3 text-white rounded-md">{{$error}}</div>
    @endforeach

    <div class="flex mb-2">
        <a href="/detail" class="text-sm hover:text-blue-500">Kelas</a>
        <div class="mx-1">/</div>
        <a href="/detail/kelas/{{ $backKelas }}" class="text-sm hover:text-blue-500">Siswa</a>
        <div class="mx-1">/</div>
        <a href="/detail/kelas/siswa/{{ $back }}" class="text-sm hover:text-blue-500">Pembayaran</a>
        <div class="mx-1">/</div>
        <a class="text-sm text-blue-500">Kwitansi</a>
    </div>

    @include('components.kwitansiPembayaran')

@endsection
