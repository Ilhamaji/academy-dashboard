<!-- Modal -->
<div
class="flex my-auto mx-auto min-w-[70vw] justify-center items-center align-middle transition-opacity duration-300 ease-out z-[9999]"
>
    <div class="bg-white shadow-md rounded-lg w-9/12 sm:w-7/12 md:w-5/12 lg:w-4/12 scale-95 p-5 transition-transform duration-300 ease-out">
        <!-- Modal Header -->
        <div class="flex justify-between">
            <span>Tambah Jenis Pengeluaran</span>
        </div>
        <hr class="my-4">
        <form action="/pengeluaran/jenis" method="POST">
            {{ csrf_field() }}
            <label for="jenis" class="font-semibold text-sm text-gray-600 pb-1 block">Jenis</label>
            <textarea id="jenis" type="text" name="jenis" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" @required(true)></textarea>
            <button type="submit" class="transition duration-200 bg-blue-500 hover:bg-blue-600 focus:bg-blue-700 focus:shadow-sm focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50 text-white w-full py-2.5 rounded-lg text-sm shadow-sm hover:shadow-md font-semibold text-center inline-block">
                <span class="inline-block">Tambah</span>
            </button>
        </form>
    </div>
</div>
