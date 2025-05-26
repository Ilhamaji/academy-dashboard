@extends('dashboard-layout')
@section('title', 'Siswa')

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
        <p class="text-sm text-blue-500">Siswa</p>
        <div class="mx-1">/</div>
    </div>

    <div class="text-xl font-bold">Tabel Data Siswa</div>

    <div class="flex flex-col md:flex-row gap-3 sm:justify-between">
        <a href="{{url('/laporan/siswa/download')}}" class="py-2 px-4 bg-green-500 text-white rounded-md">Export</a>

        <form class="flex" action="/laporan/siswa/cari" method="GET">
            <div class="flex">
                <input
                name="cari"
                class="bg-white w-full pr-11 h-full pl-3 py-2 placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded transition duration-200 ease focus:outline-none focus:border-slate-400 hover:border-slate-400 shadow-sm focus:shadow-md"
                placeholder="Cari siswa..."
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
        </form>
    </div>

    <div class="flex flex-col mt-4">
        <div class="-m-1.5 h-full overflow-auto shadow-md rounded-lg bg-gray-200">
          <div class="p-1.5 min-w-full inline-block align-middle">
            <div class="overflow-hidden">
              @include("components.tabelSiswa")
            </div>
          </div>
        </div>
        <div class="my-6">{{ $siswas->links() }}</div>
    </div>

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

@endsection
