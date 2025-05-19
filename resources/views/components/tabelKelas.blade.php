<table class="min-w-full divide-y divide-gray-200">
    <thead>
        <tr>
        <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-black uppercase">Kelas</th>
        <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-black uppercase">Wali Kelas</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($kelass as $kelas)
        <tr class="odd:bg-white even:bg-gray-100">
            <td class="px-6 py-4 w-20 whitespace-nowrap text-sm text-gray-800">{{ $kelas->nama_kelas }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{ $kelas->wali_kelas }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
