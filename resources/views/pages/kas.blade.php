@extends('dashboard-layout')
@section('title', 'Laporan Rekap Kas')

@section('dashboard-content')
    @if(session()->has('success'))
        <div id="success" class="text-center bg-green-400 py-2 mb-3 text-white rounded-md">
            {{session()->get('success')}}
        </div>
    @endif

    <div id="error" class="text-center bg-red-400 py-2 mb-3 text-white rounded-md {{isset($error) ?  'block' : 'hidden' }}">{{isset($error) ?  $error : '' }}</div>

    <div class="flex mb-2">
        <p class="text-sm text-blue-500">Kas</p>
        <div class="mx-1">/</div>
    </div>

    <div class="{{isset($bulan) && isset($tahun) ? 'flex justify-between' : 'block'}}">
        <form action="/kas/cari/download" method="POST" class="{{isset($bulan) && isset($tahun) ? 'block' : 'hidden'}}">
            {{ csrf_field() }}
            <input type="text" name="bulan" hidden value={{isset($bulan) ? $bulan : ''}}>
            <input type="text" name="tahun" hidden value={{isset($tahun) ? $tahun : ''}}>
            <button type="submit" class="py-2 px-4 bg-green-500 text-white rounded-md">Export</button>
        </form>

        <form class="flex" action="/kas" method="POST">
            {{ csrf_field() }}
            <div class="flex w-full justify-between gap-2">
                <a href="{{url('/kas/download')}}" target="_blank" class="py-2 px-4 bg-green-500 text-white rounded-md {{!isset($bulan) || !isset($tahun) ? 'block' : 'hidden'}}">Export</a>
                <div class="flex flex-row gap-2">
                    <div class="flex">
                        <select name="bulan" id="bulan" class="bg-white h-full px-2 py-2 placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded transition duration-200 ease focus:outline-none focus:border-slate-400 hover:border-slate-400 shadow-sm focus:shadow-md">
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
                        class="bg-white w-20 h-full pl-3 py-2 placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded transition duration-200 ease focus:outline-none focus:border-slate-400 hover:border-slate-400 shadow-sm focus:shadow-md"
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
            </div>
        </form>
    </div>

    <div class="my-4 text-xl font-bold">Penerimaan Pembayaran</div>
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
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{ $pembayaran->nisn }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{ $pembayaran->nama_siswa }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{ $pembayaran->kelas }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{ $pembayaran->nama_jenis_penerimaan }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">Rp {{ number_format($pembayaran->nominal, 0); }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{ $pembayaran->tanggal }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium flex justify-self-end">
                            <a href="/laporan/kelas/siswa/pembayaran/{{ $pembayaran->id }}" class="mx-auto cursor-pointer bg-blue-500 hover:bg-blue-700 p-3 rounded-lg">
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
        <div class="my-6">
            {{ $pembayarans->links() }}
        </div>
    </div>

    <div class="my-4 text-xl font-bold">Penerimaan Lain-lain</div>
    <div class="flex flex-col">
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
                @foreach ($lains as $lain)
                    <tr class="odd:bg-white even:bg-gray-100">
                        <td class="px-6 py-4 w-20 whitespace-nowrap text-sm text-gray-800">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{ $lain->nama_jenis_penerimaan }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">Rp {{ number_format($lain->nominal, 0); }}</td>
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
        <div class="my-6">
            {{ $lains->links() }}
        </div>
    </div>

    <div class="my-4 text-xl font-bold">Pengeluaran</div>
    <div class="flex flex-col">
        <div class="-m-1.5 max-h-[80vh] overflow-auto shadow-md rounded-lg bg-gray-200">
          <div class="p-1.5 min-w-full inline-block align-middle">
            <div class="overflow-hidden">
              <table class="min-w-full divide-y divide-gray-200">
                <thead>
                  <tr>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-black uppercase">No</th>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-black uppercase">Jenis Pengeluaran</th>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-black uppercase">Nominal</th>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-black uppercase">Tanggal</th>
                    <th scope="col" class="px-6 py-3 text-end text-xs font-bold text-black uppercase">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($pengeluarans as $pengeluaran)
                    <tr class="odd:bg-white even:bg-gray-100">
                        <td class="px-6 py-4 w-20 whitespace-nowrap text-sm text-gray-800">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{ $pengeluaran->nama_jenis_pengeluaran }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">Rp {{ number_format($pengeluaran->nominal, 0); }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{ $pengeluaran->tanggal }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium flex justify-self-end">
                            <a href="/laporan/pengeluaran/kwitansi/{{ $pengeluaran->id }}" class="mx-auto cursor-pointer bg-blue-500 hover:bg-blue-700 p-3 rounded-lg">
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
        <div class="my-6">
            {{ $pengeluarans->links() }}
        </div>
    </div>

    <script>
         const error = document.getElementById('error');

         if (error) {
              setTimeout(() => {
                error.style.display = 'none';
              }, 10000);
         }
   </script>
@endsection
