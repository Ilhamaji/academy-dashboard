@extends('dashboard-layout')
@section('title', 'Beranda')

@section('dashboard-content')
    <div class="py-6">
        <div class="min-h-[75vh]">
            <div class="grid gap-y-10 gap-x-6 md:grid-cols-2 xl:grid-cols-4">
                <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md">
                    <div class="bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-blue-600 to-blue-400 text-white shadow-blue-500/40 shadow-lg absolute -mt-4 grid h-16 w-16 place-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="w-6 h-6 text-white">
                        <path d="M12 7.5a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z"></path>
                        <path fill-rule="evenodd" d="M1.5 4.875C1.5 3.839 2.34 3 3.375 3h17.25c1.035 0 1.875.84 1.875 1.875v9.75c0 1.036-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 011.5 14.625v-9.75zM8.25 9.75a3.75 3.75 0 117.5 0 3.75 3.75 0 01-7.5 0zM18.75 9a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75V9.75a.75.75 0 00-.75-.75h-.008zM4.5 9.75A.75.75 0 015.25 9h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H5.25a.75.75 0 01-.75-.75V9.75z" clip-rule="evenodd"></path>
                        <path d="M2.25 18a.75.75 0 000 1.5c5.4 0 10.63.722 15.6 2.075 1.19.324 2.4-.558 2.4-1.82V18.75a.75.75 0 00-.75-.75H2.25z"></path>
                    </svg>
                    </div>
                    <div class="p-4 text-right">
                    <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">Total Kas</p>
                    <h4 class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">Rp {{ $total }}</h4>
                    </div>
                </div>
                <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md">
                    <div class="bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-pink-600 to-pink-400 text-white shadow-pink-500/40 shadow-lg absolute -mt-4 grid h-16 w-16 place-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="w-6 h-6 text-white">
                        <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd"></path>
                    </svg>
                    </div>
                    <div class="p-4 text-right">
                    <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">Jumlah Siswa</p>
                    <h4 class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">{{ $siswa }}</h4>
                    </div>
                </div>
                <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md">
                    <div class="bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-green-600 to-green-400 text-white shadow-green-500/40 shadow-lg absolute -mt-4 grid h-16 w-16 place-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.36066 4.98361H4.93443V7.86885H8.60656V9.44262H4.93443V13.1148H8.60656V14.6885H4.14754C3.71296 14.6885 3.36066 14.3362 3.36066 13.9016V4.98361Z" fill="#fff"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1 1.83607C1 0.822034 1.82203 0 2.83607 0H10.7049C11.7189 0 12.541 0.822034 12.541 1.83607V3.67213C12.541 4.68616 11.7189 5.5082 10.7049 5.5082H2.83607C1.82203 5.5082 1 4.68616 1 3.67213V1.83607ZM2.83607 1.57377C2.6912 1.57377 2.57377 1.6912 2.57377 1.83607V3.67213C2.57377 3.81699 2.6912 3.93443 2.83607 3.93443H10.7049C10.8498 3.93443 10.9672 3.81699 10.9672 3.67213V1.83607C10.9672 1.6912 10.8498 1.57377 10.7049 1.57377H2.83607Z" fill="#fff"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.81967 8.39344C7.81967 7.37941 8.64171 6.55738 9.65574 6.55738H12.2787C13.2927 6.55738 14.1148 7.37941 14.1148 8.39344V8.91803C14.1148 9.93206 13.2927 10.7541 12.2787 10.7541H9.65574C8.64171 10.7541 7.81967 9.93206 7.81967 8.91803V8.39344ZM9.65574 8.13115C9.51088 8.13115 9.39344 8.24858 9.39344 8.39344V8.91803C9.39344 9.06289 9.51088 9.18033 9.65574 9.18033H12.2787C12.4235 9.18033 12.541 9.06289 12.541 8.91803V8.39344C12.541 8.24858 12.4235 8.13115 12.2787 8.13115H9.65574Z" fill="#fff"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.81967 13.6393C7.81967 12.6253 8.64171 11.8033 9.65574 11.8033H12.2787C13.2927 11.8033 14.1148 12.6253 14.1148 13.6393V14.1639C14.1148 15.178 13.2927 16 12.2787 16H9.65574C8.64171 16 7.81967 15.178 7.81967 14.1639V13.6393ZM9.65574 13.377C9.51088 13.377 9.39344 13.4945 9.39344 13.6393V14.1639C9.39344 14.3088 9.51088 14.4262 9.65574 14.4262H12.2787C12.4235 14.4262 12.541 14.3088 12.541 14.1639V13.6393C12.541 13.4945 12.4235 13.377 12.2787 13.377H9.65574Z" fill="#fff"/>
                        </svg>
                    </div>
                    <div class="p-4 text-right">
                    <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">Jumlah Kelas</p>
                    <h4 class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">{{ $kelas }}</h4>
                    </div>
                </div>
                <a href="/profil" class="relative hover:shadow-xl flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md">
                    <div class="bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-yellow-600 to-yellow-400 text-white shadow-yellow-500/40 shadow-lg absolute -mt-4 grid h-16 w-16 place-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="20" width="20" version="1.1" id="_x32_" viewBox="0 0 512 512" xml:space="preserve" class="fill-white">
                            <g>
                                <path class="st0" d="M256,0C114.615,0,0,114.615,0,256s114.615,256,256,256s256-114.615,256-256S397.385,0,256,0z M256,86.069   c28.463,0,51.538,23.074,51.538,51.538c0,28.464-23.074,51.538-51.538,51.538c-28.463,0-51.538-23.074-51.538-51.538   C204.462,109.143,227.537,86.069,256,86.069z M310.491,425.931H201.51v-43.593h35.667V276.329H215.38v-43.593h65.389v3.963v39.63   v106.009h29.722V425.931z"/>
                            </g>
                            </svg>
                    </div>
                    <div class="p-4 text-right">
                    <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">Informasi Detail</p>
                    <h4 class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">Sekolah</h4>
                    </div>
                </a>
            </div>
        </div>

        @include('components.footer')
    </div>
@endsection
