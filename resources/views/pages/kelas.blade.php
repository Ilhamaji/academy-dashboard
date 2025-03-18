@extends('dashboard-layout')
@section('title', 'Kelas')

@section('dashboard-content')
    @if(session()->has('success'))
        <div id="success" class="text-center bg-green-400 py-2 mb-3 text-white rounded-md">
            {{session()->get('success')}}
        </div>
    @endif

    @foreach ($errors->all() as $error)
        <div id="error-{{ $loop->iteration }}" class="text-center bg-red-400 py-2 mb-3 text-white rounded-md">{{$error}}</div>
    @endforeach

    <div class="grid grid-cols-2 gap-4">
        <div class="w-auto h-fit bg-wite shadow-md rounded-lg p-10">
            <div class="text-xl font-bold">Tambah Kelas</div>
            <hr class="my-6">
            <form action="/kelas" method="POST">
                {{ csrf_field() }}
                <label for="nama_kelas" class="font-semibold text-sm text-gray-600 pb-1 block">Nama Kelas</label>
                <select name="nama_kelas" id="nama_kelas" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" @required(true)>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
                <label for="wali_kelas" class="font-semibold text-sm text-gray-600 pb-1 block">Wali Kelas</label>
                <input id="wali_kelas" type="text" name="wali_kelas" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" @required(true) />
                <button type="submit" class="transition duration-200 bg-blue-500 hover:bg-blue-600 focus:bg-blue-700 focus:shadow-sm focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50 text-white w-full py-2.5 rounded-lg text-sm shadow-sm hover:shadow-md font-semibold text-center inline-block">
                    <span class="inline-block">Tambah</span>
                </button>
            </form>
        </div>
        <div class="w-auto">
            <div class="w-auto bg-wite shadow-md rounded-lg p-10">
                <div class="text-xl font-bold">Daftar Kelas</div>
                <hr class="my-6">
                <table class="w-full text-left table-auto w-full">
                    <thead>
                    <tr>
                        <th class="p-4 border-b border-slate-200 bg-slate-50">
                        <p class="text-sm font-normal leading-none text-slate-500 text-center">
                            Kelas
                        </p>
                        </th>
                        <th class="p-4 border-b border-slate-200 bg-slate-50">
                        <p class="text-sm font-normal leading-none text-slate-500">
                            Wali Kelas
                        </p>
                        </th>
                        <th class="p-4 border-b border-slate-200 bg-slate-50">
                        <p class="text-sm font-normal leading-none text-slate-500 text-center">
                            Aksi
                        </p>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($kelass as $kelas)
                     <tr class="hover:bg-slate-50 border-b border-slate-200">
                         <td class="p-4 py-5">
                         <p class="md:text-sm text-xs md:w-auto w-10 truncate text-center">{{ $kelas->nama_kelas }}</p>
                         </td>
                         <td class="p-4 py-5">
                         <p class="md:text-sm text-xs md:w-auto w-20 truncate">{{ $kelas->wali_kelas }}</p>
                         </td>
                         <td class="p-4 py-5 flex">
                         <p class="flex mx-auto">
                             <a href="/siswa/edit/{{$kelas->id}}" class="cursor-pointer bg-blue-500 hover:bg-blue-700 px-3 py-2 rounded-lg group">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none">
                                     <path d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="group-hover:stroke-black"/>
                                     <path d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="group-hover:stroke-black"/>
                                 </svg>
                             </a>

                             <a onclick="return confirm('Apakah anda yakin untuk menghapus kelas {{ $kelas->nama_kelas }}?')" href="/kelas/hapus/{{ $kelas->id }}" class="cursor-pointer bg-red-500 hover:bg-red-700 px-3 py-2 rounded-lg group ml-2">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none">
                                     <path d="M10 11V17" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="group-hover:stroke-black"/>
                                     <path d="M14 11V17" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="group-hover:stroke-black"/>
                                     <path d="M4 7H20" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="group-hover:stroke-black"/>
                                     <path d="M6 7H12H18V18C18 19.6569 16.6569 21 15 21H9C7.34315 21 6 19.6569 6 18V7Z" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="group-hover:stroke-black"/>
                                     <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="group-hover:stroke-black"/>
                                 </svg>
                             </a>
                         </p>
                         </td>
                     </tr>
                    @endforeach
                    </tbody>
                </table>
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
