<table class="min-w-full divide-y divide-gray-200">
    <thead>
      <tr>
        <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-black uppercase">No</th>
        <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-black uppercase">Kode</th>
        <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-black uppercase">Kategori</th>
        <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-black uppercase">Jenis Penerimaan</th>
        <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-black uppercase">Tanggal</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($jenis as $j)
        <tr class="odd:bg-white even:bg-gray-100">
            <td class="px-6 py-4 w-20 whitespace-nowrap text-sm text-gray-500">{{ $loop->iteration }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">{{ $j->kode }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">{{ $j->kategori }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">{{ $j->nama }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">{{ $j->created_at }}</td>
        </tr>
    @endforeach
    </tbody>
  </table>
