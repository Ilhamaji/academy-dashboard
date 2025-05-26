<table class="min-w-full divide-y divide-gray-200">
    <thead>
      <tr>
        <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-black uppercase">No</th>
        <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-black uppercase">Jenis Pengeluaran</th>
        <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-black uppercase">Keterangan</th>
        <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-black uppercase">Nominal</th>
        <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-black uppercase">Tanggal</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($pengeluarans as $pengeluaran)
        <tr class="odd:bg-white even:bg-gray-100">
            <td class="px-6 py-4 w-20 whitespace-nowrap text-sm text-gray-500">{{ $loop->iteration }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">{{ $pengeluaran->nama_jenis_pengeluaran }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">{{ $pengeluaran->keterangan }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">Rp {{ number_format($pengeluaran->nominal, 0); }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">{{ $pengeluaran->tanggal }}</td>
        </tr>
    @endforeach
    </tbody>
  </table>
