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

    <div class="flex justify-between mt-2">
        <a href="{{url('/laporan/siswa/download')}}" class="py-2 px-4 bg-green-500 text-white rounded-md">Export</a>
    </div>

    @include('components.modalTambahSiswa')

    <div class="flex flex-col mt-6">
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
