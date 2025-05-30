<!-- Modal -->
<div
class="fixed antialiased inset-0 bg-gray-600/50 bg-opacity-75 flex justify-center items-center opacity-0 pointer-events-none transition-opacity duration-300 ease-out z-[9999]"
id="exampleModalWeb3"
aria-hidden="true"
>
    <div class="bg-white shadow-md rounded-lg w-9/12 sm:w-7/12 md:w-5/12 lg:w-4/12 scale-95 p-5 transition-transform duration-300 ease-out">
        <!-- Modal Header -->
        <div class="flex justify-between">
            <span>Tambah Penerimaan Pembayaran</span>
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
        <form action="/penerimaan/pembayaran" method="POST">
            {{ csrf_field() }}
            <label for="custom_field1" class="font-semibold text-sm text-gray-600 pb-1 block">Siswa</label>
            <input id="custom_field1" name="nisn" type="text" list="custom_field1_datalist" class="form-control border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full">
            <datalist id="custom_field1_datalist" class="select2">
                @foreach ($siswas as $siswa)
                    <option value='{{ $siswa->nisn }}'>{{ $siswa->nama_siswa }}</option>
                @endforeach
            </datalist>
            <span id="error" class="text-danger"></span>
            <label for="kelas" class="font-semibold text-sm text-gray-600 pb-1 block">Kelas</label>
            <select name="kelas" id="kelas" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full">
                <option value=''>Pilih kelas jika belum terdaftar</option>
                @foreach ($kelass as $kelas)
                    <option value='{{ $kelas->id }}'>{{ $kelas->nama_kelas }}</option>
                @endforeach
            </select>
            <label for="kode_jenis" class="font-semibold text-sm text-gray-600 pb-1 block">Jenis Penerimaan</label>
            <select name="kode_jenis" id="kode_jenis" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" @required(true)>
                @foreach ($jenis as $j)
                    <option value='{{ $j->kode }}'>{{ $j->nama }}</option>
                @endforeach
            </select>
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

$(document).ready(function() {
    $('.select2').select2();
});
</script>
