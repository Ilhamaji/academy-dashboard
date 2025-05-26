@extends('dashboard-layout')
@section('title', 'Transaksi Pembayaran')

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
        <p class="text-sm text-blue-500">Pembayaran</p>
        <div class="mx-1">/</div>
    </div>

    @include('components.modalTambahPembayaran')

    <div class="flex flex-col my-6">
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
                                <td class="px-6 py-4 w-20 whitespace-nowrap text-sm text-gray-500">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">{{ $pembayaran->nisn }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">{{ $pembayaran->nama_siswa }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">{{ $pembayaran->kelas }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">{{ $pembayaran->nama_jenis_penerimaan }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">Rp {{ number_format($pembayaran->nominal, 0); }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">{{ $pembayaran->tanggal }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium flex justify-self-end">
                                    <a href="/transaksi/pembayaran/edit/{{$pembayaran->id}}" class="cursor-pointer bg-blue-500 hover:bg-blue-700 p-3 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none">
                                            <path d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </a>

                                    <a onclick="return confirm('Apakah anda yakin untuk menghapus {{ $pembayaran->id }}?')" href="/transaksi/pembayaran/hapus/{{$pembayaran->id}}" class="cursor-pointer bg-red-500 hover:bg-red-700 p-3 rounded-lg group ml-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none">
                                            <path d="M10 11V17" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M14 11V17" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M4 7H20" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M6 7H12H18V18C18 19.6569 16.6569 21 15 21H9C7.34315 21 6 19.6569 6 18V7Z" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{$pembayarans->links()}}
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
