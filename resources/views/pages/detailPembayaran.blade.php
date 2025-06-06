@extends('dashboard-layout')
@section('title', 'Detail Pembayaran')

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
        <a href="/laporan/kelas/{{ $back }}" class="text-sm hover:text-blue-500">Siswa</a>
        <div class="mx-1">/</div>
        <a class="text-sm text-blue-500">Pembayaran</a>
    </div>

    <form class="flex" action="/laporan/kelas/siswa/{{ $nisn }}" method="POST">
        {{ csrf_field() }}
        <div class="flex flex-row gap-2">
            <div class="flex">
                <input
                name="cari"
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

    <div class="flex flex-col mt-6">
        <div class="-m-1.5 max-h-[80vh] overflow-auto shadow-md rounded-lg bg-gray-200">
          <div class="p-1.5 min-w-full inline-block align-middle">
            <div class="overflow-hidden">
              <table class="min-w-full divide-y divide-gray-200">
                <thead>
                  <tr>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-black uppercase">No</th>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-black uppercase">Jenis Penerimaan</th>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-black uppercase">Nominal</th>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-black uppercase">Tanggal</th>
                    <th scope="col" class="px-6 py-3 text-end text-xs font-bold text-black uppercase">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($pembayarans as $pembayaran)
                    <tr class="odd:bg-white even:bg-gray-100">
                        <td class="px-6 py-4 w-20 whitespace-nowrap text-sm text-gray-800">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{ $pembayaran->nama_jenis_penerimaan }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">Rp {{ $pembayaran->nominal }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{ $pembayaran->tanggal }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium flex justify-self-end">
                            <a href="/laporan/kelas/siswa/pembayaran/{{ $pembayaran->id }}" class="mx-auto cursor-pointer bg-gray-400 hover:bg-gray-500 p-3 rounded-lg">
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
@endsection
