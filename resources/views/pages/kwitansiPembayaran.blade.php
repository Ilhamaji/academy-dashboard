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

    @foreach ($pembayaran as $p)
        <div class="flex h-[78vh]">
            <div class="m-auto">
                <div class="bg-white rounded-lg shadow-md w-[84vw] md:w-[60vw] lg:w-[36vw] p-5">
                    <div class="flex justify-between">
                        <div class="block items-center gap-3">
                            <p class="font-bold text-md md:text-xl">
                                Kwitansi Pembayaran
                            </p>
                        </div>
                        <p>
                            <span class="font-medium text-md md:text-xl">
                                {{ $p->tanggal }}
                            </span>
                        </p>
                    </div>
                    <div class="my-4 bg-black h-1"></div>
                    <p class="font-bold text-sm md:text-md">Siswa</p>
                    <div class="block text-sm md:text-md">
                        <div class="flex gap-3 flex-row">
                            <div class="">NISN</div>
                            <div class="">:</div>
                            <div class="">{{ $p->nisn }}</div>
                        </div>
                        <div class="flex gap-2 flex-row">
                            <div class="">Nama</div>
                            <div class="">:</div>
                            <div class="">{{ $p->nama_siswa }}</div>
                        </div>
                        <div class="flex gap-3 flex-row">
                            <div class="">Kelas</div>
                            <div class="">:</div>
                            <div class="">{{ $p->kelas }}</div>
                        </div>
                    </div>

                    <p class="font-bold mt-4 text-sm md:text-md">Keterangan</p>
                    <div class="flex justify-between text-sm md:text-md">
                        <div class="">
                            Pembayaran <span class="{{ $p->keterangan === 'spp' ? 'uppercase' : 'capitalize' }}">{{ $p->keterangan }}</span>
                        </div>
                        <div class="">Rp {{ $p->nominal }}</div>
                    </div>
                    <hr class="my-4">
                    <div class="flex justify-between font-medium capitalize">
                        <div class="flex justify-items-end font-bold text-md md:text-xl">Total</div>
                        <div class="flex justify-items-end font-bold text-md md:text-xl">Rp {{ $p->nominal }}</div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @include('components.footer')
@endsection
