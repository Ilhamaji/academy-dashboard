@extends('dashboard-layout')
@section('title', 'Pengeluaran')

@section('dashboard-content')
    <div class="flex mb-2">
        <a href="/penerimaan" class="text-sm text-blue-500">Pengeluaran</a>
        <div class="mx-1">/</div>
    </div>

    <div class="text-xl font-bold">Tabel Pengeluaran</div>

    <div class="flex justify-between my-4">
        <a href="{{url('/laporan/pengeluaran/download')}}" class="py-2 px-4 bg-green-500 text-white rounded-md">Export</a>

        <form class="flex" action="/laporan/pembayaran" method="POST">
            {{ csrf_field() }}
            <div class="flex flex-row gap-2">
                <div class="flex">
                    <select name="bulan" id="bulan" class="bg-white h-full px-2 py-2 bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded transition duration-200 ease focus:outline-none focus:border-slate-400 hover:border-slate-400 shadow-sm focus:shadow-md">
                        <option value="">Bulan</option>
                        <option value="1">Januari</option>
                        <option value="2">Februari</option>
                        <option value="3">Maret</option>
                        <option value="4">April</option>
                        <option value="5">Mei</option>
                        <option value="6">Juni</option>
                        <option value="7">Juli</option>
                        <option value="8">Agustus</option>
                        <option value="9">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                </div>
                <div class="flex">
                    <input
                    name="tahun"
                    type="number"
                    class="bg-white w-20 h-full pl-3 py-2 bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded transition duration-200 ease focus:outline-none focus:border-slate-400 hover:border-slate-400 shadow-sm focus:shadow-md"
                    placeholder="2025"
                    />
                    <button
                    class="h-full w-10 ml-2 md:right-1 bg-gray-900 md:top-1 right-[0.1rem] top-[0.1rem] my-auto px-2 flex items-center rounded cursor-pointer"
                    type="submit"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="#fff" class="w-8 h-8 text-slate-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </button>
                </div>
            </div>
        </form>
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
