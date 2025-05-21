<table class="min-w-full divide-y divide-gray-200">
                <thead>
                  <tr>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-black uppercase">No</th>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-black uppercase">NISN</th>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-black uppercase">Nama</th>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-black uppercase">Jenis Kelamin</th>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-black uppercase">Kelas</th>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-black uppercase">Alamat</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($siswas as $siswa)
                    <tr class="odd:bg-white even:bg-gray-100">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">
                            <p class="w-10 lg:w-auto truncate">{{ $siswa->nisn }}</p>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">
                            <p class="w-20 lg:w-auto truncate">{{ $siswa->nama_siswa }}</p>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">
                            <p class="w-20 lg:w-auto truncate">{{ $siswa->jenis_kelamin }}</p>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">
                            <p class="">{{ $siswa->kelas }}</p>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">
                            <p class="w-20 md:w-40 lg:w-86 truncate">{{ $siswa->alamat }}</p>
                        </td>
                    </tr>
                @endforeach
                </tbody>
              </table>
