<!-- Modal -->
<div
class="flex justify-center items-center transition-opacity duration-300 ease-out z-[9999]"
>
    <div class="bg-white shadow-md rounded-lg w-9/12 sm:w-7/12 md:w-5/12 lg:w-4/12 scale-95 p-5 transition-transform duration-300 ease-out">
        <!-- Modal Header -->
        <div class="flex justify-between">
            <span>Tambah Penerimaan Pembayaran</span>
        </div>
        <hr class="my-4">
        <form action="/penerimaan/pembayaran" method="POST">
            {{ csrf_field() }}
            <label for="nisn" class="font-semibold text-sm text-gray-600 pb-1 block">Nama Siswa</label>
            <select name="nisn" id="nisn" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" @required(true)>
                @foreach ($siswas as $siswa)
                    <option value='{{ $siswa->nisn }}'>{{ $siswa->nama_siswa }}</option>
                @endforeach
            </select>
            <label for="kelas" class="font-semibold text-sm text-gray-600 pb-1 block">Kelas</label>
            <select name="kelas" id="kelas" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full">
                <option value=''>Pilih kelas jika belum terdaftar</option>
                @foreach ($kelass as $kelas)
                    <option value='{{ $kelas->nama_kelas }}'>{{ $kelas->nama_kelas }}</option>
                @endforeach
            </select>
            <label for="keterangan" class="font-semibold text-sm text-gray-600 pb-1 block">Keterangan</label>
            <select name="keterangan" id="keterangan" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" @required(true)>
                <option value='spp'>SPP (Sumbangan Pembinaan Pendidikan)</option>
                <option value='seragam'>Seragam</option>
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
