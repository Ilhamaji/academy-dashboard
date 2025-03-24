<!-- Modal -->
<div
class="fixed antialiased inset-0 bg-gray-600/50 bg-opacity-75 flex justify-center items-center opacity-0 pointer-events-none transition-opacity duration-300 ease-out z-[9999]"
id="exampleModalWeb3s"
aria-hidden="true"
>
    <div class="bg-white rounded-lg w-9/12 sm:w-7/12 md:w-5/12 lg:w-3/12 scale-95 p-5 transition-transform duration-300 ease-out">
        <!-- Modal Header -->
        <div class="flex justify-between">
            <span>Tambah Penerimaan Lain-lain</span>
            <button
            type="button"
            id="closeModalButtons"
            aria-label="Close"
            class="text-white bg-gradient-to-br from-gray-800 to-gray-900 hover:cursor-pointer px-2 rounded-md"
            >
            &times;
            </button>
        </div>
        <hr class="my-4">
        <form action="/penerimaan/lain-lain" method="POST">
            {{ csrf_field() }}
            <label for="keterangan" class="font-semibold text-sm text-gray-600 pb-1 block">Keterangan</label>
            <input id="keterangan" type="text" name="keterangan" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" @required(true)/>
            <label for="nominal" class="font-semibold text-sm text-gray-600 pb-1 block">Nominal</label>
            <input id="nominal" type="number" name="nominal" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" @required(true)/>
            <label for="tgl" class="font-semibold text-sm text-gray-600 pb-1 block">Tanggal</label>
            <input type="date" name="tgl" id="tgl" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full">
            <button type="submit" class="transition duration-200 bg-blue-500 hover:bg-blue-600 focus:bg-blue-700 focus:shadow-sm focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50 text-white w-full py-2.5 rounded-lg text-sm shadow-sm hover:shadow-md font-semibold text-center inline-block">
                <span class="inline-block">Tambah</span>
            </button>
        </form>
    </div>
</div>


  <!-- JavaScript -->
  <script>
    const modals = document.getElementById("exampleModalWeb3s");
    const openModalButtons = document.getElementById("openModalButtons");
    const closeModalButtons = document.getElementById("closeModalButtons");

    openModalButtons.addEventListener("click", () => {
      modals.classList.remove("opacity-0", "pointer-events-none");
      modals.classList.add("opacity-100");
    });

    closeModalButtons.addEventListener("click", () => {
      modals.classList.add("opacity-0", "pointer-events-none");
      modals.classList.remove("opacity-100");
    });
  </script>
