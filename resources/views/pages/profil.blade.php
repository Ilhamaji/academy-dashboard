@extends('dashboard-layout')
@section('title', 'Home')

@section('dashboard-content')
    <form method="POST" action="/profil/{{$user->id}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
        <!-- component -->
        <div class="w-full block justify-center bg-white shadow-md rounded-lg p-5">
            <div class="flex text-xl font-bold">Edit <span class="ml-2">{{ $user->name }}</span></div>
            <hr class="my-6">
            <div class="xs:p-0 mx-auto md:w-full">
                <div class="bg-transparent w-full rounded-lg divide-gray-200">
                    <div class="pb-6">
                        @if(session()->has('success'))
                        <div id="success" class="text-center bg-green-400 py-2 mb-3 text-white rounded-md">
                            {{session()->get('success')}}
                        </div>
                        @endif

                        @foreach ($errors->all() as $error)
                            <div id="error-{{ $loop->iteration }}" class="text-center bg-red-400 py-2 mb-3 text-white rounded-md">{{$error}}</div>
                        @endforeach
                        </div>
                        <div class="grid sm:grid-cols-1 md:grid-cols-2 gap-2">
                        <div class="flex mx-auto my-auto h-50 w-50 rounded-full overflow-hidden">
                            <img src="{{$user->image}}" class="h-50" alt="image">
                        </div>
                        <div class="">
                            <label for="password_confirmation" class="font-semibold text-sm text-gray-600 pb-1 block">Unggah Foto</label>
                            @include('components.uploadImg')
                        </div>
                        <div class="">
                            <label for="name" class="font-semibold text-sm text-gray-600 pb-1 block">Nama</label>
                            <input type="text" id="name" name="name" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" value="{{$user->name}}"  @required(true) />
                        </div>
                        <div class="">
                            <label for="email" class="font-semibold text-sm text-gray-600 pb-1 block">E-mail</label>
                            <input type="text" id="email" name="email" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" value="{{$user->email}}"  @required(true) />
                        </div>
                        <div class="">
                            <label for="password" class="font-semibold text-sm text-gray-600 pb-1 block">Password</label>
                            <input type="password" id="password" name="password" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" @required(true) />
                        </div>
                        <div class="">
                            <label for="password_confirmation" class="font-semibold text-sm text-gray-600 pb-1 block">Konfirmasi Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" @required(true) />
                        </div>
                    </div>
                    <div class="">
                    <button type="submit" class="transition duration-200 bg-blue-500 hover:bg-blue-600 focus:bg-blue-700 focus:shadow-sm focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50 text-white w-full py-2.5 rounded-lg text-sm shadow-sm hover:shadow-md font-semibold text-center inline-block">
                        <span class="inline-block mr-2">Simpan Perubahan</span>
                    </button>
                    </div>
                </div>
                <div class="py-5">
                    <div class="text-center sm:text-left whitespace-nowrap">
                        <a href="/" class="sm:text-center text-gray-500">Batalkan</a>
                    </div>
                </div>
            </div>
        </div>
    </form>

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
