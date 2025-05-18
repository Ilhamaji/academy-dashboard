@extends('dashboard-layout')
@section('title', 'Detail Siswa')

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
        <a href="/laporan/kelas" class="text-sm hover:text-blue-500">Kelas</a>
        <div class="mx-1">/</div>
        <a class="text-sm text-blue-500">Siswa</a>
    </div>

    <form class="flex" action="/laporan/kelas/{{ $id }}" method="POST">
        {{ csrf_field() }}
        <div class="flex flex-row gap-2">
            <div class="flex">
                <input
                name="cari"
                class="bg-white w-full pr-11 h-full pl-3 py-2 bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded transition duration-200 ease focus:outline-none focus:border-slate-400 hover:border-slate-400 shadow-sm focus:shadow-md"
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
        </div>
    </form>

    @include('components.modalTambahSiswa')

    <div class="flex flex-col mt-6">
        <div class="-m-1.5 max-h-[80vh] overflow-auto shadow-md rounded-lg bg-gray-200">
          <div class="p-1.5 min-w-full inline-block align-middle">
            <div class="overflow-hidden">
              <table class="min-w-full divide-y divide-gray-200">
                <thead>
                  <tr>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-black uppercase">No</th>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-black uppercase">NISN</th>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-black uppercase">Nama</th>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-black uppercase">Jenis Kelamin</th>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-black uppercase">Kelas</th>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-black uppercase">Alamat</th>
                    <th scope="col" class="px-6 py-3 text-end text-xs font-bold text-black uppercase">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($siswas as $siswa)
                    <tr class="odd:bg-white even:bg-gray-100">
                        <td class="px-6 py-4 w-20 whitespace-nowrap text-sm text-gray-800">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                            <p class="w-10 lg:w-auto truncate">{{ $siswa->nisn }}</p>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                            <p class="w-20 lg:w-auto truncate">{{ $siswa->nama_siswa }}</p>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                            <p class="w-20 lg:w-auto truncate">{{ $siswa->jenis_kelamin }}</p>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                            <p class="">{{ $siswa->kelas }}</p>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                            <p class="w-20 md:w-40 lg:w-86 truncate">{{ $siswa->alamat }}</p>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium flex justify-self-end">
                            <a href="/laporan/kelas/siswa/{{$siswa->nisn}}" class="cursor-pointer bg-green-500 hover:bg-green-700 p-3 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="#000000" width="20" height="20" viewBox="0 0 16 16">
                                    <g fill="white">
                                        <path d="M8 16a8 8 0 0 1-8-8 8 8 0 0 1 8-8 8 8 0 0 1 8 8 8 8 0 0 1-8 8zm0-1a7 7 0 0 0 7-7 7 7 0 0 0-7-7 7 7 0 0 0-7 7 7 7 0 0 0 7 7z"/>
                                        <path d="M8 3.75c-.386 0-.69.124-.914.373A1.269 1.269 0 0 0 6.75 5c0 .336.112.628.336.877.224.249.528.373.914.373s.69-.124.914-.373c.224-.249.336-.541.336-.877 0-.336-.112-.628-.336-.877C8.69 3.874 8.386 3.75 8 3.75zM7 7v5h2V7z" font-family="Ubuntu" font-weight="400" letter-spacing="0" style="line-height:1000%;-inkscape-font-specification:Ubuntu" word-spacing="0"/>
                                    </g>
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
