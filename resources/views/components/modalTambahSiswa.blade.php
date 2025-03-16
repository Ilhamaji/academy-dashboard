

  <!-- Modal -->
  <div
    class="fixed antialiased inset-0 bg-gray-600/50 bg-opacity-75 flex justify-center items-center opacity-0 pointer-events-none transition-opacity duration-300 ease-out z-[9999]"
    id="exampleModalWeb3"
    aria-hidden="true"
  >
    <div class="bg-white rounded-lg w-9/12 sm:w-7/12 md:w-5/12 lg:w-3/12 scale-95 p-5 transition-transform duration-300 ease-out">
      <!-- Modal Header -->
        <div class="flex justify-between">
            <span>Tambah Siswa</span>
            <button
            type="button"
            id="closeModalButton"
            aria-label="Close"
            class="text-white bg-gradient-to-br from-gray-800 to-gray-900 hover:cursor-pointer px-2 rounded-md"
            >
            &times;
            </button>
        </div>
        <hr class="my-4">
        <form action="/siswa" method="POST">
            {{ csrf_field() }}
            <label for="nisn" class="font-semibold text-sm text-gray-600 pb-1 block" @required(true)>NISN</label>
            <input id="nisn" type="number" name="nisn" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" />
            <label for="nama_siswa" class="font-semibold text-sm text-gray-600 pb-1 block" @required(true)>Nama</label>
            <input id="nama_siswa" type="text" name="nama_siswa" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" />
            <label for="jenis_kelamin" class="font-semibold text-sm text-gray-600 pb-1 block" @required(true)>Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full">
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            <label for="kelas" class="font-semibold text-sm text-gray-600 pb-1 block" @required(true)>Kelas</label>
            <select name="kelas" id="kelas" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select>
            <label for="alamat" class="font-semibold text-sm text-gray-600 pb-1 block" @required(true)>Alamat</label>
            <textarea name="alamat" id="alamat" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full"></textarea>
            <button type="submit" class="transition duration-200 bg-blue-500 hover:bg-blue-600 focus:bg-blue-700 focus:shadow-sm focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50 text-white w-full py-2.5 rounded-lg text-sm shadow-sm hover:shadow-md font-semibold text-center inline-block">
                <span class="inline-block">Tambah</span>
            </button>
        </form>
    </div>
  </div>


  <!-- JavaScript -->
  <script>
    const modal = document.getElementById("exampleModalWeb3");
    const openModalButton = document.getElementById("openModalButton");
    const closeModalButton = document.getElementById("closeModalButton");

    openModalButton.addEventListener("click", () => {
      modal.classList.remove("opacity-0", "pointer-events-none");
      modal.classList.add("opacity-100");
    });

    closeModalButton.addEventListener("click", () => {
      modal.classList.add("opacity-0", "pointer-events-none");
      modal.classList.remove("opacity-100");
    });
  </script>
