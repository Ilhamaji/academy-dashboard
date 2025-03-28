@extends('dashboard-layout')
@section('title', 'Transaksi Lain-lain')

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
        <p class="text-sm text-blue-500">Lain-lain</p>
        <div class="mx-1">/</div>
    </div>

    <div class="min-h-[75vh]">
        @include('components.modalTambahLainnya')
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

    @include('components.footer')
@endsection
