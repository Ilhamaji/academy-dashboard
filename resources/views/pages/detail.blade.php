@extends('dashboard-layout')
@section('title', 'Laporan Data Kelas')

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
        <p class="text-sm text-blue-500">Kelas</p>
        <div class="mx-1">/</div>
    </div>

    <div class="flex flex-col mt-6">
        <div class="-m-1.5 max-h-[80vh] overflow-auto shadow-md rounded-lg bg-gray-200">
          <div class="p-1.5 min-w-full inline-block align-middle">
            <div class="overflow-hidden">
              <table class="min-w-full divide-y divide-gray-200">
                <thead>
                  <tr>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-black uppercase">Kelas</th>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-black uppercase">Wali Kelas</th>
                    <th scope="col" class="px-6 py-3 text-end text-xs font-bold text-black uppercase">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($kelass as $kelas)
                    <tr class="odd:bg-white even:bg-gray-100">
                        <td class="px-6 py-4 w-20 whitespace-nowrap text-sm text-gray-800">{{ $kelas->nama_kelas }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{ $kelas->wali_kelas }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium flex justify-self-end">
                            <a href="/laporan/kelas/{{$kelas->id}}" class="cursor-pointer bg-blue-500 hover:bg-blue-700 p-3 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Uploaded to svgrepo.com" width="20" height="20" viewBox="0 0 32 32" xml:space="preserve">
                                    <style type="text/css">
                                        .sharpcorners_een{fill:#fff;}
                                    </style>
                                    <path class="sharpcorners_een" d="M27.828,16L16.414,27.414l-2.828-2.828L20.172,18H5v-4h15.172l-6.586-6.586l2.828-2.828L27.828,16  z"/>
                                </svg>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
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
