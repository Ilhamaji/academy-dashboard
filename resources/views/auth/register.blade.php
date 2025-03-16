@extends('.../layout')

@section('title', 'Register')

@section('content')
    <form method="POST" action="/register" enctype="multipart/form-data">
        {{ csrf_field() }}
        <!-- component -->
        <div class="min-h-screen bg-gray-100 flex flex-col justify-center sm:py-12">
            <div class="p-10 xs:p-0 mx-auto md:w-full md:max-w-md">
            <h1 class="font-bold text-center text-2xl mb-5">Register</h1>
            <div class="bg-white shadow w-full rounded-lg divide-y divide-gray-200">
                <div class="px-5 pb-6">
                    <div class="py-3">
                        @if(session()->has('success'))
                            <div class="text-center bg-green-400 py-2 text-white rounded-md">
                                {{session()->get('success')}}
                            </div>
                        @endif

                        @if(session()->has('error'))
                            <div class="text-center bg-red-400 py-2 text-white rounded-md">
                                {{session()->get('error')}}
                            </div>
                        @endif

                        @foreach ($errors->all() as $error)
                            <div class="text-center bg-red-400 py-2 mt-3 text-white rounded-md">{{$error}}</div>
                        @endforeach
                    </div>
                    <label for="name" class="font-semibold text-sm text-gray-600 pb-1 block">Nama</label>
                    <input type="text" id="name" name="name" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full"  @required(true) />
                    <label for="email" class="font-semibold text-sm text-gray-600 pb-1 block">E-mail</label>
                    <input type="text" id="email" name="email" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full"  @required(true) />
                    <label for="password" class="font-semibold text-sm text-gray-600 pb-1 block">Password</label>
                    <input type="password" id="password" name="password" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" @required(true) />
                    <label for="password_confirmation" class="font-semibold text-sm text-gray-600 pb-1 block">Konfirmasi Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" @required(true) />
                    <label for="password_confirmation" class="font-semibold text-sm text-gray-600 pb-1 block">Unggah Foto</label>
                    @include('components.uploadImg')
                    <button type="submit" class="transition duration-200 bg-blue-500 hover:bg-blue-600 focus:bg-blue-700 focus:shadow-sm focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50 text-white w-full py-2.5 rounded-lg text-sm shadow-sm hover:shadow-md font-semibold text-center inline-block">
                        <span class="inline-block mr-2">Register</span>
                    </button>
                </div>
                <div class="py-5">
                    <div class="grid grid-cols-2 gap-1">
                        <div class="text-center sm:text-left whitespace-nowrap">
                        <a href="/login" class="mx-5 text-gray-500">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
