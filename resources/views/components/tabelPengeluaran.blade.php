<table class="min-w-full divide-y divide-gray-200">
    <thead>
      <tr>
        <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-black uppercase">No</th>
        <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-black uppercase">Jenis</th>
        <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-black uppercase">Keterangan</th>
        <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-black uppercase">Nominal</th>
        <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-black uppercase">Tanggal</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($pengeluarans as $pengeluaran)
        <tr class="odd:bg-white even:bg-gray-100">
            <td class="px-6 py-4 w-20 whitespace-nowrap text-sm text-gray-800">{{ $loop->iteration }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 capitalize">{{ $pengeluaran->jenis }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{ $pengeluaran->keterangan }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">Rp {{ number_format($pengeluaran->nominal, 0); }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{ $pengeluaran->tanggal }}</td>
        </tr>
    @endforeach
    </tbody>
  </table>
