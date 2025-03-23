@extends('dashboard-layout')
@section('title', 'Pembayaran')

@section('dashboard-content')
    @if(session()->has('success'))
        <div id="success" class="text-center bg-green-400 py-2 mb-3 text-white rounded-md">
            {{session()->get('success')}}
        </div>
    @endif

    @foreach ($errors->all() as $error)
        <div id="error-{{ $loop->iteration }}" class="text-center bg-red-400 py-2 mb-3 text-white rounded-md">{{$error}}</div>
    @endforeach

    <div class="flex">
        <button id="openModalButton" type="button" class="transition hover:cursor-pointer duration-200 font-bold p-4 bg-gradient-to-br from-gray-800 to-gray-900 focus:bg-blue-700 focus:shadow-sm focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50 text-white py-2.5 rounded-lg text-sm shadow-sm hover:shadow-md font-semibold text-center flex">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="fff">
                    <path d="M6 12H18M12 6V18" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </span>
            <span class="inline my-auto ml-1">Pembayaran</span>
        </button>
        @include('components.modalTambahPembayaran')
        <button id="openModalButtons" type="button" class="ml-2 transition hover:cursor-pointer duration-200 p-4 bg-gradient-to-br from-gray-800 to-gray-900 focus:bg-blue-700 focus:shadow-sm focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50 text-white py-2.5 rounded-lg text-sm shadow-sm hover:shadow-md font-semibold text-center flex">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="fff">
                    <path d="M6 12H18M12 6V18" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </span>
            <span class="inline my-auto ml-1 font-bold">Lain-lain</span>
        </button>
        @include('components.modalTambahLainnya')
    </div>

    <div class="overflow-auto mt-6 w-full shadow-md rounded-lg max-h-[90vh]">
        <table class="table-auto border-collapse w-full">
          <thead>
            <tr class="rounded-lg text-xs md:text-sm font-medium text-gray-500 bg-slate-200 text-left">
              <th class="p-4"><p class="truncate text-center">No</p></th>
              <th class="p-4"><p class="truncate">NISN</p></th>
              <th class="p-4"><p class="truncate">Nama</p></th>
              <th class="p-4"><p class="truncate">Kelas</p></th>
              <th class="p-4"><p class="truncate">Pembayaran</p></th>
              <th class="p-4"><p class="truncate">Nominal</p></th>
              <th class="p-4"><p class="truncate">Tanggal</p></th>
              <th class="p-4"><p class="truncate">Aksi</p></th>
            </tr>
          </thead>
          <tbody class="text-xs md:text-sm font-normal text-gray-700 bg-white">
            @foreach ($pembayarans as $pembayaran)
                <tr class="hover:bg-gray-100 border-gray-200 border-b">
                    <td class="p-4 text-center font-bold"><p class="truncate">{{ $loop->iteration }}</td>
                    <td class="p-4"><p class="w-10 md:w-auto truncate">{{ $pembayaran->nisn }}</td>
                    <td class="p-4"><p class="w-auto md:w-auto truncate">{{ $pembayaran->nama_siswa }}</td>
                    <td class="p-4"><p class="w-auto md:w-auto truncate">{{ $pembayaran->kelas }}</td>
                    <td class="p-4"><p class="w-12 md:w-auto truncate {{ $pembayaran->keterangan === 'spp' ? 'uppercase' : 'capitalize'}} ">{{ $pembayaran->keterangan }}</td>
                    <td class="p-4"><p class="truncate">Rp {{ $pembayaran->nominal }}</td>
                    <td class="p-4"><p class="w-auto md:w-auto lg:w-auto truncate">{{ $pembayaran->tanggal }}</td>
                    <td class="p-4 w-32">
                        <p class="flex mx-auto">
                            <a href="" class="cursor-pointer bg-blue-500 hover:bg-blue-700 p-3 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none">
                                    <path d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>

                            <a onclick="return confirm('Apakah anda yakin untuk menghapus ?')" href="" class="cursor-pointer bg-red-500 hover:bg-red-700 p-3 rounded-lg group ml-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none">
                                    <path d="M10 11V17" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M14 11V17" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M4 7H20" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M6 7H12H18V18C18 19.6569 16.6569 21 15 21H9C7.34315 21 6 19.6569 6 18V7Z" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </p>
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
    </div>

    <div class="overflow-auto mt-6 w-full shadow-md rounded-lg max-h-[90vh]">
        <table class="table-auto border-collapse w-full">
          <thead>
            <tr class="rounded-lg text-xs md:text-sm font-medium text-gray-500 bg-slate-200 text-left">
              <th class="p-4"><p class="truncate text-center">No</p></th>
              <th class="p-4"><p class="truncate">Keterangan</p></th>
              <th class="p-4"><p class="truncate">Nominal</p></th>
              <th class="p-4"><p class="truncate">Tanggal</p></th>
              <th class="p-4"><p class="truncate">Aksi</p></th>
            </tr>
          </thead>
          <tbody class="text-xs md:text-sm font-normal text-gray-700 bg-white">
            @foreach ($lains as $lain)
                <tr class="hover:bg-gray-100 border-gray-200 border-b">
                    <td class="p-4 text-center font-bold"><p class="truncate">{{ $loop->iteration }}</td>
                    <td class="p-4"><p class="w-12 md:w-auto truncate {{ $lain->keterangan === 'bos' ? 'uppercase' : 'capitalize'}} ">{{ $lain->keterangan }}</td>
                    <td class="p-4"><p class="truncate">Rp {{ $lain->nominal }}</td>
                    <td class="p-4"><p class="w-auto md:w-auto lg:w-auto truncate">{{ $lain->tanggal }}</td>
                    <td class="p-4 w-32">
                        <p class="flex mx-auto">
                            <a href="" class="cursor-pointer bg-blue-500 hover:bg-blue-700 p-3 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none">
                                    <path d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>

                            <a onclick="return confirm('Apakah anda yakin untuk menghapus ?')" href="" class="cursor-pointer bg-red-500 hover:bg-red-700 p-3 rounded-lg group ml-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none">
                                    <path d="M10 11V17" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M14 11V17" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M4 7H20" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M6 7H12H18V18C18 19.6569 16.6569 21 15 21H9C7.34315 21 6 19.6569 6 18V7Z" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </p>
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
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
