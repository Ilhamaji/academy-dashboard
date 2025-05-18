@extends('dashboard-layout')
@section('title', 'Informasi Sekolah')

@section('dashboard-content')
    <!-- component -->
<div class="flex items-center justify-center p-12">
  <!-- Author: FormBold Team -->
  <!-- Learn More: https://formbold.com -->
  <div class="mx-auto w-full">
    @if(session()->has('success'))
    <div id="success" class="text-center bg-green-400 py-2 mb-3 text-white rounded-md">
        {{session()->get('success')}}
    </div>

    @endif
    @if(session()->has('error'))
    <div id="error" class="text-center bg-red-400 py-2 mb-3 text-white rounded-md">
        {{session()->get('error')}}
    </div>
    @endif

    @foreach ($errors->all() as $error)
        <div id="error-{{ $loop->iteration }}" class="text-center bg-red-400 py-2 mb-3 text-white rounded-md">{{$error}}</div>
    @endforeach

    <form action="/informasi/{{$informasi->id}}" enctype="multipart/form-data" method="POST" class="flex md:flex-row flex-col rounded-lg gap-10">
        {{ csrf_field() }}
        {{ method_field('put') }}
        <div class="grid grid-cols-1 gap-2 md:w-[40vw] mx-auto w-full h-fit bg-white rounded p-5 shadow-md">
            <div class="font-bold text-lg pb-5 border-b-1 border-gray-200">
                Edit Logo Sekolah
            </div>
            <div class="flex mx-auto my-auto h-50 w-50 rounded-full overflow-hidden mt-5">
                <img src="{{$informasi->logo}}" class="h-50" alt="img">
            </div>
            <div class="my-auto">
                <label for="upload" class="font-semibold text-sm text-gray-600 pb-1 block">Unggah Foto</label>
                @include('components.uploadImg')
            </div>
        </div>

        <div class="w-full bg-white rounded p-5 shadow-md">
            <div class="font-bold text-lg pb-5 border-b-1 border-gray-200">
                Edit Data Sekolah
            </div>
            <div class="w-full mt-5">
                <div class="mb-5">
                    <label
                    for="nama"
                    class="mb-3 block text-base font-medium text-[#07074D]"
                    >
                    Nama Sekolah
                    </label>
                    <input
                    type="text"
                    name="nama"
                    value="{{$informasi->nama}}"
                    id="nama"
                    placeholder="Sekolah Dasar"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"

                    />
                </div>
            </div>
            <div class="mb-5">
                <label
                for="npsn"
                class="mb-3 block text-base font-medium text-[#07074D]"
                >
                NPSN
                </label>
                <input
                type="number"
                name="npsn"
                id="npsn"
                value="{{$informasi->npsn}}"
                placeholder="20422123"
                min="0"
                class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"

                />
            </div>
            <div class="mb-5">
                <label
                for="NSS"
                class="mb-3 block text-base font-medium text-[#07074D]"
                >
                NSS
                </label>
                <input
                type="number"
                name="nss"
                id="nss"
                value="{{$informasi->nss}}"
                placeholder="12312"
                min="0"
                class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"

                />
            </div>
            <div class="mb-5">
                <label
                for="kodepos"
                class="mb-3 block text-base font-medium text-[#07074D]"
                >
                Kode Pos
                </label>
                <input
                type="number"
                name="kodepos"
                id="kodepos"
                value="{{$informasi->kodepos}}"
                placeholder="14235"
                min="0"
                class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"

                />
            </div>
            <div class="mb-5">
                <label
                for="no_telp"
                class="mb-3 block text-base font-medium text-[#07074D]"
                >
                No Telepon
                </label>
                <input
                type="text"
                name="no_telp"
                id="no_telp"
                value="{{$informasi->no_telp}}"
                placeholder="08123456789"
                min="0"
                class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"

                />
            </div>
            <div class="mb-5">
                <label
                for="alamat"
                class="mb-3 block text-base font-medium text-[#07074D]"
                >
                Alamat
                </label>
                <textarea
                name="alamat"
                id="alamat"
                placeholder="Jl. Raya No. 123"
                class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"

                >{{$informasi->alamat}}</textarea>
            </div>
            <div class="mb-5">
                <label
                for="email"
                class="mb-3 block text-base font-medium text-[#07074D]"
                >
                Email
                </label>
                <input
                type="email"
                name="email"
                id="email"
                value="{{$informasi->email}}"
                placeholder="example@domain"
                min="0"
                class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"

                />
            </div>
            <div class="mb-5">
                <label
                for="website"
                class="mb-3 block text-base font-medium text-[#07074D]"
                >
                Website
                </label>
                <input
                type="text"
                name="website"
                id="website"
                value="{{$informasi->website}}"
                placeholder="example.ac.id"
                min="0"
                class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"

                />
            </div>
            <div class="mb-5">
                <label
                for="nip_kepsek"
                class="mb-3 block text-base font-medium text-[#07074D]"
                >
                NIP Kepala Sekolah
                </label>
                <input
                type="nip_kepsek"
                name="nip_kepsek"
                id="nip_kepsek"
                value="{{$informasi->nip_kepsek}}"
                placeholder="123123123123"
                min="0"
                class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"

                />
            </div>
            <div class="mb-5">
                <label
                for="nama_kepsek"
                class="mb-3 block text-base font-medium text-[#07074D]"
                >
                Nama Kepala Sekolah
                </label>
                <input
                type="text"
                name="nama_kepsek"
                id="nama_kepsek"
                value="{{$informasi->nama_kepsek}}"
                placeholder="Nama Kepala Sekolah"
                min="0"
                class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"

                />
            </div>
            <button
            class="hover:shadow-form rounded-md bg-blue-600 py-3 px-8 text-center text-base font-semibold text-white outline-none"
            >
                Simpan
            </button>
        </div>
      </div>
    </form>
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
