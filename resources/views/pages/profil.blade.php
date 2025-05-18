@extends('dashboard-layout')
@section('title', 'Profil')

@section('dashboard-content')
    <!-- component -->
<div class="flex items-center justify-center p-12">
  <!-- Author: FormBold Team -->
  <!-- Learn More: https://formbold.com -->
  <div class="mx-auto w-full max-w-[550px]">
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

    <form action="/profil/{{$user->id}}" enctype="multipart/form-data" method="POST" class="bg-white rounded p-5 shadow-md">
        {{ csrf_field() }}
        {{ method_field('put') }}
        <div class="font-bold text-lg pb-5 border-b-1 border-gray-200">
                Edit Data Admin
            </div>
      <div class="-mx-3 flex flex-wrap mt-5">
        <div class="grid sm:grid-cols-1 md:grid-cols-2 gap-2 mb-5">
            <div class="flex mx-auto my-auto h-50 w-50 rounded-full overflow-hidden">
                <img src="{{$user->image}}" class="h-50" alt="image">
            </div>
            <div class="">
                <label for="upload" class="font-semibold text-sm text-gray-600 pb-1 block">Unggah Foto</label>
                @include('components.uploadImg')
            </div>
        </div>
        <div class="w-full px-3 sm:w-1/2">
          <div class="mb-5">
            <label
              for="name"
              class="mb-3 block text-base font-medium text-[#07074D]"
            >
              Nama
            </label>
            <input
              type="text"
              name="name"
              id="name"
              value="{{$user->name}}"
              placeholder="Nama Lengkap"
              class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
              @required(true)
            />
          </div>
        </div>
        <div class="w-full px-3 sm:w-1/2">
          <div class="mb-5">
            <label
              for="username"
              class="mb-3 block text-base font-medium text-[#07074D]"
            >
              Username
            </label>
            <input
              type="text"
              name="username"
              value="{{$user->username}}"
              id="username"
              placeholder="Username"
              class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
              @required(true)
            />
          </div>
        </div>
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
          value="{{$user->email}}"
          placeholder="example@domain"
          min="0"
          class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
          @required(true)
        />
      </div>

      <div class="-mx-3 flex flex-wrap">
        <div class="w-full px-3 sm:w-1/2">
          <div class="mb-5">
            <label
              for="password"
              class="mb-3 block text-base font-medium text-[#07074D]"
            >
              Password
            </label>
            <input
              type="password"
              name="password"
              id="password"
              placeholder="Password"
              class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
              @required(true)
            />
          </div>
        </div>
        <div class="w-full px-3 sm:w-1/2">
          <div class="mb-5">
            <label
              for="password_confirmation"
              class="mb-3 block text-base font-medium text-[#07074D]"
            >
              Konfirmasi Password
            </label>
            <input
              type="password"
              name="password_confirmation""
              id="password_confirmation"
              placeholder="Konfirmasi Password""
              class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
              @required(true)
            />
          </div>
        </div>
      </div>
        <button
          class="hover:shadow-form rounded-md bg-blue-600 py-3 px-8 text-center text-base font-semibold text-white outline-none"
        >
          Simpan
        </button>
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
