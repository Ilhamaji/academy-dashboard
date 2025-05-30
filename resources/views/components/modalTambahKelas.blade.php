

  <!-- Modal -->
  <div
    class="fixed antialiased inset-0 bg-gray-600/50 bg-opacity-75 flex justify-center items-center opacity-0 pointer-events-none transition-opacity duration-300 ease-out z-[9999]"
    id="exampleModalWeb3"
    aria-hidden="true"
  >
    <div class="bg-white rounded-lg w-9/12 sm:w-7/12 md:w-5/12 lg:w-3/12 scale-95 p-5 transition-transform duration-300 ease-out">
      <!-- Modal Header -->
        <div class="flex justify-between">
            <span>Tambah Kelas</span>
            <button
            type="button"
            id="closeModalButton"
            aria-label="Close"
            class="text-white bg-red-600 hover:cursor-pointer px-2 rounded-md"
            >
            &times;
            </button>
        </div>
        <hr class="my-4">
        <form action="/kelas" method="POST">
            {{ csrf_field() }}
            <label for="nama_kelas" class="font-semibold text-sm text-gray-600 pb-1 block">Nama Kelas</label>
            <select name="nama_kelas" id="nama_kelas" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" @required(true)>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select>
            <label for="wali_kelas" class="font-semibold text-sm text-gray-600 pb-1 block">Wali Kelas</label>
            <input id="wali_kelas" type="text" name="wali_kelas" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" @required(true) />
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
