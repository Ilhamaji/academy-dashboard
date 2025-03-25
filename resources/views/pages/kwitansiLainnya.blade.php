@extends('dashboard-layout')
@section('title', 'Lain-lain')

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
        <a href="/penerimaan" class="text-sm hover:text-blue-500">Penerimaan</a>
        <div class="mx-1">/</div>
        <a class="text-sm text-blue-500">Kwitansi</a>
    </div>

    @foreach ($lains as $lain)
        <div class="flex h-[78vh]">
            <div class="m-auto">
                <div class="bg-white rounded-lg shadow-md w-[84vw] md:w-[60vw] lg:w-[36vw] p-5">
                    <div class="flex justify-between">
                        <div class="block items-center gap-3">
                            <p class="text-md font-medium md:text-xl">
                                Kwitansi Lain-lain
                            </p>
                        </div>
                        <p>
                            <span class="text-md font-medium md:text-xl">
                                {{ $lain->tanggal }}
                            </span>
                        </p>
                    </div>
                    <div class="my-4 bg-black h-1"></div>
                    <p class="font-bold">Keterangan</p>
                    <div class="flex justify-between text-sm md:text-md">
                        <div class="">Pembayaran <span class="{{ $lain->keterangan === 'spp' ? 'uppercase' : 'capitalize' }}">{{ $lain->keterangan }}</span></div>
                        <div class="">Rp {{ $lain->nominal }}</div>
                    </div>
                    <hr class="my-4">
                    <div class="flex justify-between font-medium capitalize">
                        <div class="flex justify-items-end font-bold text-md md:text-xl">Total</div>
                        <div class="flex justify-items-end font-bold text-md md:text-xl">Rp {{ $lain->nominal }}</div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @include('components.footer')
@endsection
