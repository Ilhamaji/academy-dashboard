@extends('dashboard-layout')
@section('title', 'Pengeluaran')

@section('dashboard-content')
    <div class="flex mb-2">
        <a href="/penerimaan" class="text-sm text-blue-500">Pengeluaran</a>
        <div class="mx-1">/</div>
    </div>

    <div class="flex justify-between my-4">
        <div class="text-xl font-bold my-auto">Tabel Pengeluaran</div>
        <a href="{{url('/laporan/pengeluaran/download')}}" class="py-2 px-4 bg-green-500 text-white rounded-md">Export</a>
    </div>
    <div class="flex flex-col">
        <div class="-m-1.5 max-h-[80vh] overflow-auto shadow-md rounded-lg bg-gray-200">
          <div class="p-1.5 min-w-full inline-block align-middle">
            <div class="overflow-hidden">
              @include('components.tabelPengeluaran')
            </div>
          </div>
        </div>
    </div>

    @include('components.footer')
@endsection
