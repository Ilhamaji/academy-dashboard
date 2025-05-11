@extends('layout')

<!-- component -->
<div class="min-h-screen bg-gray-100">
    <aside id="sidebar" class="fixed shadow-md no-scrollbar overflow-y-scroll bg-white -translate-x-80 fixed inset-0 z-50 min-h-screen w-72 transition-transform duration-300 xl:translate-x-0">
      <div class="relative">
        <a class="flex items-center gap-4 py-4 mx-4 border-b border-gray-200" href="/">
            <h6 class="block antialiased tracking-normal font-sans text-xl font-bold leading-relaxed text-black">
                Dashboard
            </h6>
        </a>
        <button onclick="sidebarHandler()" class="middle none font-sans font-medium text-center uppercase disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none w-8 max-w-[32px] h-8 max-h-[32px] rounded-lg text-xs text-white hover:bg-white/10 active:bg-white/30 absolute right-0 top-0 grid rounded-br-none rounded-tl-none xl:hidden" type="button">
          <span class="absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" aria-hidden="true" class="h-5 w-5 text-white">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
          </span>
        </button>
      </div>
      <div class="m-4">
        <ul class="mb-4 flex flex-col gap-1">
            <li>
                <a>
                    <div class="text-lg text-gray-400 font-bold">Master Data</div>
                </a>
            </li>
          <li>
            <div class="group rounded-lg duration-300">
                <a href="/siswa" class="middle none font-sans font-bold center disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg group-hover:shadow-md group-hover:bg-gradient-to-tr group-hover:from-blue-600 group-hover:to-blue-400 group-hover:shadow-blue-500/20 group-hover:shadow-lg group-hover:shadow-blue-500/40 active:bg-white/30 w-full flex items-center gap-4 px-4 capitalize text-blue-600 group-hover:text-white {{ $title === 'Siswa' ? 'shadow-md bg-gradient-to-tr from-blue-600 to-blue-400 shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/40 active:opacity-[0.85] text-white' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="w-5 h-5 text-inherit">
                        <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd"></path>
                      </svg>
                    <p class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">Data Siswa</p>
                </a>
            </div>
          </li>
          <li>
            <div class="group rounded-lg duration-300">
                <a href="/kelas" class="middle none font-sans font-bold center disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg group-hover:shadow-md group-hover:bg-gradient-to-tr group-hover:from-blue-600 group-hover:to-blue-400 group-hover:shadow-blue-500/20 group-hover:shadow-lg group-hover:text-white group-hover:shadow-blue-500/40 active:bg-white/30 w-full flex items-center gap-4 px-4 capitalize text-blue-600 {{ $title === 'Kelas' ? 'shadow-md bg-gradient-to-tr from-blue-600 to-blue-400 shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/40 active:opacity-[0.85] text-white' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none"><path stroke="#155dfc" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5h10M11 9h5" class="group-hover:stroke-white {{ $title === 'Kelas' ? 'stroke-white' : ''}}"/><rect width="4" height="4" x="3" y="5" stroke="#155dfc" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" rx="1" class="group-hover:stroke-white {{ $title === 'Kelas' ? 'stroke-white' : ''}}"/><path stroke="#155dfc" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 15h10m-10 4h5" class="group-hover:stroke-white {{ $title === 'Kelas' ? 'stroke-white' : ''}}"/><rect width="4" height="4" x="3" y="15" stroke="#155dfc" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" rx="1" class="group-hover:stroke-white {{ $title === 'Kelas' ? 'stroke-white' : ''}}"/></svg>
                    <p class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">Data Kelas</p>
                </a>
            </div>
          </li>
          <li class="group/drop group/dropHead hover:bg-blue-200 rounded-lg">
            <div class="rounded-lg duration-300">
                <a class="flex justify-between middle cursor-pointer none font-sans font-bold center disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg group-hover/dropHead:shadow-md group-hover/dropHead:bg-gradient-to-tr group-hover/dropHead:from-blue-600 group-hover/dropHead:to-blue-400 group-hover/dropHead:shadow-blue-500/20 group-hover/dropHead:shadow-lg group-hover/dropHead:shadow-blue-500/40 active:bg-white/30 w-full flex items-center gap-4 px-4 capitalize text-blue-600 group-hover/dropHead:text-white {{ $title === 'Penerimaan' ? 'shadow-md bg-gradient-to-tr from-blue-600 to-blue-400 shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/40 active:opacity-[0.85] text-white' : '' }}">
                    <div class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#155dfc" aria-hidden="true" class="w-5 h-5 text-inherit group-hover/dropHead:fill-white my-auto mr-4 {{ $title === 'Penerimaan' ? 'fill-white' : ''}}">
                        <path fill-rule="evenodd" d="M1.5 5.625c0-1.036.84-1.875 1.875-1.875h17.25c1.035 0 1.875.84 1.875 1.875v12.75c0 1.035-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 011.5 18.375V5.625zM21 9.375A.375.375 0 0020.625 9h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h7.5a.375.375 0 00.375-.375v-1.5zm0 3.75a.375.375 0 00-.375-.375h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h7.5a.375.375 0 00.375-.375v-1.5zm0 3.75a.375.375 0 00-.375-.375h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h7.5a.375.375 0 00.375-.375v-1.5zM10.875 18.75a.375.375 0 00.375-.375v-1.5a.375.375 0 00-.375-.375h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h7.5zM3.375 15h7.5a.375.375 0 00.375-.375v-1.5a.375.375 0 00-.375-.375h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375zm0-3.75h7.5a.375.375 0 00.375-.375v-1.5A.375.375 0 0010.875 9h-7.5A.375.375 0 003 9.375v1.5c0 .207.168.375.375.375z" clip-rule="evenodd"></path>
                    </svg>
                    <p class="flex antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">Data Penerimaan</p>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" class="rotate-270 group-hover/drop:rotate-0">
                        <path d="M5.70711 9.71069C5.31658 10.1012 5.31658 10.7344 5.70711 11.1249L10.5993 16.0123C11.3805 16.7927 12.6463 16.7924 13.4271 16.0117L18.3174 11.1213C18.708 10.7308 18.708 10.0976 18.3174 9.70708C17.9269 9.31655 17.2937 9.31655 16.9032 9.70708L12.7176 13.8927C12.3271 14.2833 11.6939 14.2832 11.3034 13.8927L7.12132 9.71069C6.7308 9.32016 6.09763 9.32016 5.70711 9.71069Z" fill="#155dfc" class="group-hover/drop:fill-white {{$title === 'Penerimaan' ? 'fill-white' : ''}}"/>
                    </svg>
                </a>
            </div>
            <ul class="none hidden duration-300 group-hover/drop:visible group-hover/drop:block">
              <li>
                <div class="group rounded-lg duration-300">
                    <a href="/pembayaran" class="middle none font-sans font-bold center disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg group-hover:shadow-md group-hover:bg-blue-400 active:bg-white/30 w-full flex items-center gap-4 px-4 capitalize text-blue-600 group-hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" class="rotate-180 scale-y-[-1]">
                            <path d="M20 7V8.2C20 9.88016 20 10.7202 19.673 11.362C19.3854 11.9265 18.9265 12.3854 18.362 12.673C17.7202 13 16.8802 13 15.2 13H4M4 13L8 9M4 13L8 17" stroke="#155dfc" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover:stroke-white" />
                        </svg>
                        <p class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">Pembayaran</p>
                    </a>
                </div>
              </li>
              <li>
                <div class="group rounded-lg duration-300">
                    <a href="/lain-lain" class="middle none font-sans font-bold center disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg group-hover:shadow-md group-hover:bg-blue-400 active:bg-white/30 w-full flex items-center gap-4 px-4 capitalize text-blue-600 group-hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" class="rotate-180 scale-y-[-1]">
                            <path d="M20 7V8.2C20 9.88016 20 10.7202 19.673 11.362C19.3854 11.9265 18.9265 12.3854 18.362 12.673C17.7202 13 16.8802 13 15.2 13H4M4 13L8 9M4 13L8 17" stroke="#155dfc" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover:stroke-white" />
                        </svg>
                        <p class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">Lain-Lain</p>
                    </a>
                </div>
              </li>
            </ul>
          </li>
          <li>
            <div class="group rounded-lg duration-300">
                <a href="/pengeluaran" class="middle none font-sans font-bold center disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg group-hover:shadow-md group-hover:bg-gradient-to-tr group-hover:from-blue-600 group-hover:to-blue-400 group-hover:shadow-blue-500/20 group-hover:shadow-lg group-hover:shadow-blue-500/40 active:bg-white/30 w-full flex items-center gap-4 px-4 capitalize text-blue-600 group-hover:text-white {{ $title === 'Pengeluaran' ? 'shadow-md bg-gradient-to-tr from-blue-600 to-blue-400 shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/40 active:opacity-[0.85] text-white' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#155dfc" aria-hidden="true" class="w-5 h-5 text-inherit group-hover:fill-white {{ $title === 'Pengeluaran' ? 'fill-white' : ''}}">
                        <path fill-rule="evenodd" d="M1.5 5.625c0-1.036.84-1.875 1.875-1.875h17.25c1.035 0 1.875.84 1.875 1.875v12.75c0 1.035-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 011.5 18.375V5.625zM21 9.375A.375.375 0 0020.625 9h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h7.5a.375.375 0 00.375-.375v-1.5zm0 3.75a.375.375 0 00-.375-.375h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h7.5a.375.375 0 00.375-.375v-1.5zm0 3.75a.375.375 0 00-.375-.375h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h7.5a.375.375 0 00.375-.375v-1.5zM10.875 18.75a.375.375 0 00.375-.375v-1.5a.375.375 0 00-.375-.375h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h7.5zM3.375 15h7.5a.375.375 0 00.375-.375v-1.5a.375.375 0 00-.375-.375h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375zm0-3.75h7.5a.375.375 0 00.375-.375v-1.5A.375.375 0 0010.875 9h-7.5A.375.375 0 003 9.375v1.5c0 .207.168.375.375.375z" clip-rule="evenodd"></path>
                    </svg>
                    <p class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">Data Pengeluaran</p>
                </a>
            </div>
          </li>
          <li>
            <a>
                <div class="text-lg text-gray-400 font-bold">Transaksi</div>
            </a>
          </li>
          <li class="group/drop group/dropHead hover:bg-blue-200 rounded-lg">
            <div class="rounded-lg duration-300">
                <a class="middle cursor-pointer none font-sans font-bold center disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg group-hover/dropHead:shadow-md group-hover/dropHead:bg-gradient-to-tr group-hover/dropHead:from-blue-600 group-hover/dropHead:to-blue-400 group-hover/dropHead:shadow-blue-500/20 group-hover/dropHead:shadow-lg group-hover/dropHead:shadow-blue-500/40 active:bg-white/30 w-full flex items-center gap-4 px-4 capitalize text-blue-600 group-hover/dropHead:text-white {{ $title === 'Transaksi Penerimaan' ? 'shadow-md bg-gradient-to-tr from-blue-600 to-blue-400 shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/40 active:opacity-[0.85] text-white' : '' }}">
                    <div class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" width="20" height="20" viewBox="0 -1 32 32" version="1.1" class="my-auto mr-4">
                        <g id="Page-1" stroke="#155dfc" stroke-width="2" fill="none" fill-rule="evenodd" sketch:type="MSPage" class="group-hover/dropHead:stroke-white {{$title === 'Transaksi Penerimaan' ? 'stroke-white' : ''}}">
                        <g id="Icon-Set" sketch:type="MSLayerGroup" transform="translate(-464.000000, -672.000000)" fill="#fff">
                        <path d="M469,688 L481.273,688 L477.282,691.299 C476.89,691.69 476.89,692.326 477.282,692.718 C477.676,693.11 478.313,693.11 478.706,692.718 L484.686,687.776 C484.896,687.566 484.985,687.289 484.971,687.016 C484.985,686.742 484.896,686.465 484.686,686.255 L478.706,681.313 C478.313,680.921 477.676,680.921 477.282,681.313 C476.89,681.705 476.89,682.341 477.282,682.732 L481.235,686 L469,686 C468.447,686 468,686.447 468,687 C468,687.553 468.447,688 469,688 L469,688 Z M494,698 C494,699.104 493.104,700 492,700 L490,700 L490,674 L492,674 C493.104,674 494,674.896 494,676 L494,698 L494,698 Z M488,700 L468,700 C466.896,700 466,699.104 466,698 L466,676 C466,674.896 466.896,674 468,674 L488,674 L488,700 L488,700 Z M492,672 L468,672 C465.791,672 464,673.791 464,676 L464,698 C464,700.209 465.791,702 468,702 L492,702 C494.209,702 496,700.209 496,698 L496,676 C496,673.791 494.209,672 492,672 L492,672 Z" id="align-right" sketch:type="MSShapeGroup">
                        </path>
                        </g>
                        </g>
                    </svg>
                    <p class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">Transaksi Penerimaan</p>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" class="rotate-270 group-hover/drop:rotate-0">
                        <path d="M5.70711 9.71069C5.31658 10.1012 5.31658 10.7344 5.70711 11.1249L10.5993 16.0123C11.3805 16.7927 12.6463 16.7924 13.4271 16.0117L18.3174 11.1213C18.708 10.7308 18.708 10.0976 18.3174 9.70708C17.9269 9.31655 17.2937 9.31655 16.9032 9.70708L12.7176 13.8927C12.3271 14.2833 11.6939 14.2832 11.3034 13.8927L7.12132 9.71069C6.7308 9.32016 6.09763 9.32016 5.70711 9.71069Z" fill="#155dfc" class="group-hover/dropHead:fill-white {{$title === 'Transaksi Penerimaan' ? 'fill-white' : ''}}"/>
                    </svg>
                </a>
            </div>
            <ul class="none hidden group-hover/drop:visible group-hover/drop:block">
              <li>
                <div class="group rounded-lg duration-300">
                    <a href="/transaksi/pembayaran" class="middle none font-sans font-bold center disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg group-hover:shadow-md group-hover:bg-blue-400 active:bg-white/30 w-full flex items-center gap-4 px-4 capitalize text-blue-600 group-hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" class="rotate-180 scale-y-[-1]">
                            <path d="M20 7V8.2C20 9.88016 20 10.7202 19.673 11.362C19.3854 11.9265 18.9265 12.3854 18.362 12.673C17.7202 13 16.8802 13 15.2 13H4M4 13L8 9M4 13L8 17" stroke="#155dfc" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover:stroke-white"/>
                        </svg>
                        <p class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">Pembayaran</p>
                    </a>
                </div>
              </li>
              <li>
                <div class="group rounded-lg duration-300">
                    <a href="/transaksi/lain-lain" class="middle none font-sans font-bold center disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg group-hover:shadow-md group-hover:bg-blue-400 active:bg-white/30 w-full flex items-center gap-4 px-4 capitalize text-blue-600 group-hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" class="rotate-180 scale-y-[-1]">
                            <path d="M20 7V8.2C20 9.88016 20 10.7202 19.673 11.362C19.3854 11.9265 18.9265 12.3854 18.362 12.673C17.7202 13 16.8802 13 15.2 13H4M4 13L8 9M4 13L8 17" stroke="#155dfc" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover:stroke-white"/>
                        </svg>
                        <p class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">Lain-Lain</p>
                    </a>
                </div>
              </li>
            </ul>
          </li>
          <li>
            <div class="group rounded-lg duration-300">
                <a href="/transaksi/pengeluaran" class="middle none font-sans font-bold center disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg group-hover:shadow-md group-hover:bg-gradient-to-tr group-hover:from-blue-600 group-hover:to-blue-400 group-hover:shadow-blue-500/20 group-hover:shadow-lg group-hover:shadow-blue-500/40 active:bg-white/30 w-full flex items-center gap-4 px-4 capitalize text-blue-600 group-hover:text-white {{ $title === 'Transaksi Pengeluaran' ? 'shadow-md bg-gradient-to-tr from-blue-600 to-blue-400 shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/40 active:opacity-[0.85] text-white' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" width="20" height="20" viewBox="0 -1 32 32" version="1.1" class="rotate-180">
                        <g id="Page-1" stroke="#155dfc" stroke-width="2" fill="none" fill-rule="evenodd" sketch:type="MSPage" class="group-hover:stroke-white {{ $title === 'Transaksi Pengeluaran' ? 'stroke-white' : ''}}">
                        <g id="Icon-Set" sketch:type="MSLayerGroup" transform="translate(-464.000000, -672.000000)" fill="#fff">
                        <path d="M469,688 L481.273,688 L477.282,691.299 C476.89,691.69 476.89,692.326 477.282,692.718 C477.676,693.11 478.313,693.11 478.706,692.718 L484.686,687.776 C484.896,687.566 484.985,687.289 484.971,687.016 C484.985,686.742 484.896,686.465 484.686,686.255 L478.706,681.313 C478.313,680.921 477.676,680.921 477.282,681.313 C476.89,681.705 476.89,682.341 477.282,682.732 L481.235,686 L469,686 C468.447,686 468,686.447 468,687 C468,687.553 468.447,688 469,688 L469,688 Z M494,698 C494,699.104 493.104,700 492,700 L490,700 L490,674 L492,674 C493.104,674 494,674.896 494,676 L494,698 L494,698 Z M488,700 L468,700 C466.896,700 466,699.104 466,698 L466,676 C466,674.896 466.896,674 468,674 L488,674 L488,700 L488,700 Z M492,672 L468,672 C465.791,672 464,673.791 464,676 L464,698 C464,700.209 465.791,702 468,702 L492,702 C494.209,702 496,700.209 496,698 L496,676 C496,673.791 494.209,672 492,672 L492,672 Z" id="align-right" sketch:type="MSShapeGroup">
                        </path>
                        </g>
                        </g>
                    </svg>
                    <p class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">Transaksi Pengeluaran</p>
                </a>
            </div>
          </li>
          <li>
            <a>
                <div class="text-lg text-gray-400 font-bold">Laporan</div>
            </a>
          </li>
          <li>
            <div class="group rounded-lg duration-300">
                <a href="/detail" class="middle none font-sans font-bold center disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg group-hover:shadow-md group-hover:bg-gradient-to-tr group-hover:from-blue-600 group-hover:to-blue-400 group-hover:shadow-blue-500/20 group-hover:shadow-lg group-hover:shadow-blue-500/40 active:bg-white/30 w-full flex items-center gap-4 px-4 capitalize text-blue-600 group-hover:text-white {{ $title === 'Laporan Siswa' ? 'shadow-md bg-gradient-to-tr from-blue-600 to-blue-400 shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/40 active:opacity-[0.85] text-white' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#155dfc" height="20" width="20" version="1.1" id="Layer_1" viewBox="0 0 512 512" xml:space="preserve" class="group-hover:fill-white {{ $title === 'Laporan Siswa' ? 'fill-white' : ''}}">
                        <g>
                            <g>
                                <path d="M427.692,0H86.442C72.304,0,59.733,10.4,59.733,24.5v460.867c0,14.1,12.571,26.633,26.708,26.633h341.25    c14.137,0,24.575-12.533,24.575-26.633V24.5C452.267,10.4,441.829,0,427.692,0z M435.2,485.367c0,4.683-2.779,9.567-7.508,9.567    H86.442c-4.729,0-9.642-4.883-9.642-9.567V24.5c0-4.683,4.912-7.433,9.642-7.433h341.25c4.729,0,7.508,2.75,7.508,7.433V485.367z"/>
                            </g>
                        </g>
                        <g>
                            <g>
                                <path d="M299.733,59.733H214.4c-4.713,0-8.533,3.817-8.533,8.533c0,4.717,3.821,8.533,8.533,8.533h85.333    c4.713,0,8.533-3.817,8.533-8.533C308.267,63.55,304.446,59.733,299.733,59.733z"/>
                            </g>
                        </g>
                        <g>
                            <g>
                                <path d="M376.533,119.467H137.6c-4.713,0-8.533,3.817-8.533,8.533c0,4.717,3.821,8.533,8.533,8.533h238.933    c4.713,0,8.533-3.817,8.533-8.533C385.067,123.283,381.246,119.467,376.533,119.467z"/>
                            </g>
                        </g>
                        <g>
                            <g>
                                <path d="M376.533,179.2H137.6c-4.713,0-8.533,3.817-8.533,8.533c0,4.717,3.821,8.533,8.533,8.533h238.933    c4.713,0,8.533-3.817,8.533-8.533C385.067,183.017,381.246,179.2,376.533,179.2z"/>
                            </g>
                        </g>
                        <g>
                            <g>
                                <path d="M376.533,238.933H137.6c-4.713,0-8.533,3.817-8.533,8.533c0,4.717,3.821,8.533,8.533,8.533h238.933    c4.713,0,8.533-3.817,8.533-8.533C385.067,242.75,381.246,238.933,376.533,238.933z"/>
                            </g>
                        </g>
                        <g>
                            <g>
                                <path d="M376.533,298.667H137.6c-4.713,0-9.6,2.75-9.6,7.467v128c0,4.717,4.887,9.6,9.6,9.6h238.933    c4.713,0,7.467-4.883,7.467-9.6v-128C384,301.417,381.246,298.667,376.533,298.667z M366.933,426.667H145.067V315.733h221.867    V426.667z"/>
                            </g>
                        </g>
                    </svg>
                    <p class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">Laporan Data Siswa</p>
                </a>
            </div>
          </li>
          <li class="group/drop group/dropHead hover:bg-blue-200 rounded-lg">
            <div class="rounded-lg duration-300">
                <a class="middle cursor-pointer none font-sans font-bold center disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg group-hover/dropHead:shadow-md group-hover/dropHead:bg-gradient-to-tr group-hover/dropHead:from-blue-600 group-hover/dropHead:to-blue-400 group-hover/dropHead:shadow-blue-500/20 group-hover/dropHead:shadow-lg group-hover/dropHead:shadow-blue-500/40 active:bg-white/30 w-full flex items-center gap-4 px-4 capitalize text-blue-600 group-hover/dropHead:text-white {{ $title === 'Laporan Penerimaan' ? 'shadow-md bg-gradient-to-tr from-blue-600 to-blue-400 shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/40 active:opacity-[0.85] text-white' : '' }}">
                    <div class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#155dfc" height="20" width="20" version="1.1" id="Layer_1" viewBox="0 0 512 512" xml:space="preserve" class="my-auto mr-4 group-hover/dropHead:fill-white {{$title === 'Laporan Penerimaan' ? 'fill-white' : ''}}">
                        <g>
                            <g>
                                <path d="M427.692,0H86.442C72.304,0,59.733,10.4,59.733,24.5v460.867c0,14.1,12.571,26.633,26.708,26.633h341.25    c14.137,0,24.575-12.533,24.575-26.633V24.5C452.267,10.4,441.829,0,427.692,0z M435.2,485.367c0,4.683-2.779,9.567-7.508,9.567    H86.442c-4.729,0-9.642-4.883-9.642-9.567V24.5c0-4.683,4.912-7.433,9.642-7.433h341.25c4.729,0,7.508,2.75,7.508,7.433V485.367z"/>
                            </g>
                        </g>
                        <g>
                            <g>
                                <path d="M299.733,59.733H214.4c-4.713,0-8.533,3.817-8.533,8.533c0,4.717,3.821,8.533,8.533,8.533h85.333    c4.713,0,8.533-3.817,8.533-8.533C308.267,63.55,304.446,59.733,299.733,59.733z"/>
                            </g>
                        </g>
                        <g>
                            <g>
                                <path d="M376.533,119.467H137.6c-4.713,0-8.533,3.817-8.533,8.533c0,4.717,3.821,8.533,8.533,8.533h238.933    c4.713,0,8.533-3.817,8.533-8.533C385.067,123.283,381.246,119.467,376.533,119.467z"/>
                            </g>
                        </g>
                        <g>
                            <g>
                                <path d="M376.533,179.2H137.6c-4.713,0-8.533,3.817-8.533,8.533c0,4.717,3.821,8.533,8.533,8.533h238.933    c4.713,0,8.533-3.817,8.533-8.533C385.067,183.017,381.246,179.2,376.533,179.2z"/>
                            </g>
                        </g>
                        <g>
                            <g>
                                <path d="M376.533,238.933H137.6c-4.713,0-8.533,3.817-8.533,8.533c0,4.717,3.821,8.533,8.533,8.533h238.933    c4.713,0,8.533-3.817,8.533-8.533C385.067,242.75,381.246,238.933,376.533,238.933z"/>
                            </g>
                        </g>
                        <g>
                            <g>
                                <path d="M376.533,298.667H137.6c-4.713,0-9.6,2.75-9.6,7.467v128c0,4.717,4.887,9.6,9.6,9.6h238.933    c4.713,0,7.467-4.883,7.467-9.6v-128C384,301.417,381.246,298.667,376.533,298.667z M366.933,426.667H145.067V315.733h221.867    V426.667z"/>
                            </g>
                        </g>
                    </svg>
                    <p class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">Laporan Penerimaan</p>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" class="rotate-270 group-hover/drop:rotate-0">
                        <path d="M5.70711 9.71069C5.31658 10.1012 5.31658 10.7344 5.70711 11.1249L10.5993 16.0123C11.3805 16.7927 12.6463 16.7924 13.4271 16.0117L18.3174 11.1213C18.708 10.7308 18.708 10.0976 18.3174 9.70708C17.9269 9.31655 17.2937 9.31655 16.9032 9.70708L12.7176 13.8927C12.3271 14.2833 11.6939 14.2832 11.3034 13.8927L7.12132 9.71069C6.7308 9.32016 6.09763 9.32016 5.70711 9.71069Z" fill="#155dfc" class="group-hover/dropHead:fill-white {{$title === 'Laporan Penerimaan' ? 'fill-white' : ''}}"/>
                    </svg>
                </a>
            </div>
            <ul class="none hidden group-hover/drop:visible group-hover/drop:block">
              <li>
                <div class="group rounded-lg duration-300">
                    <a href="/laporan/pembayaran" class="middle none font-sans font-bold center disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg group-hover:shadow-md group-hover:bg-blue-400 active:bg-white/30 w-full flex items-center gap-4 px-4 capitalize text-blue-600 group-hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" class="rotate-180 scale-y-[-1]">
                            <path d="M20 7V8.2C20 9.88016 20 10.7202 19.673 11.362C19.3854 11.9265 18.9265 12.3854 18.362 12.673C17.7202 13 16.8802 13 15.2 13H4M4 13L8 9M4 13L8 17" stroke="#155dfc" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover:stroke-white"/>
                        </svg>
                        <p class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">Pembayaran</p>
                    </a>
                </div>
              </li>
              <li>
                <div class="group rounded-lg duration-300">
                    <a href="/laporan/lain-lain" class="middle none font-sans font-bold center disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg group-hover:shadow-md group-hover:bg-blue-400 active:bg-white/30 w-full flex items-center gap-4 px-4 capitalize text-blue-600 group-hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" class="rotate-180 scale-y-[-1]">
                            <path d="M20 7V8.2C20 9.88016 20 10.7202 19.673 11.362C19.3854 11.9265 18.9265 12.3854 18.362 12.673C17.7202 13 16.8802 13 15.2 13H4M4 13L8 9M4 13L8 17" stroke="#155dfc" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover:stroke-white"/>
                        </svg>
                        <p class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">Lain-Lain</p>
                    </a>
                </div>
              </li>
            </ul>
          </li>
          <li>
            <div class="group rounded-lg duration-300">
                <a href="/laporan/pengeluaran" class="middle none font-sans font-bold center disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg group-hover:shadow-md group-hover:bg-gradient-to-tr group-hover:from-blue-600 group-hover:to-blue-400 group-hover:shadow-blue-500/20 group-hover:shadow-lg group-hover:shadow-blue-500/40 active:bg-white/30 w-full flex items-center gap-4 px-4 capitalize text-blue-600 group-hover:text-white {{ $title === 'Laporan Pengeluaran' ? 'shadow-md bg-gradient-to-tr from-blue-600 to-blue-400 shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/40 active:opacity-[0.85] text-white' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#155dfc" height="20" width="20" version="1.1" id="Layer_1" viewBox="0 0 512 512" xml:space="preserve" class="group-hover:fill-white {{$title === 'Laporan Pengeluaran' ? 'fill-white' : ''}}">
                        <g>
                            <g>
                                <path d="M427.692,0H86.442C72.304,0,59.733,10.4,59.733,24.5v460.867c0,14.1,12.571,26.633,26.708,26.633h341.25    c14.137,0,24.575-12.533,24.575-26.633V24.5C452.267,10.4,441.829,0,427.692,0z M435.2,485.367c0,4.683-2.779,9.567-7.508,9.567    H86.442c-4.729,0-9.642-4.883-9.642-9.567V24.5c0-4.683,4.912-7.433,9.642-7.433h341.25c4.729,0,7.508,2.75,7.508,7.433V485.367z"/>
                            </g>
                        </g>
                        <g>
                            <g>
                                <path d="M299.733,59.733H214.4c-4.713,0-8.533,3.817-8.533,8.533c0,4.717,3.821,8.533,8.533,8.533h85.333    c4.713,0,8.533-3.817,8.533-8.533C308.267,63.55,304.446,59.733,299.733,59.733z"/>
                            </g>
                        </g>
                        <g>
                            <g>
                                <path d="M376.533,119.467H137.6c-4.713,0-8.533,3.817-8.533,8.533c0,4.717,3.821,8.533,8.533,8.533h238.933    c4.713,0,8.533-3.817,8.533-8.533C385.067,123.283,381.246,119.467,376.533,119.467z"/>
                            </g>
                        </g>
                        <g>
                            <g>
                                <path d="M376.533,179.2H137.6c-4.713,0-8.533,3.817-8.533,8.533c0,4.717,3.821,8.533,8.533,8.533h238.933    c4.713,0,8.533-3.817,8.533-8.533C385.067,183.017,381.246,179.2,376.533,179.2z"/>
                            </g>
                        </g>
                        <g>
                            <g>
                                <path d="M376.533,238.933H137.6c-4.713,0-8.533,3.817-8.533,8.533c0,4.717,3.821,8.533,8.533,8.533h238.933    c4.713,0,8.533-3.817,8.533-8.533C385.067,242.75,381.246,238.933,376.533,238.933z"/>
                            </g>
                        </g>
                        <g>
                            <g>
                                <path d="M376.533,298.667H137.6c-4.713,0-9.6,2.75-9.6,7.467v128c0,4.717,4.887,9.6,9.6,9.6h238.933    c4.713,0,7.467-4.883,7.467-9.6v-128C384,301.417,381.246,298.667,376.533,298.667z M366.933,426.667H145.067V315.733h221.867    V426.667z"/>
                            </g>
                        </g>
                    </svg>
                    <p class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">Laporan Pengeluaran</p>
                </a>
            </div>
          </li>
          <li>
            <div class="group rounded-lg duration-300">
                <a href="/kas" class="middle none font-sans font-bold center disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg group-hover:shadow-md group-hover:bg-gradient-to-tr group-hover:from-blue-600 group-hover:to-blue-400 group-hover:shadow-blue-500/20 group-hover:shadow-lg group-hover:shadow-blue-500/40 active:bg-white/30 w-full flex items-center gap-4 px-4 capitalize text-blue-600 group-hover:text-white {{ $title === 'Kas' ? 'shadow-md bg-gradient-to-tr from-blue-600 to-blue-400 shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/40 active:opacity-[0.85] text-white' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M7 13C7 11.1144 7 10.1716 7.58579 9.58579C8.17157 9 9.11438 9 11 9H14H17C18.8856 9 19.8284 9 20.4142 9.58579C21 10.1716 21 11.1144 21 13V14V15C21 16.8856 21 17.8284 20.4142 18.4142C19.8284 19 18.8856 19 17 19H14H11C9.11438 19 8.17157 19 7.58579 18.4142C7 17.8284 7 16.8856 7 15V14V13Z" stroke="#155dfc" class="group-hover:stroke-white {{ $title === 'Kas' ? 'stroke-white' : '' }}" stroke-width="2" stroke-linejoin="round"/>
                        <path d="M7 15V15C5.11438 15 4.17157 15 3.58579 14.4142C3.58579 14.4142 3.58579 14.4142 3.58579 14.4142C3 13.8284 3 12.8856 3 11L3 9C3 7.11438 3 6.17157 3.58579 5.58579C4.17157 5 5.11438 5 7 5L13 5C14.8856 5 15.8284 5 16.4142 5.58579C17 6.17157 17 7.11438 17 9V9" stroke="#155dfc" class="group-hover:stroke-white {{ $title === 'Kas' ? 'stroke-white' : '' }}" stroke-width="2" stroke-linejoin="round"/>
                        <path d="M16 14C16 15.1046 15.1046 16 14 16C12.8954 16 12 15.1046 12 14C12 12.8954 12.8954 12 14 12C15.1046 12 16 12.8954 16 14Z" stroke="#155dfc" class="group-hover:stroke-white {{ $title === 'Kas' ? 'stroke-white' : '' }}" stroke-width="2"/>
                        </svg>
                    <p class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">Kas</p>
                </a>
            </div>
          </li>
        </ul>
        <ul class="flex flex-col gap-1">
            <li>
                <a>
                    <div class="text-lg text-gray-400 font-bold">Logout</div>
                </a>
            </li>
          <li>
            <div class="group rounded-lg duration-300">
                <a href="/logout" class="middle none font-sans font-bold center disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg group-hover:shadow-md group-hover:bg-gradient-to-tr group-hover:from-red-600 group-hover:to-red-400 group-hover:shadow-red-500/20 group-hover:shadow-lg group-hover:shadow-red-500/40 active:bg-white/30 w-full flex items-center gap-4 px-4 capitalize text-red-600 group-hover:text-white {{ $title === 'logout' ? 'shadow-md bg-gradient-to-tr from-blue-600 to-blue-400 shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/40 active:opacity-[0.85] text-white' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="w-5 h-5 text-inherit">
                        <path fill-rule="evenodd" d="M7.5 3.75A1.5 1.5 0 006 5.25v13.5a1.5 1.5 0 001.5 1.5h6a1.5 1.5 0 001.5-1.5V15a.75.75 0 011.5 0v3.75a3 3 0 01-3 3h-6a3 3 0 01-3-3V5.25a3 3 0 013-3h6a3 3 0 013 3V9A.75.75 0 0115 9V5.25a1.5 1.5 0 00-1.5-1.5h-6zm10.72 4.72a.75.75 0 011.06 0l3 3a.75.75 0 010 1.06l-3 3a.75.75 0 11-1.06-1.06l1.72-1.72H9a.75.75 0 010-1.5h10.94l-1.72-1.72a.75.75 0 010-1.06z" clip-rule="evenodd"></path>
                      </svg>
                    <p class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">Logout</p>
                </a>
            </div>
          </li>
        </ul>
      </div>
    </aside>
    <div class="xl:ml-72">
      <nav class="block w-full max-w-full text-black px-0 py-1 bg-white shadow-sm px-4 md:px-5 lg:px-10">
        <div class="flex flex-col-reverse justify-between gap-6 flex-row md:items-center">
          <div class="capitalize my-auto">
            <h6 class="flex antialiased tracking-normal font-sans text-base font-semibold leading-relaxed text-black my-auto">@yield('title')</h6>
          </div>
          <div class="flex items-center justify-between">
            <a href="/profil">
              <button class="middle block font-sans font-bold center disabled:opacity-50 disabled:shadow-none cursor-pointer text-sm py-3 rounded-lg text-black hover:bg-blue-gray-500/10 active:bg-blue-gray-500/30 visible items-center gap-1 flex" type="button">
                <span class="pr-2 hidden invisble capitalize none xl:visible xl:flex">{{$user->name}}</span>
                <img src="/{{$user->image}}" alt="foto-profil" class="w-8 h-8 rounded-full">
              </button>
            </a>
            <button onclick="sidebarHandler()" class="relative ml-2 bg-gray-200 hover:bg-gray-300 middle none font-sans font-medium text-center uppercase disabled:opacity-50 disabled:shadow-none cursor-pointer w-10 max-w-[40px] h-10 max-h-[40px] rounded-lg text-xs text-gray-500 hover:bg-blue-gray-500/10 active:bg-blue-gray-500/30 grid xl:none xl:hidden" type="button">
                <span class="absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" stroke-width="3" class="h-6 w-6 text-blue-gray-500">
                    <path fill-rule="evenodd" d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z" clip-rule="evenodd"></path>
                  </svg>
                </span>
            </button>
          </div>
        </div>
      </nav>
      <div class="flex flex-col py-4 px-4 md:px-5 lg:px-10 min-h-[90vh]">
        @yield('dashboard-content')
        <div class="mt-auto mb-0">
            @include('components.footer')
        </div>
    </div>
    </div>
</div>

  <script>
    function sidebarHandler() {
        var sidebar  = document.getElementById("sidebar");
        sidebar.classList.toggle("translate-x-0");
    }
  </script>
