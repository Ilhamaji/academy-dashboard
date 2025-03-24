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

    <div class="my-6 text-xl font-bold">Tabel Pembayaran</div>
    <div class="flex flex-col">
        <div class="-m-1.5 max-h-[80vh] overflow-auto shadow-md rounded-lg bg-gray-200">
          <div class="p-1.5 min-w-full inline-block align-middle">
            <div class="overflow-hidden">
              <table class="min-w-full divide-y divide-gray-200">
                <thead>
                  <tr>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-black uppercase">No</th>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-black uppercase">NISN</th>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-black uppercase">Nama</th>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-black uppercase">Kelas</th>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-black uppercase">Keterangan</th>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-black uppercase">Nominal</th>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-black uppercase">Tanggal</th>
                    <th scope="col" class="px-6 py-3 text-end text-xs font-bold text-black uppercase">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($pembayarans as $pembayaran)
                    <tr class="odd:bg-white even:bg-gray-100">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{ $pembayaran->nisn }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{ $pembayaran->nama_siswa }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{ $pembayaran->kelas }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 {{ $pembayaran->keterangan === 'spp' ? 'uppercase' : 'capitalize' }}">{{ $pembayaran->keterangan }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{ $pembayaran->nominal }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{ $pembayaran->tanggal }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium flex justify-self-end">
                            <a href="/penerimaan/pembayaran/{{ $pembayaran->id }}" class="mx-auto cursor-pointer bg-blue-500 hover:bg-blue-700 p-3 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none">
                                    <circle cx="12" cy="12" r="3" stroke="#fff" stroke-width="2"/>
                                    <path d="M20.188 10.9343C20.5762 11.4056 20.7703 11.6412 20.7703 12C20.7703 12.3588 20.5762 12.5944 20.188 13.0657C18.7679 14.7899 15.6357 18 12 18C8.36427 18 5.23206 14.7899 3.81197 13.0657C3.42381 12.5944 3.22973 12.3588 3.22973 12C3.22973 11.6412 3.42381 11.4056 3.81197 10.9343C5.23206 9.21014 8.36427 6 12 6C15.6357 6 18.7679 9.21014 20.188 10.9343Z" stroke="#fff" stroke-width="2"/>
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

    <div class="my-6 text-xl font-bold">Tabel Lain-lain</div>
    <div class="flex flex-col">
        <div class="-m-1.5 max-h-[80vh] overflow-auto shadow-md rounded-lg bg-gray-200">
          <div class="p-1.5 min-w-full inline-block align-middle">
            <div class="overflow-hidden">
              <table class="min-w-full divide-y divide-gray-200">
                <thead>
                  <tr>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-black uppercase">No</th>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-black uppercase">Keterangan</th>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-black uppercase">Nominal</th>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-black uppercase">Tanggal</th>
                    <th scope="col" class="px-6 py-3 text-end text-xs font-bold text-black uppercase">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($lains as $lain)
                    <tr class="odd:bg-white even:bg-gray-100">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 {{ $lain->keterangan === 'bos' ? 'uppercase' : 'capitalize' }}">{{ $lain->keterangan }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{ $lain->nominal }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{ $lain->tanggal }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium flex justify-self-end">
                            <a href="/penerimaan/lain-lain/{{ $lain->id }}" class="mx-auto cursor-pointer bg-blue-500 hover:bg-blue-700 p-3 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none">
                                    <circle cx="12" cy="12" r="3" stroke="#fff" stroke-width="2"/>
                                    <path d="M20.188 10.9343C20.5762 11.4056 20.7703 11.6412 20.7703 12C20.7703 12.3588 20.5762 12.5944 20.188 13.0657C18.7679 14.7899 15.6357 18 12 18C8.36427 18 5.23206 14.7899 3.81197 13.0657C3.42381 12.5944 3.22973 12.3588 3.22973 12C3.22973 11.6412 3.42381 11.4056 3.81197 10.9343C5.23206 9.21014 8.36427 6 12 6C15.6357 6 18.7679 9.21014 20.188 10.9343Z" stroke="#fff" stroke-width="2"/>
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
    @include('components.footer')
@endsection
