@extends('dashboard-layout')
@section('title', 'Laporan Jenis Penerimaan')

@section('dashboard-content')
    <div class="flex mb-2">
        <p class="text-sm text-blue-500">Laporan Jenis Penerimaan</p>
        <div class="mx-1">/</div>
    </div>

    <div class="text-xl font-bold">Tabel Jenis Penerimaan</div>

    <div class="flex justify-between mt-2">
        <a href="{{url('/laporan/jenis-penerimaan/download')}}" class="py-2 px-4 bg-green-500 text-white rounded-md hover:bg-green-600">Export</a>
    </div>

    <div class="flex flex-col mt-6">
        <div class="-m-1.5 max-h-[80vh] overflow-auto shadow-md rounded-lg bg-gray-200">
        <div class="p-1.5 min-w-full inline-block align-middle">
            <div class="overflow-hidden">
            @include('components.tabelJenisPenerimaan')
            </div>
        </div>
        </div>
    </div>

    {{$jenis->links()}}

@endsection

