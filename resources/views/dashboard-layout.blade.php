@extends('layout')

<!-- component -->
<div class="min-h-screen bg-gray-100">
    <aside id="sidebar" class="fixed shadow-md no-scrollbar overflow-y-scroll bg-gray-900 -translate-x-80 fixed inset-0 z-50 min-h-screen w-72 transition-transform duration-300 xl:translate-x-0">
      <div class="relative">
        <a class="flex items-center gap-4 py-4 mx-4 border-b" href="/">
            <h6 class="block antialiased tracking-normal font-sans text-xl font-bold leading-relaxed text-white">
                Nama Sekolah
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
                    <div class="text-lg text-gray-400 font-bold">Halaman</div>
                </a>
            </li>
          <li>
            <div class="group hover:bg-gray-600 rounded-lg duration-300">
                <a href="/" class="middle none font-sans font-bold center disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg group-hover:shadow-md group-hover:bg-gradient-to-tr group-hover:from-blue-600 group-hover:to-blue-400 group-hover:text-white group-hover:shadow-blue-500/20 group-hover:shadow-lg group-hover:shadow-blue-500/40 active:bg-white/30 w-full flex items-center gap-4 px-4 capitalize text-white {{ $title === 'Home' ? 'shadow-md bg-gradient-to-tr from-blue-600 to-blue-400 shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/40 active:opacity-[0.85] text-white' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="w-5 h-5 text-inherit">
                        <path d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z"></path>
                        <path d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z"></path>
                      </svg>
                    <p class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium ">Dashboard</p>
                </a>
            </div>
          </li>
          <li>
            <div class="group hover:bg-gray-600 rounded-lg duration-300">
                <a href="/siswa" class="middle none font-sans font-bold center disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg group-hover:text-white group-hover:shadow-md group-hover:bg-gradient-to-tr group-hover:from-blue-600 group-hover:to-blue-400 group-hover:shadow-blue-500/20 group-hover:shadow-lg group-hover:shadow-blue-500/40 active:bg-white/30 w-full flex items-center gap-4 px-4 capitalize text-white {{ $title === 'Siswa' ? 'shadow-md bg-gradient-to-tr from-blue-600 to-blue-400 shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/40 active:opacity-[0.85] text-white' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="w-5 h-5 text-inherit">
                        <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd"></path>
                      </svg>
                    <p class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">Siswa</p>
                </a>
            </div>
          </li>
          <li>
            <div class="group hover:bg-gray-600 rounded-lg duration-300">
                <a href="/kelas" class="middle none font-sans font-bold center disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg group-hover:text-white group-hover:shadow-md group-hover:bg-gradient-to-tr group-hover:from-blue-600 group-hover:to-blue-400 group-hover:shadow-blue-500/20 group-hover:shadow-lg group-hover:shadow-blue-500/40 active:bg-white/30 w-full flex items-center gap-4 px-4 capitalize text-white {{ $title === 'Kelas' ? 'shadow-md bg-gradient-to-tr from-blue-600 to-blue-400 shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/40 active:opacity-[0.85] text-white' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none"><path stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5h10M11 9h5" class="group-hover:stroke-white {{ $title === 'Kelas' ? 'stroke-white' : ''}}"/><rect width="4" height="4" x="3" y="5" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" rx="1" class="group-hover:stroke-white {{ $title === 'Kelas' ? 'stroke-white' : ''}}"/><path stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 15h10m-10 4h5" class="group-hover:stroke-white {{ $title === 'Kelas' ? 'stroke-white' : ''}}"/><rect width="4" height="4" x="3" y="15" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" rx="1" class="group-hover:stroke-white {{ $title === 'Kelas' ? 'stroke-white' : ''}}"/></svg>
                    <p class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">Kelas</p>
                </a>
            </div>
          </li>
          <li>
            <div class="group hover:bg-gray-600 rounded-lg duration-300">
                <a href="/detail" class="middle none font-sans font-bold center disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg group-hover:text-white group-hover:shadow-md group-hover:bg-gradient-to-tr group-hover:from-blue-600 group-hover:to-blue-400 group-hover:shadow-blue-500/20 group-hover:shadow-lg group-hover:shadow-blue-500/40 active:bg-white/30 w-full flex items-center gap-4 px-4 capitalize text-white {{ $title === 'Detail' ? 'shadow-md bg-gradient-to-tr from-blue-600 to-blue-400 shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/40 active:opacity-[0.85] text-white' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 -0.5 11 11" version="1.1">
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="Dribbble-Light-Preview" transform="translate(-304.000000, -565.000000)" fill="#fff" class="group-hover:fill-white {{ $title === 'Detail' ? 'fill-white' : ''}}">
                                <g id="icons" transform="translate(56.000000, 160.000000)">
                                    <path d="M259,410 C259,410.552 258.5072,411 257.9,411 L256.1554,411 L257.3896,412.121 C257.8186,412.512 257.8186,413.145 257.3896,413.536 L257.3896,413.536 C256.9595,413.926 256.2632,413.926 255.8331,413.536 L254.6,412.414 L254.6,414 C254.6,414.552 254.1072,415 253.5,415 L253.5,415 C252.8928,415 252.4,414.552 252.4,414 L252.4,412.414 L251.1669,413.536 C250.7368,413.926 250.0405,413.926 249.6104,413.536 C249.1814,413.145 249.1814,412.512 249.6104,412.121 L250.8446,411 L249.1,411 C248.4928,411 248,410.552 248,410 L248,410 C248,409.448 248.4928,409 249.1,409 L250.8446,409 L249.6104,407.879 C249.1814,407.488 249.1814,406.855 249.6104,406.464 L249.6104,406.464 C250.0405,406.074 250.7368,406.074 251.1669,406.464 L252.4,407.586 L252.4,406 C252.4,405.448 252.8928,405 253.5,405 L253.5,405 C254.1072,405 254.6,405.448 254.6,406 L254.6,407.586 L255.8331,406.464 C256.2632,406.074 256.9595,406.074 257.3896,406.464 L257.3896,406.464 C257.8186,406.855 257.8186,407.488 257.3896,407.879 L256.1554,409 L257.9,409 C258.5072,409 259,409.448 259,410 L259,410 Z" id="important_details-[#1434]">
                                    </path>
                                </g>
                            </g>
                        </g>
                    </svg>
                    <p class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">Detail</p>
                </a>
            </div>
          </li>
          <li>
            <div class="group hover:bg-gray-600 rounded-lg duration-300">
                <a href="/penerimaan" class="middle none font-sans font-bold center disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg group-hover:text-white group-hover:shadow-md group-hover:bg-gradient-to-tr group-hover:from-blue-600 group-hover:to-blue-400 group-hover:shadow-blue-500/20 group-hover:shadow-lg group-hover:shadow-blue-500/40 active:bg-white/30 w-full flex items-center gap-4 px-4 capitalize text-white {{ $title === 'Penerimaan' ? 'shadow-md bg-gradient-to-tr from-blue-600 to-blue-400 shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/40 active:opacity-[0.85] text-white' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#fff" aria-hidden="true" class="w-5 h-5 text-inherit group-hover:fill-white {{ $title === 'Penerimaan' ? 'fill-white' : ''}}">
                        <path fill-rule="evenodd" d="M1.5 5.625c0-1.036.84-1.875 1.875-1.875h17.25c1.035 0 1.875.84 1.875 1.875v12.75c0 1.035-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 011.5 18.375V5.625zM21 9.375A.375.375 0 0020.625 9h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h7.5a.375.375 0 00.375-.375v-1.5zm0 3.75a.375.375 0 00-.375-.375h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h7.5a.375.375 0 00.375-.375v-1.5zm0 3.75a.375.375 0 00-.375-.375h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h7.5a.375.375 0 00.375-.375v-1.5zM10.875 18.75a.375.375 0 00.375-.375v-1.5a.375.375 0 00-.375-.375h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h7.5zM3.375 15h7.5a.375.375 0 00.375-.375v-1.5a.375.375 0 00-.375-.375h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375zm0-3.75h7.5a.375.375 0 00.375-.375v-1.5A.375.375 0 0010.875 9h-7.5A.375.375 0 003 9.375v1.5c0 .207.168.375.375.375z" clip-rule="evenodd"></path>
                    </svg>
                    <p class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">Penerimaan</p>
                </a>
            </div>
          </li>
          <li>
            <div class="group hover:bg-gray-600 rounded-lg duration-300">
                <a href="/pengeluaran" class="middle none font-sans font-bold center disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg group-hover:text-white group-hover:shadow-md group-hover:bg-gradient-to-tr group-hover:from-blue-600 group-hover:to-blue-400 group-hover:shadow-blue-500/20 group-hover:shadow-lg group-hover:shadow-blue-500/40 active:bg-white/30 w-full flex items-center gap-4 px-4 capitalize text-white {{ $title === 'Pengeluaran' ? 'shadow-md bg-gradient-to-tr from-blue-600 to-blue-400 shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/40 active:opacity-[0.85] text-white' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#fff" aria-hidden="true" class="w-5 h-5 text-inherit group-hover:fill-white {{ $title === 'Pengeluaran' ? 'fill-white' : ''}}">
                        <path fill-rule="evenodd" d="M1.5 5.625c0-1.036.84-1.875 1.875-1.875h17.25c1.035 0 1.875.84 1.875 1.875v12.75c0 1.035-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 011.5 18.375V5.625zM21 9.375A.375.375 0 0020.625 9h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h7.5a.375.375 0 00.375-.375v-1.5zm0 3.75a.375.375 0 00-.375-.375h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h7.5a.375.375 0 00.375-.375v-1.5zm0 3.75a.375.375 0 00-.375-.375h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h7.5a.375.375 0 00.375-.375v-1.5zM10.875 18.75a.375.375 0 00.375-.375v-1.5a.375.375 0 00-.375-.375h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h7.5zM3.375 15h7.5a.375.375 0 00.375-.375v-1.5a.375.375 0 00-.375-.375h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375zm0-3.75h7.5a.375.375 0 00.375-.375v-1.5A.375.375 0 0010.875 9h-7.5A.375.375 0 003 9.375v1.5c0 .207.168.375.375.375z" clip-rule="evenodd"></path>
                    </svg>
                    <p class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">Pengeluaran</p>
                </a>
            </div>
          </li>
          <li>
            <div class="group hover:bg-gray-600 rounded-lg duration-300">
                <a href="/kas" class="middle none font-sans font-bold center disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg group-hover:text-white group-hover:shadow-md group-hover:bg-gradient-to-tr group-hover:from-blue-600 group-hover:to-blue-400 group-hover:shadow-blue-500/20 group-hover:shadow-lg group-hover:shadow-blue-500/40 active:bg-white/30 w-full flex items-center gap-4 px-4 capitalize text-white {{ $title === 'Kas' ? 'shadow-md bg-gradient-to-tr from-blue-600 to-blue-400 shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/40 active:opacity-[0.85] text-white' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M7 13C7 11.1144 7 10.1716 7.58579 9.58579C8.17157 9 9.11438 9 11 9H14H17C18.8856 9 19.8284 9 20.4142 9.58579C21 10.1716 21 11.1144 21 13V14V15C21 16.8856 21 17.8284 20.4142 18.4142C19.8284 19 18.8856 19 17 19H14H11C9.11438 19 8.17157 19 7.58579 18.4142C7 17.8284 7 16.8856 7 15V14V13Z" stroke="#fff" class="group-hover:stroke-white {{ $title === 'Kas' ? 'stroke-white' : '' }}" stroke-width="2" stroke-linejoin="round"/>
                        <path d="M7 15V15C5.11438 15 4.17157 15 3.58579 14.4142C3.58579 14.4142 3.58579 14.4142 3.58579 14.4142C3 13.8284 3 12.8856 3 11L3 9C3 7.11438 3 6.17157 3.58579 5.58579C4.17157 5 5.11438 5 7 5L13 5C14.8856 5 15.8284 5 16.4142 5.58579C17 6.17157 17 7.11438 17 9V9" stroke="#fff" class="group-hover:stroke-white {{ $title === 'Kas' ? 'stroke-white' : '' }}" stroke-width="2" stroke-linejoin="round"/>
                        <path d="M16 14C16 15.1046 15.1046 16 14 16C12.8954 16 12 15.1046 12 14C12 12.8954 12.8954 12 14 12C15.1046 12 16 12.8954 16 14Z" stroke="#fff" class="group-hover:stroke-white {{ $title === 'Kas' ? 'stroke-white' : '' }}" stroke-width="2"/>
                        </svg>
                    <p class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">Kas</p>
                </a>
            </div>
          </li>
        </ul>
        <ul class="flex flex-col gap-1">
            <li>
                <a>
                    <div class="text-lg text-gray-400 font-bold">Profil</div>
                </a>
            </li>
          <li>
            <div class="group hover:bg-gray-600 rounded-lg duration-300">
                <a href="/logout" class="middle none font-sans font-bold center disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg group-hover:text-white group-hover:shadow-md group-hover:bg-gradient-to-tr group-hover:from-red-600 group-hover:to-red-400 group-hover:shadow-red-500/20 group-hover:shadow-lg group-hover:shadow-red-500/40 active:bg-white/30 w-full flex items-center gap-4 px-4 capitalize text-white {{ $title === 'logout' ? 'shadow-md bg-gradient-to-tr from-blue-600 to-blue-400 shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/40 active:opacity-[0.85] text-white' : '' }}">
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
      <nav class="block w-full max-w-full text-black px-0 py-1 bg-transparent px-4 md:px-5 lg:px-10">
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
      <div class="py-4 px-4 md:px-5 lg:px-10">
        @yield('dashboard-content')
      </div>
    </div>
</div>

  <script>
    function sidebarHandler() {
        var sidebar  = document.getElementById("sidebar");
        sidebar.classList.toggle("translate-x-0");
    }
  </script>
